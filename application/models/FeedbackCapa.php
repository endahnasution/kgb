<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeedbackCapa extends CI_Model{


  function __construct()
  {
    parent::__construct();
  }
  
  
  public function getPeringatan(){
    $this->db->select('*');
    $this->db->from('tbl_peringatan');
    $this->db->where('status','0');      
    $query = $this->db->get('');
    return $query->result();
  }


  public function getSaranaTl(){
    $this->db->select('tbl_surattl.idTl, tbl_sarana.namaSarana');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where_not_in('tbl_surattl.statusCapa', "CLOSED"); 
     
    $query = $this->db->get('');
    return $query->result();
  }
  
  
//   function getSaranaModel(){
//     $this->db->select('namaSarana');
//     $this->db->from('tbl_sarana');
//     $this->db->where('idSarana','3');      
//     $query = $this->db->get('');
//     return $query->result();
//   }

  function getSaranaModel($id){
    $this->db->select('*');
    $this->db->from('tbl_sarana');
    $this->db->join('tbl_surattl', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->join('tbl_peringatan', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->where('tbl_peringatan.idPeringatan', $id);
    $query = $this->db->get('');
    $output = '<option value="">Nama Sarana</option>';
    $output=""; 
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->idSarana.'">'.$row->namaSarana.'</option>';
   }
   return $output;
  }

  // public function uploadFeedback($data){
  //   $this->db->set('file_feedback', $data['file_feedback']);
  // }


  
//  function saveData($params){
//    $this->db->insert('tbl_feedback',$params);

//    $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
//    redirect('/admin/Feedback', 'refresh');
//  }

 public function editPeringatan($id){
  $this->db->set('status',"1");    
  $this->db->where('idPeringatan', $id);
  $this->db->update('tbl_peringatan'); 
    }
}
