<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model{


  function __construct()
  {
    parent::__construct();
  }

  public function getFeedback()
  { 

    $this->db->select('tbl_feedback.idFeedback,tbl_feedback.noFeedback, tbl_feedback.isiFeedback, tbl_sarana.namaSarana, tbl_feedback.tglFeedback, tbl_feedback.createdFeedback, tbl_feedback.petugasFeedback,tbl_pegawai.nama, tbl_surattl.idTl');
    $this->db->from('tbl_feedback');
    $this->db->join('tbl_pegawai', 'tbl_feedback.petugasFeedback = tbl_pegawai.idPegawai',"left ");
    $this->db->join('tbl_surattl', 'tbl_feedback.idTl = tbl_surattl.idTl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
  
    $query = $this->db->get('');
    return $query;
    
  }



  public function getFeedbackDashboard()
  { 

    $this->db->select('tbl_feedback.idFeedback,tbl_feedback.noFeedback, tbl_feedback.isiFeedback, tbl_sarana.namaSarana, tbl_feedback.tglFeedback, tbl_feedback.createdFeedback, tbl_feedback.petugasFeedback,tbl_pegawai.nama, tbl_surattl.idTl');
    $this->db->from('tbl_feedback');
    $this->db->join('tbl_pegawai', 'tbl_feedback.petugasFeedback = tbl_pegawai.idPegawai',"left ");
    $this->db->join('tbl_surattl', 'tbl_feedback.idTl = tbl_surattl.idTl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where('tbl_feedback.createdFeedback', 0);
    $query = $this->db->get('');
    return $query;
    
  }

  public function getFeedbackMonitoring()
  { 

    $this->db->select('tbl_feedback.idFeedback,tbl_feedback.noFeedback, tbl_feedback.isiFeedback, tbl_feedback.createdFeedback, tbl_sarana.namaSarana, tbl_feedback.tglFeedback');
    $this->db->from('tbl_feedback');
    $this->db->join('tbl_surattl', 'tbl_feedback.idTl = tbl_surattl.idTl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where_not_in('tbl_surattl.statusCapa', "CLOSED");
    $query = $this->db->get('');
    return $query;
    
  }


  public function getFeedbackId($id)
  { 

    $this->db->select('tbl_feedback.idFeedback,tbl_feedback.noFeedback, tbl_feedback.isiFeedback, tbl_sarana.namaSarana, tbl_feedback.tglFeedback, tbl_feedback.createdFeedback, tbl_feedback.petugasFeedback,tbl_pegawai.nama, tbl_surattl.idTl');
    $this->db->from('tbl_feedback');
    $this->db->join('tbl_pegawai', 'tbl_feedback.petugasFeedback = tbl_pegawai.idPegawai',"left ");
    $this->db->join('tbl_surattl', 'tbl_feedback.idTl = tbl_surattl.idTl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where('idFeedback', $id);
    $query = $this->db->get('');
    return $query;
    
  }

  public function getPetugas($id)
  { 

    $this->db->select('tbl_pegawai.idPegawai, tbl_pegawai.nama');
    $this->db->from('tbl_feedback');
    $this->db->join('tbl_surattl', 'tbl_feedback.idTl = tbl_surattl.idTl');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_tugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
    $this->db->where('idFeedback', $id);
    $query = $this->db->get('');
    return $query;
    
  }

  public function updateFeedback($data){
    $this->db->set('noFeedback', $data['noFeedback']);
    $this->db->set('isiFeedback', $data['isiFeedback']);
    $this->db->set('tglFeedback', $data['tglFeedback']);
    $this->db->set('idTl', $data['idTl']);

    $this->db->where('idFeedback', $data['idFeedback']);

    $query = $this->db->update('tbl_feedback');
  }

  public function updateCapa($statusFeedback,$idTl){
    $this->db->set('statusCapa', $statusFeedback);
    $this->db->where('idTl', $idTl);

    $query = $this->db->update('tbl_surattl');
  }


  public function updateCreatedCapa($created,$id,$idPetugas){
    $this->db->set('petugasFeedback', $idPetugas);
    $this->db->set('createdFeedback', $created);
    $this->db->where('idFeedback', $id);
    $query = $this->db->update('tbl_feedback');
  }


  public function getFile(){
    $this->db->select('file_feedback');
    $this->db->where('file_feedback = ', "0");
    $query = $this->db->get('tbl_feedback');
    return $query->num_rows();
  }

  public function getChecklist(){
   $this->db->select('*');
   $this->db->from('tbl_feedback');
   $this->db->join('tbl_peringatan', 'tbl_feedback.idSuratPeringatan = tbl_peringatan.idPeringatan');
   $this->db->where('closed <', 0);
   $query = $this->db->get('');
   return $query->num_rows();
 }

  public function hapus_SuratFeedback($id,$idTl){
    $this->db->set('tbl_surattl.statusCapa', "");   
    $this->db->where('idTl', $idTl);
    $this->db->update('tbl_surattl');  
  $this->db->delete("tbl_feedback",array("idFeedback"=>$id));
  }


 public function updateClosed($id, $editClosed){
  $this->db->set('closed', $editClosed, FALSE);    
  $this->db->where('idFeedback', $id);
  
  $this->db->update('tbl_feedback'); 
}

public function isMk($id, $editClosed){
  $this->db->set('isMk', $editClosed, FALSE); 
  $this->db->where('idSarana', $id);
   $this->db->update('tbl_surattl');  
}

public function getSarana($id){
  $this->db->select('idSarana');
  $this->db->from('tbl_surattl');
    $this->db->join('tbl_peringatan', 'tbl_peringatan.idTl = tbl_surattl.idTl');
    $this->db->join('tbl_feedback', 'tbl_feedback.idSuratPeringatan = tbl_peringatan.idPeringatan');
    $this->db->where('tbl_feedback.idFeedback', $id);
    $query = $this->db->get('');
    return $query->row();
  
}



}
