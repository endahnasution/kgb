<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_capa_model extends CI_Model{


      function __construct()
    {
        parent::__construct();
    }

    public function getFeedback()
    { 
      
    $this->db->select('tbl_feedback.idFeedback,tbl_feedback.noSuratFeedback, tbl_sarana.namaSarana, tbl_feedback.tglFeedback,  tbl_feedback.file_feedback, tbl_feedback.closed');
    $this->db->from('tbl_feedback');
    $this->db->join('tbl_peringatan', 'tbl_feedback.idSuratPeringatan = tbl_peringatan.idPeringatan');
     $this->db->join('tbl_surattl', 'tbl_peringatan.idTl = tbl_surattl.idTl');
      $this->db->join('tbl_lhk', 'tbl_surattl.idLhk = tbl_lhk.idLhk');
      $this->db->join('tbl_sarana', 'tbl_lhk.idSarana = tbl_sarana.idSarana');
    $this->db->order_by("tbl_feedback.closed","asc" );
    $query = $this->db->get('');
    return $query;
    
    }

    public function getChecklist(){
         $this->db->select('closed');
         $this->db->where('closed <', 0);
         $query = $this->db->get('tbl_feedback');
         return $query->num_rows();
    }

    public function updateClosed($id, $editClosed){
        $this->db->set('closed', $editClosed, FALSE);    
        $this->db->where('idFeedback', $id);
        $this->db->update('tbl_feedback'); 
    }



}
