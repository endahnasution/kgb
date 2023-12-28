<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratPJlukota_model extends CI_Model{


      function __construct()
    {
        parent::__construct();
    }


	public function getid_surat($id_surat){
        $this->db->select('*');
		$this->db->where('id_surat', $id_surat);
		$query = $this->db->get('tbl_surattugas');
		return $query->result();
    }


}
