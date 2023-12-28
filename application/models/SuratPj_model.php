<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratPj_model extends CI_Model{


  function __construct()
  {
    parent::__construct();
}


public function getTugas(){
    $this->db->select('tbl_tugas.idTugas, tbl_tugas.noSuratTugas, tbl_surattugas.noSuratTugas');
    $this->db->from('tbl_tugas');
    $this->db->join('tbl_surattugas', 'tbl_tugas.noSuratTugas = tbl_surattugas.noSuratTugas');
    $this->db->group_by('tbl_tugas.noSuratTugas');
    $query = $this->db->get('');
    return $query->result();
}

public function getPetugas($id){
    $this->db->select('tbl_tugas.idTugas,tbl_pegawai.nama');
    $this->db->from('tbl_tugas');
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
    $this->db->where('tbl_tugas.noSuratTugas', $id);
    $query = $this->db->get('');
    $output = '<option value="">Pilih Petugas</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->idTugas.'">'.$row->nama.'</option>';
 }
 return $output;


}

public function getRowKwitansi(){
    $this->db->select('idKwitansi');
    $this->db->from('tbl_kwitansi');
    $this->db->order_by('idKwitansi','desc');
     $this->db->limit(1);  
     $query = $this->db->get('');
     return $query->row();
}

public function ubahKw($tgl, $spm, $idKw)
  {
    $this->db->set('tglKwitansi', $tgl);
    $this->db->set('noSpm', $spm);

    $this->db->where('idKwitansi', $idKw);
    $query = $this->db->update('tbl_kwitansi');
  }

  public function hapusUraian($idKw)
  {
    $this->db->delete("tbl_uraian", array("idKwitansi" => $idKw));
  }



}
