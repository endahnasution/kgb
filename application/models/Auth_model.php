<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Auth_model extends CI_Model
{
    public $table       = 'tbl_pegawai';
    public $id          = 'tbl_pegawai.id';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $query = $this->db->get_where($this->table, array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }

    public function check_account($username,$password)
    {
        //cari username lalu lakukan validasi
        $this->db->where('username', $username);
        $query = $this->db->get("tbl_pegawai")->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->activated == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
	}


	
	public function get_by_id()
    {
        $id = $this->session->userdata('id');
        $this->db->select('
            tbl_pegawai.*, tbl_role.id AS id_role, tbl_role.name, tbl_role.description,
        ');
        $this->db->join('tbl_role', 'tbl_pegawai.id_role = tbl_role.id');
        $this->db->from('tbl_pegawai');
        $this->db->where('tbl_pegawai.idPegawai', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function reg()
    {
      date_default_timezone_set('ASIA/JAKARTA');
      $data = array(
        'username' => $this->input->post('username'),
        'nama' => $this->input->post('fullname'),
        'nip' => $this->input->post('nip'),
        'substansi' => $this->input->post('substansi'),
        'id_role' => '2',
        'created_at' => date('Y-m-d H:i:s'),
        'password' => get_hash($this->input->post('password'))
      );
      return $this->db->insert("tbl_pegawai", $data);
    }

    public function update($data, $id)
    {
        $this->db->where('tbl_pegawai.idPegawai', $id);
        $this->db->update('tbl_pegawai', $data);
        return $this->db->affected_rows();
	}


    public function logout($date, $id)
    {
        $this->db->where('tbl_pegawai.idPegawai', $id);
        $this->db->update('tbl_pegawai', $date);
    }
}
