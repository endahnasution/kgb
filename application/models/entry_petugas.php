<?php

defined('BASEPATH') or exit('No direct script access allowed');

class entry_petugas extends CI_Model
{


  function __construct()
  {
    parent::__construct();
  }
  
  public function checkDuplicate($no_surat)
  {
    $this->db->where('noSuratPeringatan',$no_surat);
    $query = $this->db->get('tbl_pegawai');
    $count_row = $query->num_rows();
    if ($count_row > 0){
      return false;
    }
    else{
      return true;
    }
  }

  public function getentry_petugas()
  { 

    $this->db->select('tbl_pegawai.id, tbl_peringatan.tglSuratPeringatan, tbl_peringatan.noSuratPeringatan, tbl_peringatan.filePeringatan, tbl_surattl.namaSarana');
    $this->db->from('tbl_peringatan');
    $this->db->join('tbl_surattl', 'tbl_peringatan.idTl = tbl_surattl.id');
    $query = $this->db->get('');
    return $query;
  }

  public function updateSuratPeringatan($data){
    $this->db->set('tglSuratPeringatan', $data['tglSuratPeringatan']); 
    $this->db->set('noSuratPeringatan', $data['noSuratPeringatan']); 
    $this->db->set('filePeringatan', $data['filePeringatan']);
    $this->db->where('id', $data['id']);
    $query = $this->db->update('tbl_peringatan');

  }

  public function getFile(){
    $this->db->select('filePeringatan');
    $this->db->where('filePeringatan = ', "0");
    $query = $this->db->get('tbl_peringatan');
    return $query->num_rows();
  }

  public function hapusSuratPeringatan($id){
   $this->db->delete("tbl_peringatan",array("id"=>$id));
 }
}
