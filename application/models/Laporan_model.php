<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  // Listing Konfigurasi
  public function getLaporanAll($jenis, $komoditi, $status, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('group_concat(tbl_pegawai.nama) as namaPetugas ,,tbl_surattugas.noSuratTugas,tbl_sarana.namaSarana,tbl_sarana.alamatSarana, tbl_surattugas.tglSurat, tbl_surattugas.tglMulai, tbl_surattugas.tglSelesai, tbl_surattugas.maksud, tbl_sarana.kategoriSarana, tbl_surattl.deskripsiTemuan, tbl_surattl.jenisTl,tbl_surattl.isMk, tbl_peringatan.isiPeringatan');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_surattl', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->join('tbl_peringatan', 'tbl_peringatan.idTl = tbl_surattl.idTl', 'left');
    $this->db->join('tbl_tugas', 'tbl_tugas.noSuratTugas = tbl_surattugas.noSuratTugas');
    $this->db->join('tbl_pegawai', 'tbl_pegawai.idPegawai = tbl_tugas.idPetugas');
    $this->db->where('tbl_sarana.jenisSarana', $jenis);
    $this->db->where('tbl_sarana.kategoriSarana', $komoditi);
    $this->db->where('tbl_surattl.isMk', $status);
    // $this->db->where('tbl_surattugas.tglSurat BETWEEN "'. date('Y-m-d', strtotime($tglAwal)). '" and "'. date('Y-m-d', strtotime($tglAkhir)).'"');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $this->db->group_by('tbl_sarana.namaSarana');
    $query = $this->db->get();
    return $query->result();
  }

  public function getLaporanSurat($tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.maksud, tbl_surattugas.kota, tbl_surattugas.tglMulai, tbl_surattugas.tglSelesai, tbl_sarana.namaSarana, tbl_sarana.alamatSarana, tbl_sarana.jenisSarana,tbl_surattl.jenisTl, tbl_surattl.temuan, tbl_surattl.isMk,tbl_surattl.deskripsiTemuan, tbl_peringatan.noSuratPeringatan, tbl_peringatan.tglSuratPeringatan');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_surattl', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat', 'left');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana', 'left');
    $this->db->join('tbl_peringatan', 'tbl_peringatan.idTl = tbl_surattl.idTl', 'left');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $query = $this->db->get();
    return $query->result();
  }

  public function getLaporanAnggaran($tahun)
  {
    if ($tahun == "2021") {
      $this->db->select('tbl_anggaran2021.mak, tbl_anggaran2021.namaAnggaran, tbl_anggaran2021.divisi, tbl_anggaran2021.kode, tbl_anggaran2021.pagu, sum(tbl_uraian.biaya) as biaya');
      $this->db->from('tbl_uraian');
      $this->db->join('tbl_kwitansi', 'tbl_uraian.idKwitansi = tbl_kwitansi.idKwitansi');
      $this->db->join(' tbl_tugas', 'tbl_kwitansi.idTugas = tbl_tugas.idTugas');
      $this->db->join(' tbl_surattugas', 'tbl_tugas.noSuratTugas  = tbl_surattugas.noSuratTugas');
      $this->db->join('tbl_anggaran2021', 'tbl_surattugas.idAnggaran = tbl_anggaran2021.idAnggaran');
      $this->db->where("tbl_surattugas.tglSurat LIKE '%$tahun%'");
      $this->db->group_by('tbl_anggaran2021.mak');
      $query = $this->db->get();
      return $query;
    } else if ($tahun == "2022") {
      $this->db->select('tbl_anggaran2022.mak, tbl_anggaran2022.namaAnggaran, tbl_anggaran2022.jenisSubstansi, tbl_anggaran2022.kode, tbl_anggaran2022.pagu, sum(tbl_uraian.biaya) as biaya');
      $this->db->from('tbl_uraian');
      $this->db->join('tbl_kwitansi', 'tbl_uraian.idKwitansi = tbl_kwitansi.idKwitansi');
      $this->db->join(' tbl_tugas', 'tbl_kwitansi.idTugas = tbl_tugas.idTugas');
      $this->db->join(' tbl_surattugas', 'tbl_tugas.noSuratTugas  = tbl_surattugas.noSuratTugas');
      $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
      $this->db->where("tbl_surattugas.tglSurat LIKE '%$tahun%'");
      $this->db->group_by('tbl_anggaran2022.mak');
      $query = $this->db->get();
      return $query;
    }
  }
  
    public function getRekapDetail($tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_surattugas.noSuratTugas,  tbl_kwitansi.noSpm, tbl_pegawai.nama ');
    $this->db->from('tbl_kwitansi');
    $this->db->join('tbl_tugas', 'tbl_kwitansi.idTugas = tbl_tugas.idTugas', "left");
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai', "left");

    $this->db->join('tbl_surattugas', 'tbl_tugas.noSuratTugas = tbl_surattugas.noSuratTugas', "left");
    

    $this->db->where('tbl_surattugas.tglSurat BETWEEN "' . date('Y-m-d', strtotime($tglAwal)) . '" and "' . date('Y-m-d', strtotime($tglAkhir)) . '"');
    $query = $this->db->get();
    return $query->result();
  }
  
  public function getRekapIdentitas($tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.maksud, tbl_anggaran2022.mak');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran', "left");

    $this->db->where('tbl_surattugas.tglSurat BETWEEN "' . date('Y-m-d', strtotime($tglAwal)) . '" and "' . date('Y-m-d', strtotime($tglAkhir)) . '"');
    $query = $this->db->get();
    return $query->result();
  }

  public function getRekapUraian($tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.maksud, tbl_anggaran2022.mak, tbl_kwitansi.noSpm, tbl_pegawai.nama , tbl_kwitansi.idKwitansi');
    $this->db->from('tbl_kwitansi');
    $this->db->join('tbl_tugas', 'tbl_kwitansi.idTugas = tbl_tugas.idTugas', "left");
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai', "left");

    $this->db->join('tbl_surattugas', 'tbl_tugas.noSuratTugas = tbl_surattugas.noSuratTugas', "left");
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran', "left");

    $this->db->where('tbl_surattugas.tglSurat BETWEEN "' . date('Y-m-d', strtotime($tglAwal)) . '" and "' . date('Y-m-d', strtotime($tglAkhir)) . '"');
    $query = $this->db->get();
    return $query->result();
  }

 
  public function getRekapUh($tglAwal, $tglAkhir, $kategori)
  {
    $this->db->select('tbl_surattugas.idSurat,tbl_surattugas.noSuratTugas,sum(tbl_uraian.biaya) as biaya');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_tugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
    $this->db->join('tbl_kwitansi', 'tbl_tugas.idTugas = tbl_kwitansi.idTugas');
    $this->db->join('tbl_uraian', 'tbl_kwitansi.idKwitansi = tbl_uraian.idKwitansi');
    $this->db->where('tbl_uraian.kategori', $kategori);
    $this->db->where('tbl_surattugas.tglSurat BETWEEN "' . date('Y-m-d', strtotime($tglAwal)) . '" and "' . date('Y-m-d', strtotime($tglAkhir)) . '"');
    $this->db->group_by('tbl_surattugas.idSurat');
    $query = $this->db->get();
    return $query->result();
  }

  public function getRekapTransportDanHotel($tglAwal, $tglAkhir, $kategori)
  {
    if($kategori == "tr"){
      $this->db->select('tbl_surattugas.noSuratTugas, sum(tbl_uraian.biaya) as biaya, tbl_uraian.kategori, tbl_uraian.idKwitansi , tbl_uraian.pulangPergi, tbl_uraian.bbm, tbl_uraian.namaMaskapai, tbl_uraian.noTiket, tbl_uraian.kodeBooking, tbl_uraian.noPenerbangan, tbl_uraian.tempatAsal, tbl_uraian.tempatTujuan, tbl_uraian.tanggalTerbang');
    }else{
      $this->db->select('tbl_surattugas.noSuratTugas,tbl_surattugas.idSurat, sum(tbl_uraian.biaya) as biaya, tbl_uraian.kategori, tbl_uraian.idKwitansi , tbl_uraian.namaHotel, tbl_uraian.alamatHotel,tbl_uraian.noTeleponHotel,tbl_uraian.tanggalCheckin, tbl_uraian.tanggalCheckout, tbl_uraian.noInvoice, tbl_uraian.potonganHotel');
    }
    $this->db->from('tbl_uraian');
    $this->db->join('tbl_kwitansi', 'tbl_kwitansi.idKwitansi = tbl_uraian.idKwitansi', "right");
    $this->db->join('tbl_tugas', 'tbl_tugas.idTugas = tbl_kwitansi.idTugas', "right");
    $this->db->join('tbl_surattugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas', "right");
    $this->db->where('tbl_uraian.kategori', $kategori);
    $this->db->where('tbl_surattugas.tglSurat BETWEEN "' . date('Y-m-d', strtotime($tglAwal)) . '" and "' . date('Y-m-d', strtotime($tglAkhir)) . '"');
    $this->db->group_by('tbl_surattugas.idSurat');
    $query = $this->db->get();
    return $query->result();
  }

  public function getPetugasSurat($tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_pegawai.nama');
    $this->db->from('tbl_pegawai');
    $this->db->join('tbl_tugas', 'tbl_pegawai.idPegawai = tbl_tugas.idPetugas');
    $this->db->join('tbl_surattugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $query = $this->db->get();
    return $query->result();
  }

  public function getFeedbackSurat($tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_sarana.namaSarana ,tbl_feedback.noFeedback, max(tbl_feedback.tglFeedback) as tglFeedback');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_surattl', 'tbl_surattugas.idSurat = tbl_surattl.idSuratTugas', "left");
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->join('tbl_feedback', 'tbl_surattl.idTl = tbl_feedback.idTl', "left");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $this->db->group_by('tbl_sarana.namaSarana');
    $query = $this->db->get();
    return $query->result();
  }

  public function getClosedSurat($tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_sarana.namaSarana ,tbl_peringatan.noSuratPeringatan, tbl_peringatan.tglSuratPeringatan, tbl_peringatan.pembuatCapa');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_surattl', 'tbl_surattugas.idSurat = tbl_surattl.idSuratTugas');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->join('tbl_peringatan', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $this->db->where("tbl_peringatan.jenisPeringatan", "Close CAPA");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $query = $this->db->get();
    return $query->result();
  }

  public function getHasilPemeriksaan($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where('tbl_surattugas.tglSurat BETWEEN "' . date('Y-m-d', strtotime($tglAwal)) . '" and "' . date('Y-m-d', strtotime($tglAkhir)) . '"');
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }

    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);
    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }

  public function getMKPemeriksaan($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.isMk, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }
    $this->db->where("tbl_surattl.isMk", "1");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);

    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }

  //  public function getTMKPemeriksaan($index1,$index2,$index3,$index4,$index5,$index6,$param, $tglAwal,$tglAkhir,$kota){
  //  $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.isMk, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
  //  $this->db->from('tbl_surattl');
  //  $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
  //   $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
  //   $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
  //  $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
  //  $this->db->where("tbl_surattl.isMk", 0);
  //  $this->db->group_start();  
  //  $this->db->where('tbl_sarana.jenisSarana',$index1);
  //  $this->db->or_where('tbl_sarana.jenisSarana',$index2);
  //  $this->db->or_where('tbl_sarana.jenisSarana',$index3);
  //  $this->db->or_where('tbl_sarana.jenisSarana',$index4);
  //   $this->db->or_where('tbl_sarana.jenisSarana',$index5);
  //    $this->db->group_end();
  //   $query = $this->db->get('');
  //  $count_row = $query->num_rows();
  //  return $count_row;
  // }
  
  
  public function getnoTl($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.jenisTl, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }
    $this->db->where("tbl_surattl.jenisTl", "-");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }




  public function getPembinaan($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.jenisTl, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }
    $this->db->where("tbl_surattl.jenisTl", "Pembinaan");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);
    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }

  public function getPembinaanTek($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.jenisTl, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }
    $this->db->where("tbl_surattl.jenisTl", "Pembinaan Teknis");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);
    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();

    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }

  public function getPeringatan($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.jenisTl, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }
    $this->db->where("tbl_surattl.jenisTl", "Peringatan");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }

  public function getPeringatanKeras($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.jenisTl, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }
    $this->db->where("tbl_surattl.jenisTl", "Peringatan Keras");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();

    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }

  public function getPSK($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir, $kota)
  {
    $this->db->select('tbl_sarana.idSarana, tbl_surattl.idSarana, tbl_surattl.idSuratTugas, tbl_surattl.jenisTl, tbl_surattugas.idSurat, tbl_surattugas.tglSurat');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
    $this->db->where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    if ($kota != "Semua") {
      $this->db->where('tbl_surattugas.kota', $kota);
    }
    $this->db->where("tbl_surattl.jenisTl", "Penghentian Sementara Kegiatan");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }


  public function getTlDibuat($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_peringatan.noSuratPeringatan, tbl_sarana.jenisSarana');
    $this->db->from('tbl_peringatan ');
    $this->db->join('tbl_surattl', 'tbl_peringatan.idTl = tbl_surattl.idTl ');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");

    $this->db->where("substr( tbl_peringatan.noSuratPeringatan, 25) like 'x%'");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }


  public function getTlDikirim($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_peringatan.noSuratPeringatan, tbl_sarana.jenisSarana');
    $this->db->from('tbl_peringatan ');
    $this->db->join('tbl_surattl', 'tbl_peringatan.idTl = tbl_surattl.idTl ');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $this->db->where("substr( tbl_peringatan.noSuratPeringatan, 25) not like 'x%'");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }


  public function getFeedbackDiterima($index1, $index2, $index3, $index4, $index5, $index6, $param, $tglAwal, $tglAkhir)
  {
    $this->db->select('tbl_feedback.noFeedback , tbl_sarana.jenisSarana');
    $this->db->from('tbl_feedback');
    $this->db->join('tbl_surattl', 'tbl_feedback.idTl = tbl_surattl.idTl ');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') >='$tglAwal'");
    $this->db->where("DATE_FORMAT(tbl_surattugas.tglSurat,'%Y-%m-%d') <='$tglAkhir'");
    $this->db->group_start();
    $this->db->where('tbl_sarana.jenisSarana', $index1);
    $this->db->or_where('tbl_sarana.jenisSarana', $index2);
    $this->db->or_where('tbl_sarana.jenisSarana', $index3);
    $this->db->or_where('tbl_sarana.jenisSarana', $index4);
    $this->db->or_where('tbl_sarana.jenisSarana', $index5);

    $this->db->or_where('tbl_sarana.jenisSarana', $index6);
    $this->db->where('tbl_sarana.kategoriSarana', $param);
    $this->db->group_end();
    $query = $this->db->get('');
    $count_row = $query->num_rows();
    return $count_row;
  }
}
