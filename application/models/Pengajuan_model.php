<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model{


  function __construct()
  {
    parent::__construct();
}


public function getPengajuanSelesai(){
    $this->db->select('*');
    $this->db->from('tbl_kgb');
    $this->db->join('tbl_pegawai', 'tbl_kgb.idPegawai = tbl_pegawai.idPegawai',"left");
    $this->db->where('status_kgb', 'Diterima');
    $query = $this->db->get('');
    return $query->result();
}

public function getPengajuanBaru(){
    $this->db->select('*');
    $this->db->from('tbl_kgb');
    $this->db->join('tbl_pegawai', 'tbl_kgb.idPegawai = tbl_pegawai.idPegawai',"left");
    $this->db->where('status_kgb', 'Pengajuan')
    ->or_where('status_kgb', 'Ditolak');
    $query = $this->db->get('');
    return $query->result();
}


public function countPengajuanBaru(){
  $this->db->select('*');
  $this->db->from('tbl_kgb');
  $this->db->join('tbl_pegawai', 'tbl_kgb.idPegawai = tbl_pegawai.idPegawai',"left");
  $this->db->where('status_kgb', 'Pengajuan')
  ->or_where('status_kgb', 'Ditolak');
  $query = $this->db->get('');
  return $query->num_rows();
}

public function countPengajuanSelesai(){
  $this->db->select('*');
  $this->db->from('tbl_kgb');
  $this->db->join('tbl_pegawai', 'tbl_kgb.idPegawai = tbl_pegawai.idPegawai',"left");
  $this->db->where('status_kgb', 'Diterima');
  $query = $this->db->get('');
  return $query->num_rows();
}


public function updateKgb($data){
    $this->db->set('sk_baru', $data['sk_baru']); 
     $this->db->set('tgl_sk_baru', $data['tgl_sk_baru']);
     $this->db->set('gapok_baru', $data['gapok_baru']); 
     $this->db->set('status_kgb', $data['status']); 
     $this->db->set('note_kgb', $data['note_kgb']); 
     $this->db->where('idKgb', $data['idKgb']);
     $query = $this->db->update('tbl_kgb');
  }

  public function updatePegawai($data){
    $this->db->set('golongan', $data['golongan']); 

     $this->db->where('idPegawai', $data['idPegawai']);
     $query = $this->db->update('tbl_pegawai');
  }





}