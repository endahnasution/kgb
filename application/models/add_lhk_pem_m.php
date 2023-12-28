<?php

defined('BASEPATH') or exit('No direct script access allowed');

class add_lhk_pem_m extends CI_Model
{
 
  public $idLhk;
  public $idSuratTugas;
  public $kegiatan;
  public $tglPemeriksaan;
  public $kota;
  public $petugas1;
  public $petugas2;
  public $petugas3;
  public $petugas4;
  public $jenisSarana;
  public $idSarana;
  public $temuanRHPK;
  public $isMk;
  public $tindakLanjut;
  public $alasanTidakDiperiksa;
  public $keterangan;
  

  function __construct()
  {
      parent::__construct();
  }
  
  public function checkDuplicate($idSuratTugas)
  {
      $this->db->where('idSuratTugas',$idSuratTugas);
      $query = $this->db->get('tbl_lhk');
      $count_row = $query->num_rows();
      if ($count_row > 0){
          return false;
      }
      else{
          return true;
      }
  }  
  }