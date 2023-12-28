<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SuratPeringatan_model extends CI_Model
{


  function __construct()
  {
    parent::__construct();
  }

  public function checkDuplicate($no_surat)
  {
    $this->db->where('noSuratPeringatan', $no_surat);
    $query = $this->db->get('tbl_peringatan');
    $count_row = $query->num_rows();
    if ($count_row > 0) {
      return false;
    } else {
      return true;
    }
  }

  public function getSuratPeringatan()
  {

    $this->db->select('tbl_peringatan.idPeringatan, tbl_peringatan.tglSuratPeringatan, tbl_peringatan.jenisPeringatan, tbl_peringatan.noSuratPeringatan,  tbl_surattl.jenisTl, tbl_sarana.namaSarana');
    $this->db->from('tbl_peringatan');
    $this->db->join('tbl_surattl', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    // $this->db->where("tbl_peringatan.jenisCapa", "");

    $query = $this->db->get('');
    return $query;
  }

  public function getPeringatanEdit($id)
  {
    $this->db->select('tbl_peringatan.idPeringatan, tbl_peringatan.tglSuratPeringatan, tbl_peringatan.noSuratPeringatan, tbl_peringatan.tglPeriksa,tbl_peringatan.noIzin, tbl_peringatan.namaPimpinan, tbl_peringatan.namaPj, tbl_peringatan.noSipa,tbl_peringatan.nib, tbl_peringatan.noHp,tbl_peringatan.idTl, tbl_peringatan.detailPeringatan, tbl_peringatan.pasalPeringatan, tbl_surattl.idSarana, tbl_surattl.deskripsiTemuan, tbl_sarana.namaSarana, tbl_surattugas.noSuratTugas');
    $this->db->from('tbl_peringatan');
    $this->db->join('tbl_surattl', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->join('tbl_surattugas', 'tbl_surattugas.idSurat = tbl_surattl.idSuratTugas');
    $this->db->where("tbl_peringatan.idPeringatan", $id);
    $query = $this->db->get('');
    return $query->result();
  }



  public function updateSuratPeringatan($data)
  {
    $this->db->set('tglSuratPeringatan', $data['tglSuratPeringatan']);
    $this->db->set('noSuratPeringatan', $data['noSuratPeringatan']);
    $this->db->set('tglPeriksa', $data['tglPeriksa']);
    $this->db->set('noIzin', $data['noIzin']);
    $this->db->set('namaPimpinan', $data['namaPimpinan']);
    $this->db->set('namaPj', $data['namaPj']);
    $this->db->set('noSipa', $data['noSipa']);
    $this->db->set('nib', $data['nib']);
    $this->db->set('noHp', $data['noHp']);
    // $this->db->set('detailPeringatan', $data['detailPeringatan']);
    $this->db->set('pasalPeringatan', $data['pasalPeringatan']);
    $this->db->where('idPeringatan', $data['idPeringatan']);
    $query = $this->db->update('tbl_peringatan');
  }

  public function getFile()
  {
    $this->db->select('filePeringatan');
    $this->db->from('tbl_peringatan');
    $this->db->join('tbl_surattl', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->where('filePeringatan = ', "0");
    $this->db->where('tbl_peringatan.jenisCapa', "");
    $query = $this->db->get('');
    return $query->num_rows();
  }

  public function jenisPeringatan($id)
  {
    $this->db->select('jenisPeringatan');
    $this->db->from('tbl_peringatan');
    $this->db->where('idPeringatan= ', $id);
    $query = $this->db->get('');
    return $query->result();
  }

  public function getTemuan($tbl)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $query = $this->db->get('');
    return $query->result();
  }

  public function getTemuanId($id)
  {
    $this->db->select('pasalPeringatan');
    $this->db->from('tbl_peringatan');
    $this->db->where('idPeringatan= ', $id);
    $query = $this->db->get('');
    return $query->result();
  }

  public function getTemuanDetail($id, $tbl)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where('id= ', $id);
    $query = $this->db->get('');
    return $query->result();
  }

  public function fileCapa()
  {
    $this->db->select('filePeringatan');
    $this->db->where('filePeringatan = ', "0");
    $this->db->where('tbl_peringatan.jenisPeringatan', "CAPA");
    $query = $this->db->get('tbl_peringatan');
    return $query->num_rows();
  }



  public function hapusSuratPeringatan($id)
  {
    $this->db->delete("tbl_peringatan", array("idPeringatan" => $id));
  }

  public function getSaranaPer($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_sarana');
    $this->db->join('tbl_surattl', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where('tbl_surattl.idSuratTugas', $id);
    $query = $this->db->get('');
    $output = '<option value="">Nama Sarana</option>';
    $output = "";
    foreach ($query->result() as $row) {
      $output .= '<option value="' . $row->idSarana . '">' . $row->namaSarana . '</option>';
    }
    return $output;
  }

  public function getSaranaCapa($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_sarana');
    $this->db->join('tbl_surattl', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where('tbl_surattl.idSuratTugas', $id);
    $query = $this->db->get('');
    $output = '<option value="">Nama Sarana</option>';
    $output = "";
    foreach ($query->result() as $row) {
      $output .= '<option value="' . $row->idSarana . '">' . $row->namaSarana . '</option>';
    }
    return $output;
  }





  public function getSarana($id)
  {
    $this->db->select('tbl_sarana.namaSarana, tbl_sarana.alamatSarana,tbl_sarana.kotaSarana,tbl_surattl.jenisTl, tbl_surattl.idTl');
    $this->db->from('tbl_sarana');
    $this->db->join('tbl_surattl', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where('tbl_surattl.idSarana', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function getEditCapa($id)
  {

    $this->db->select('tbl_surattugas.noSuratTugas,tbl_peringatan.idPeringatan,tbl_peringatan.tglSuratPeringatan, tbl_peringatan.noSuratPeringatan, tbl_peringatan.jenisPeringatan, tbl_peringatan.isiCapa, tbl_peringatan.pembuatCapa, tbl_sarana.namaSarana, tbl_sarana.alamatSarana, tbl_sarana.kotaSarana');
    $this->db->from('tbl_peringatan');
    $this->db->join('tbl_surattl', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where('tbl_peringatan.idPeringatan', $id);
    $query = $this->db->get('');
    return $query->result();
  }


  public function getCapa()
  {

    $this->db->select('tbl_peringatan.idPeringatan,tbl_peringatan.tglSuratPeringatan, tbl_peringatan.noSuratPeringatan, tbl_peringatan.jenisPeringatan, tbl_peringatan.isiCapa, tbl_peringatan.pembuatCapa,  tbl_sarana.namaSarana');
    $this->db->from('tbl_peringatan');
    $this->db->join('tbl_surattl', 'tbl_surattl.idTl = tbl_peringatan.idTl');
    $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
    $this->db->where('tbl_peringatan.jenisPeringatan', "eval");
    $this->db->or_where('tbl_peringatan.jenisPeringatan', "closed");
    $query = $this->db->get('');
    return $query;
  }

  public function updateSuratCapa($data)
  {
    $this->db->set('tglSuratPeringatan', $data['tglSuratPeringatan']);
    $this->db->set('noSuratPeringatan', $data['noSuratPeringatan']);

    $this->db->set('jenisPeringatan', $data['jenisPeringatan']);
    $this->db->set('pembuatCapa', $data['pembuatCapa']);
    $this->db->set('isiCapa', $data['isiCapa']);
    $this->db->where('idPeringatan', $data['idPeringatan']);
    $query = $this->db->update('tbl_peringatan');
  }
}
