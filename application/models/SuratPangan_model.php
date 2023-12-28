<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratPangan_model extends CI_Model{


      function __construct()
    {
        parent::__construct();
    }


	public function getTemuan(){
        $query = $this->db->query("SELECT * FROM tbl_temuan_pangan");
        return $query->result();
    }

	public function getPasal($id_temuan){
		$this->db->select('*');
		$this->db->where('id_temuan', $id_temuan);
		$query = $this->db->get('tbl_pasal_pangan');
		return $query->result();
	}
}
