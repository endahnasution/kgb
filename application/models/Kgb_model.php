<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kgb_model extends CI_Model{


  function __construct()
  {
    parent::__construct();
}



public function getKgb($id){
    $this->db->select('*');
    $this->db->from('tbl_kgb');
    $this->db->join('tbl_pegawai', 'tbl_pegawai.idPegawai = tbl_kgb.idPegawai',"left");
    $this->db->where('tbl_pegawai.idPegawai', $id);
    $query = $this->db->get('');
    return $query->result();
}



public function getKgbId($id){
  $this->db->select('*');
  $this->db->from('tbl_kgb');
  $this->db->join('tbl_pegawai', 'tbl_pegawai.idPegawai = tbl_kgb.idPegawai',"left");
  $this->db->where('tbl_kgb.idKgb', $id);
  $query = $this->db->get('');
  return $query->row();
}

public function updateKgb($data){
  $this->db->set('sk_baru', $data['sk_baru']); 
   $this->db->set('tgl_sk_baru', $data['tgl_sk_baru']);
   $this->db->set('status_kgb', 'Pengajuan');
   $this->db->where('idKgb', $data['idKgb']);
   $query = $this->db->update('tbl_kgb');
}


public function updateFileKgb($data){
  $this->db->set('file_kgb', $data['file_kgb']); 
   $this->db->where('idKgb', $data['idKgb']);
   $query = $this->db->update('tbl_kgb');
}


public function hapus_kgb($id){
  $this->db->delete("tbl_kgb",array("idKgb"=>$id));
}



public function checkDuplicate($noSurat)
  {
    $this->db->select('sk_baru');
    $this->db->where('sk_baru', $noSurat);
    $query = $this->db->get('tbl_kgb');
    $count_row = $query->num_rows();
    if ($count_row > 0) {
      return 1;
    } else {
      return 0;
    }
  }




}