<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lhk_model extends CI_Model
{


  function __construct()
  {
    parent::__construct();
  }

  public function jenisLhk($id)
  {
    $this->db->select('jenisLhk');
    $this->db->where('tbl_lhk.idLhk', $id);
    $query = $this->db->get('tbl_lhk');
    return $query->result();
  }

  public function jenisLhkSurat($id)
  {
    $this->db->select('jenisLhk');
    $this->db->where('tbl_lhk.idSuratTugas', $id);
    $query = $this->db->get('tbl_lhk');
    return $query->result();
  }


  public function jenisLhkSuratOne($id)
  {
    $this->db->select('jenisLhk');
    $this->db->where('tbl_lhk.idSuratTugas', $id);
    $query = $this->db->get('tbl_lhk');
    return $query->row('jenisLhk');
  }





  public function getLhk()
  {

    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat, tbl_lhk.tglLhk,  tbl_lhk.jenisLhk, tbl_lhk.idLhk');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where('tbl_lhk.jenisLhk', 'iklan');
    $this->db->or_where('tbl_lhk.jenisLhk', 'sertifikasi');
    $this->db->or_where('tbl_lhk.jenisLhk', 'sampling');
    $this->db->or_where('tbl_lhk.jenisLhk', 'pemeriksaan');
    $this->db->or_where('tbl_lhk.jenisLhk', 'umum');
    $query = $this->db->get('');
    return $query;
  }

  public function getLhkPenindakan()
  {

    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat, tbl_lhk.tglLhk,  tbl_lhk.jenisLhk, tbl_lhk.idLhk');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where('tbl_lhk.jenisLhk', 'penindakan');
    $query = $this->db->get('');
    return $query;
  }

  public function getLhkPengujian()
  {

    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat, tbl_lhk.tglLhk,  tbl_lhk.jenisLhk, tbl_lhk.idLhk');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where('tbl_lhk.jenisLhk', 'pengujian');
    $query = $this->db->get('');
    return $query;
  }
  
  public function getLhkInfokom()
  {

    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat, tbl_lhk.tglLhk,  tbl_lhk.jenisLhk, tbl_lhk.idLhk');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where('tbl_lhk.jenisLhk', 'infokom');
    $query = $this->db->get('');
    return $query;
  }

  public function getLhkTu()
  {

    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat, tbl_lhk.tglLhk,  tbl_lhk.jenisLhk, tbl_lhk.idLhk');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->where('tbl_lhk.jenisLhk', 'tu');
    $query = $this->db->get('');
    return $query;
  }

  public function getLhkDet($id)
  {

    $this->db->select('tbl_lhk.idLhk, tbl_lhk.tglLhk, tbl_lhk.jenisLhk, tbl_lhk.pejabatDituju, tbl_lhk.pengesahSppd, tbl_lhk.pengesahKwitansi, tbl_lhk.pengesahForm, tbl_lhk.rincianSampling, tbl_lhk.deskripsi, tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat, tbl_surattl.idSarana, tbl_surattl.isMk, tbl_surattl.temuan, tbl_surattl.deskripsiTemuan, tbl_surattl.jenisTl, tbl_sarana.namaSarana,tbl_pegawai.idPegawai');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_surattl', 'tbl_surattugas.idSurat = tbl_surattl.idSuratTugas', "left");
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana' , "left");
     $this->db->join('tbl_pegawai', 'tbl_lhk.idKetua = tbl_pegawai.idPegawai', "left");
    $this->db->where('tbl_lhk.idLhk', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function getNomorSurat($id)
  {

    $this->db->select('idSuratTugas');
    $this->db->from('tbl_lhk');
    $this->db->where('tbl_lhk.idLhk', $id);
    $query = $this->db->get();
    return $query->row('idSuratTugas');
  }

  public function getLhkDetail($id)
  {

    $this->db->select('tbl_lhk.idLhk, tbl_lhk.tglLhk, tbl_lhk.jenisLhk, tbl_lhk.pejabatDituju, tbl_lhk.pengesahSppd, tbl_lhk.pengesahKwitansi, tbl_lhk.pengesahForm, tbl_lhk.rincianSampling, tbl_lhk.deskripsi, tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat, tbl_surattl.idSarana,  tbl_surattl.isMk, tbl_surattl.temuan, tbl_surattl.deskripsiTemuan, tbl_surattl.jenisTl, tbl_sarana.namaSarana, tbl_pegawai.nama, tbl_pegawai.nip, tbl_pegawai.idPegawai');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_surattl', 'tbl_surattugas.idSurat = tbl_surattl.idSuratTugas', "left");
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana', "left");
    $this->db->join('tbl_pegawai', 'tbl_lhk.idKetua = tbl_pegawai.idPegawai', "left");
    $this->db->where('tbl_lhk.idSuratTugas', $id);
    $query = $this->db->get();
    return $query->result();
  }


  public function getFileLhk()
  {
    $this->db->select('file_lhk');
    $this->db->where('file_lhk = ', "0");
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
    $query = $this->db->get('tbl_lhk');
    return $query->num_rows();
  }

  public function getSuratTugas()
  {
    $this->db->select('tbl_surattugas.idSurat, tbl_surattugas.noSuratTugas');
    $this->db->from('tbl_surattugas');
    $this->db->where("tbl_surattugas.jenisSubstansi LIKE '' ");
    $query = $this->db->get();
    return $query->result();
  }

  public function getSuratTugasPenindakan()
  {
    $this->db->select('tbl_surattugas.idSurat, tbl_surattugas.noSuratTugas');
    $this->db->from('tbl_surattugas');
    $this->db->where('tbl_surattugas.jenisSubstansi', "penindakan");
    $query = $this->db->get();
    return $query->result();
  }

  public function getSuratTugasPengujian()
  {
    $this->db->select('tbl_surattugas.idSurat, tbl_surattugas.noSuratTugas');
    $this->db->from('tbl_surattugas');
    $this->db->where('tbl_surattugas.jenisSubstansi', "pengujian");
    $query = $this->db->get();
    return $query->result();
  }

  public function getSuratTugasInfokom()
  {
    $this->db->select('tbl_surattugas.idSurat, tbl_surattugas.noSuratTugas');
    $this->db->from('tbl_surattugas');
    $this->db->where('tbl_surattugas.jenisSubstansi', "infokom");
    $query = $this->db->get();
    return $query->result();
  }

  public function getSuratTugasTu()
  {
    $this->db->select('tbl_surattugas.idSurat, tbl_surattugas.noSuratTugas');
    $this->db->from('tbl_surattugas');
    $this->db->where('tbl_surattugas.jenisSubstansi', "tu");
    $query = $this->db->get();
    return $query->result();
  }


  public function getAtribut($id)
  {
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.tglSurat, tbl_surattugas.maksud, tbl_surattugas.tglMulai, tbl_surattugas.tglSelesai, tbl_surattugas.kota, tbl_pegawai.nama, tbl_pegawai.nip, tbl_pegawai.pangkat, tbl_pegawai.golongan, tbl_pegawai.jabatan');
    $this->db->from('tbl_surattugas');
    $this->db->join('tbl_tugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
    $this->db->join('tbl_pegawai', 'tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
    $this->db->where('tbl_surattugas.idSurat', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function checkDuplicate($id)
  {
    $this->db->join('tbl_surattugas', 'tbl_surattugas.idSurat= tbl_lhk.idSuratTugas');
    $this->db->where('tbl_lhk.idSuratTugas', $id);
    $query = $this->db->get('tbl_lhk');
    $count_row = $query->num_rows();
    if ($count_row > 0) {
      return false;
    } else {
      return true;
    }
  }

  public function checkDuplicateSarana($idSarana, $idSurat)
  {
    $this->db->select('idSarana');
    $this->db->where('idSarana', $idSarana);
    $this->db->where('idSuratTugas', $idSurat);
    $query = $this->db->get('tbl_surattl');
    $count_row = $query->num_rows();
    if ($count_row > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  public function getSarana()
  {
    $this->db->select('*');
    $this->db->from('tbl_sarana');
    $query = $this->db->get();
    return $query->result();
  }
  
  public function getKetuaTim()
  {
    $this->db->select('*');
    $this->db->from('tbl_pegawai');
    $this->db->where('tbl_pegawai.ketuaTim', '1');
    $query = $this->db->get();
    return $query->result();
  }


  public function getSaranaPem()
  {
    $this->db->select('*');
    $this->db->from('tbl_sarana');
    $query = $this->db->get();
    $json = $query->result();
    echo json_encode($json);
    //    $output = '<option value="">Pilih Sarana</option>';
    //    foreach($query->result() as $row)
    //    {
    //     $output .= '<option value="'.$row->idSarana.'">'.$row->namaSarana.'</option>';
    // }
    // return $output;


  }


  public function getSarana2($id)
  {
    $this->db->select('tbl_sarana.namaSarana,tbl_sarana.alamatSarana,tbl_sarana.kategoriSarana, tbl_sarana.jenisSarana');
    $this->db->from('tbl_sarana');
    $this->db->where('tbl_sarana.idSarana', $id);
    $query = $this->db->get();
    return $query->result();
  }


  public function getDetailSarana($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_surattl');
    $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
    $this->db->where('tbl_surattl.idSarana', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function updateSarana($data)
  {
    $this->db->set('idSarana', $data['idSarana']);
    $this->db->set('isMk', $data['isMk']);
    $this->db->set('deskripsiTemuan', $data['deskripsiTemuan']);
    $this->db->set('temuan', $data['temuan']);
    $this->db->set('jenisTl', $data['jenisTl']);
    $this->db->set('tglPeriksa', $data['tglPeriksa']);
    $this->db->where('idTl', $data['idTl']);
    $query = $this->db->update('tbl_surattl');
  }

  public function updateSaranaSertifikasi($data)
  {
    $this->db->set('idSarana', $data['idSarana']);
    $this->db->set('deskripsiTemuan', $data['deskripsiTemuan']);
    $this->db->where('idTl', $data['idTl']);
    $query = $this->db->update('tbl_surattl');
  }

  public function updateLhk($data)
  {
    $this->db->set('tglLhk', $data['tglLhk']);
    $this->db->set('pejabatDituju', $data['pejabat']);
    $this->db->set('pengesahSppd', $data['sppd']);
    $this->db->set('pengesahKwitansi', $data['kwitansi']);
    $this->db->set('pengesahForm', $data['form']);
    $this->db->set('idKetua', $data['idKetua']);
    $this->db->set('rincianSampling', $data['sampling']);
    $this->db->set('deskripsi', $data['deskripsi']);
    $this->db->where('idSuratTugas', $data['idSurat']);
    $query = $this->db->update('tbl_lhk');
  }


  public function getFile()
  {
    $this->db->select('filePeringatan');
    $this->db->where('filePeringatan = ', "0");
    $query = $this->db->get('tbl_peringatan');
    return $query->num_rows();
  }

 public function hapusLhk($id)
  {
    $sql = "DELETE tbl_lhk, tbl_surattl, tbl_peringatan , tbl_feedback from tbl_lhk left JOIN tbl_surattl on tbl_surattl.idSuratTugas = tbl_lhk.idSuratTugas left JOIN tbl_peringatan on tbl_surattl.idTl = tbl_peringatan.idTl left JOIN  tbl_feedback on tbl_feedback.idTl = tbl_surattl.idTl where tbl_lhk.idLhk = ?";
    $this->db->query($sql, array($id));
  }

  public function hapusDetailSarana($id)
  {
    $this->db->delete("tbl_surattl", array("idSuratTugas" => $id));
  }

  public function hapusPemeriksaan($id)
  {
    $this->db->delete("tbl_surattl", array("idSarana" => $id));
  }
  
  public function getKepalaBalai(){
      $this->db->select('*');
    $this->db->where('jabatan =','Kepala Balai POM di Batam');
    $query = $this->db->get('tbl_pegawai');
    return $query->result();
  }
}
