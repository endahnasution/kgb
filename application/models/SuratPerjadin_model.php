<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratPerjadin_model extends CI_Model
{


  function __construct()
  {
    parent::__construct();
  }

  public function getSuratTugas()
  {
    $this->db->select('*');
    $this->db->from('tbl_surattugas');
    $query = $this->db->get('');
    return $query->result();
  }


  public function getPetugas($id)
  {
    $this->db->select('tbl_pegawai.idPegawai,tbl_pegawai.nama');
    $this->db->from('tbl_tugas');
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
    $this->db->where('tbl_tugas.noSuratTugas', $id);
    $query = $this->db->get('');
    $output = '<option value="">Pilih Petugas</option>';
    foreach ($query->result() as $row) {
      $output .= '<option value="' . $row->idPegawai . '">' . $row->nama . '</option>';
    }
    return $output;
  }

  // print SPD
  public function print_spd($id, $idPetugas)
  {
    $this->db->select('tbl_tugas.urutan, tbl_surattugas.noSuratTugas, tbl_tugas.idPetugas, tbl_pegawai.nama, tbl_pegawai.pangkat, tbl_pegawai.golongan, tbl_pegawai.nip, tbl_pegawai.jabatan, tbl_surattugas.maksud, tbl_surattugas.kota, tbl_surattugas.kendaraan, tbl_surattugas.lamaPerjalanan, tbl_surattugas.tglMulai, tbl_surattugas.tglSelesai, tbl_anggaran2022.mak, tbl_surattugas.tglSurat, tbl_surattugas.jabatanPenandatangan, tbl_surattugas.namaPenandatangan');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_tugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
    $this->db->join('tbl_anggaran2022', 'tbl_surattugas.idAnggaran = tbl_anggaran2022.idAnggaran');
    $this->db->where(array('tbl_tugas.noSuratTugas' => $id, 'tbl_tugas.idPetugas' => $idPetugas));
    $query = $this->db->get('');
    return $query;
  }

  public function getPejabat($nama)
  {
    $this->db->select('tbl_pegawai.jabatan,tbl_pegawai.nama, tbl_pegawai.nip');
    $this->db->from('tbl_pegawai');
    $this->db->where('tbl_pegawai.nama', $nama);
    $query = $this->db->get('');
    return $query->result();
  }
}
