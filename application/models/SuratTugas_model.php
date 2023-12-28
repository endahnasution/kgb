<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SuratTugas_model extends CI_Model
{


  function __construct()
  {
    parent::__construct();
  }

  // main page
  public function getsurattugas()
  {
    $this->db->select('*');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->where("tbl_surattugas.jenisSubstansi LIKE '' " );
    $query = $this->db->get('');
    return $query->result();
  }

   public function getsurattugasedit($id)
  {
    $this->db->select('tbl_surattugas.idSurat,tbl_surattugas.jenisSubstansi,tbl_surattugas.noSuratTugas,  tbl_surattugas.maksud, tbl_surattugas.kota, tbl_surattugas.kendaraan, tbl_surattugas.tglMulai, tbl_surattugas.tglSelesai, tbl_anggaran2022.idAnggaran, tbl_anggaran2022.namaAnggaran, tbl_surattugas.tglSurat, tbl_surattugas.jabatanPenandatangan, tbl_surattugas.namaPenandatangan, tbl_anggaran2022.namaAnggaran, tbl_pegawai.nama,tbl_pegawai.idPegawai');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->join('tbl_tugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
    $this->db->where('tbl_surattugas.noSuratTugas', $id);
    $query = $this->db->get('');
    return $query->result();
  }
  
  
  public function getsurattugaspengujian()
  {
    $this->db->select('*');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->where('tbl_surattugas.jenisSubstansi', "pengujian");

    $query = $this->db->get('');
    return $query->result();
  }
  
  public function getsurattugaspenindakan()
  {
    $this->db->select('*');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->where('tbl_surattugas.jenisSubstansi', "penindakan");

    $query = $this->db->get('');
    return $query->result();
  }
  
  public function getsurattugastu()
  {
    $this->db->select('*');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->where('tbl_surattugas.jenisSubstansi', "tu");

    $query = $this->db->get('');
    return $query->result();
  }
  
  public function getsurattugasinfokom()
  {
    $this->db->select('*');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->where('tbl_surattugas.jenisSubstansi', "infokom");

    $query = $this->db->get('');
    return $query->result();
  }

  // petugas
  public function getpetugas()
  {
    $this->db->select('*');
    $this->db->from('tbl_pegawai');
    $query = $this->db->get('');
    return $query->result();
  }

   public function get_attr_petugas($id)
  {
    $this->db->select('tbl_pegawai.idPegawai, tbl_pegawai.golongan');
    $this->db->from('tbl_pegawai');
    $this->db->where('idPegawai', $id);
    $query = $this->db->get('');
    return $query->result();
  }

  //kota
  public function getkota()
  {
    $this->db->select('*');
    $this->db->from('tbl_kota');
    $query = $this->db->get('');
    return $query->result();
  }

  public function getanggaran()
  {
    $this->db->select('*');
    $this->db->from('tbl_anggaran2022');
    $query = $this->db->get('');
    return $query->result();
  }
  public function getanggaranpengujian()
  {
    $this->db->select('*');
    $this->db->from('tbl_anggaran2022');
    $query = $this->db->get('');
    return $query->result();
  }
  
  public function getanggaranpenindakan()
  {
    $this->db->select('*');
    $this->db->from('tbl_anggaran2022');
    $query = $this->db->get('');
    return $query->result();
  }
  
  public function getanggarantu()
  {
    $this->db->select('*');
    $this->db->from('tbl_anggaran2022');
    $query = $this->db->get('');
    return $query->result();
  }
  
  public function getanggaraninfokom()
  {
    $this->db->select('*');
    $this->db->from('tbl_anggaran2022');
    $query = $this->db->get('');
    return $query->result();
  }

  public function getSumTugas($noSuratTugas)
  {
    $this->db->select('*');
    $this->db->where('noSuratTugas = ', $noSuratTugas);
    $query = $this->db->get('tbl_tugas');
    return $query->num_rows();
  }

   public function delTblTugas($noSuratTugas)
  {
    $this->db->delete("tbl_tugas", array("noSuratTugas" => $noSuratTugas));
  }


  // ubah surat tugas
  public function ubah_surat($data)
  {
    $this->db->set('noSuratTugas', $data['noSur']);
    $this->db->set('tglSurat', $data['tglSur']);
    $this->db->set('tglMulai', $data['tglMulai']);
    //$this->db->set('bebanBiaya', $data['bebanBiaya']);
    $this->db->set('kendaraan', $data['kendaraan']);
    $this->db->set('kota', $data['kotas']);
    $this->db->set('idAnggaran', $data['idAnggaran']);
    $this->db->set('tglSelesai', $data['tglSelesai']);
    $this->db->set('maksud', $data['maksud']);
    $this->db->set('namaPenandatangan', $data['namaPenandatangan']);
    $this->db->set('jabatanPenandatangan', $data['jabatanPenandatangan']);
    //$this->db->set('idPetugas', $data['idpetugas']);

    $this->db->where('idSurat', $data['idSur']);
    $query = $this->db->update('tbl_surattugas');
  }

  // hapus surat tugas
 public function hapus_surat($id)
  {
    $sql = "DELETE tbl_surattugas, tbl_tugas, tbl_kwitansi, tbl_uraian, tbl_lhk, tbl_surattl, tbl_peringatan , tbl_monitoring, tbl_feedback from tbl_surattugas left JOIN tbl_tugas on tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas left JOIN tbl_kwitansi on tbl_kwitansi.idTugas = tbl_tugas.idTugas left JOIN tbl_uraian on tbl_kwitansi.idKwitansi = tbl_uraian.idKwitansi left JOIN tbl_lhk on tbl_lhk.idSuratTugas = tbl_surattugas.idSurat left JOIN tbl_surattl on tbl_surattl.idSuratTugas = tbl_surattugas.idSurat left JOIN tbl_peringatan on tbl_surattl.idTl = tbl_peringatan.idTl left JOIN  tbl_feedback on tbl_feedback.idTl = tbl_surattl.idTl left JOIN tbl_monitoring on tbl_monitoring.idPeringatan = tbl_peringatan.idPeringatan  where tbl_surattugas.idSurat = ?";
    $this->db->query($sql, array($id));
  }
  
    

  // print surat tugas
  public function print_surat($id)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.jenisSubstansi, tbl_tugas.noSuratTugas, tbl_tugas.idPetugas, tbl_pegawai.idPegawai, tbl_pegawai.nama, tbl_pegawai.pangkat, tbl_pegawai.golongan, tbl_pegawai.nip, tbl_pegawai.jabatan, tbl_surattugas.maksud, tbl_surattugas.kota, tbl_surattugas.kendaraan, tbl_surattugas.lamaPerjalanan, tbl_surattugas.tglMulai, tbl_surattugas.tglSelesai, tbl_anggaran2022.mak, tbl_surattugas.tglSurat, tbl_surattugas.jabatanPenandatangan, tbl_surattugas.namaPenandatangan');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_tugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->where('tbl_surattugas.idSurat', $id);
    $query = $this->db->get('');
    return $query;
  }
}
