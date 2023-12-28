<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratObat_model extends CI_Model{


      function __construct()
    {
        parent::__construct();
    }


	public function getTemuan($jenis){
        $this->db->select('*');
		$this->db->where('jenis', $jenis);
		$query = $this->db->get('tbl_temuan_obat');
		return $query->result();
    }

	public function getPasal($id_temuan){
		$this->db->select('*');
		$this->db->where('id_temuan', $id_temuan);
		$query = $this->db->get('tbl_pasal_obat');
		return $query->result();
	}
}
