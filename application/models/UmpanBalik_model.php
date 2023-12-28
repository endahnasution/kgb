<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UmpanBalik_model extends CI_Model{


      function __construct()
    {
        parent::__construct();
    }

    public function getSarana(){
        $this->db->select('*');
        $this->db->from('tbl_sarana');
        $query = $this->db->get('');
        return $query->result();
    }

    public function getSaranaFeedback($id){
        // SELECT * FROM `tbl_surattugas` JOIN `tbl_surattl` ON `tbl_surattl`.`idSuratTugas` = `tbl_surattugas`.`idSurat` WHERE `tbl_surattl`.`idSuratTugas` = '18'
        // $this->db->select('*');
        // $this->db->from('tbl_sarana');
        // $this->db->join('tbl_surattl', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
        // $this->db->where('tbl_surattl.idSuratTugas', $id);
        // $query = $this->db->get('');
        $this->db->select('*');
        $this->db->from('tbl_surattugas');
        $this->db->join('tbl_surattl', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
        $this->db->where('tbl_surattl.idSarana', $id);
        $query = $this->db->get('');
        $output = '<option value="">Nama Sarana</option>';
        $output=""; 
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->idSurat.'">'.$row->noSuratTugas.'</option>';
   }
   return $output;
  }
    

    public function getHistory($idSurat,$idSarana)
    { 
       
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_peringatan.noSuratPeringatan, tbl_peringatan.jenisPeringatan, tbl_peringatan.tglSuratPeringatan, tbl_peringatan.isiCapa, tbl_surattl.deskripsiTemuan, tbl_surattl.jenisTl, tbl_sarana.namaSarana, tbl_feedback.noSuratFeedback, tbl_feedback.tglFeedback, tbl_feedback.closed, tbl_feedback.isiFeedback,tbl_feedback.file_feedback');
    $this->db->from('tbl_peringatan');
    $this->db->join('tbl_feedback', 'tbl_peringatan.idPeringatan = tbl_feedback.idSuratPeringatan','left');
    $this->db->join('tbl_surattl', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->where(array('tbl_surattugas.idSurat'=>$idSurat, 'tbl_sarana.idSarana'=> $idSarana ));
    $query = $this->db->get();
    return $query;
    
    }



}
