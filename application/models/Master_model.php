<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model{


  function __construct()
  {
    parent::__construct();
}


public function getPegawai(){
    $this->db->select('*');
    $this->db->from('tbl_pegawai');
    
    $query = $this->db->get('');
    return $query->result();
}

public function getPegawaiId($id){
    $this->db->select('*');
    $this->db->from('tbl_pegawai');
    $this->db->where('idPegawai', $id);
    $query = $this->db->get('');
    return $query->result();
}


 public function updatePegawai($data){
   $this->db->set('nama', $data['nama']); 
   $this->db->set('jabatan', $data['jabatan']);
   $this->db->set('nip', $data['nip']); 
   $this->db->set('pangkat', $data['pangkat']);
   $this->db->set('golongan', $data['golongan']);
   $this->db->set('substansi', $data['substansi']);
   $this->db->set('id_role', $data['id_role']); 
   $this->db->set('activated', $data['activated']); 
   $this->db->where('idPegawai', $data['idPegawai']);
   $query = $this->db->update('tbl_pegawai');
}

public function getTotalTl(){
  $this->db->select('*');
  $this->db->from('tbl_surattl');
  $this->db->join('tbl_peringatan', 'tbl_peringatan.idTl = tbl_surattl.idTl',"left");
  $this->db->where_not_in('tbl_surattl.jenisTl', '-');
  $this->db->where('tbl_surattl.tglPeriksa >=', '2022-06-17');
  $this->db->where('tbl_peringatan.idTl', null);
  $query = $this->db->get('');
  $count_row = $query->num_rows();
  return $count_row;
}

public function getTl(){
  $this->db->select('tbl_sarana.namaSarana, tbl_surattl.tglPeriksa, tbl_surattl.temuan, tbl_surattl.jenisTl');
  $this->db->from('tbl_surattl');
  $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana',"left");
  $this->db->join('tbl_peringatan', 'tbl_peringatan.idTl = tbl_surattl.idTl',"left");
  $this->db->where_not_in('tbl_surattl.jenisTl', '-');
  $this->db->where('tbl_surattl.tglPeriksa >=', '2022-06-17');
  $this->db->where('tbl_peringatan.idTl', null);
  $query = $this->db->get('');
  return $query->result();
  
}


public function hapus_dataPegawai($id){
   $this->db->delete("tbl_pegawai",array("idPegawai"=>$id));
 }

public function getSarana(){
    $this->db->select('*');
    $this->db->from('tbl_sarana');
    
    $query = $this->db->get('');
    return $query->result();
}
public function getSaranaId($id){
    $this->db->select('*');
    $this->db->from('tbl_sarana');
    $this->db->where('idSarana', $id);
    $query = $this->db->get('');
    return $query->result();
}

 public function updateSarana($data1){
   $this->db->set('namaSarana', $data1['namaSarana']); 
   $this->db->set('alamatSarana', $data1['alamatSarana']);
   $this->db->set('jenisSarana', $data1['jenisSarana']); 
   $this->db->set('produkSarana', $data1['produkSarana']);
   $this->db->set('kotaSarana', $data1['kotaSarana']); 
   $this->db->set('kecamatanSarana', $data1['kecamatanSarana']);
   $this->db->set('kelurahanSarana', $data1['kelurahanSarana']); 
   $this->db->set('kategoriSarana', $data1['kategoriSarana']);  
   $this->db->where('idSarana', $data1['idSarana']);
   $query = $this->db->update('tbl_sarana');
}

public function hapus_dataSarana($id){
   $this->db->delete("tbl_sarana",array("idSarana"=>$id));
 }


public function getAnggaran(){
    $this->db->select('*');
    $this->db->from('tbl_anggaran2022');
    $this->db->join('tbl_pegawai', 'tbl_pegawai.idPegawai = tbl_anggaran2022.idPpk','left');
    $query = $this->db->get('');
    return $query->result();
}

public function getAnggaranId($id){
    $this->db->select('*');
    $this->db->from('tbl_anggaran2022');
    $this->db->where('idAnggaran', $id);
    $query = $this->db->get('');
    return $query->result();
}

public function getPpk(){
    $this->db->select('*');
    $this->db->where('ppk', '1');
    $this->db->from('tbl_pegawai');
    
    $query = $this->db->get('');
    return $query->result();
}

 public function updateAnggaran($data2){
     $this->db->set('namaAnggaran', $data2['namaAnggaran']); 
   $this->db->set('mak', $data2['mak']); 
   $this->db->set('uraianKegiatan', $data2['uraianKegiatan']); 
   $this->db->set('jenisSubstansi', $data2['jenisSubstansi']);
   $this->db->set('kode', $data2['kode']); 
   $this->db->set('pagu', $data2['pagu']);
   $this->db->set('idPpk', $data2['idPpk']); 
   $this->db->where('idAnggaran', $data2['idAnggaran']);
   $query = $this->db->update('tbl_anggaran2022');
}
public function hapus_dataAnggaran($id){
   $this->db->delete("tbl_anggaran2022",array("idAnggaran"=>$id));
 }

 public function getKomoditi($index1,$index2,$index3,$index4,$index5,$index6,$param){
     $this->db->select('tbl_sarana.namaSarana');
     $this->db->from('tbl_sarana');
     $this->db->join('tbl_surattl', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
     $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
     $this->db->where('tbl_sarana.jenisSarana',$index1);
     $this->db->or_where('tbl_sarana.jenisSarana',$index2);
     $this->db->or_where('tbl_sarana.jenisSarana',$index3);
     $this->db->or_where('tbl_sarana.jenisSarana',$index4);
      $this->db->or_where('tbl_sarana.jenisSarana',$index5);
       $this->db->or_where('tbl_sarana.jenisSarana',$index6);
      $this->db->where('tbl_sarana.kategoriSarana',$param);
      $query = $this->db->get('');
    //   return($query->result());
     $count_row = $query->num_rows();
     return $count_row;
 }

 public function getKomoditiKota($index1,$index2,$index3,$index4,$index5,$index6,$param, $kota){
     $this->db->select('*');
     $this->db->from('tbl_surattl');
     $this->db->join('tbl_sarana', 'tbl_sarana.idSarana = tbl_surattl.idSarana');
      $this->db->join('tbl_surattugas', 'tbl_surattl.idSuratTugas = tbl_surattugas.idSurat');
     $this->db->where('tbl_surattugas.kota',$kota);
      $this->db->group_start();
       $this->db->where('tbl_sarana.jenisSarana',$index1);
     $this->db->or_where('tbl_sarana.jenisSarana',$index2);
     $this->db->or_where('tbl_sarana.jenisSarana',$index3);
     $this->db->or_where('tbl_sarana.jenisSarana',$index4);
      $this->db->or_where('tbl_sarana.jenisSarana',$index5);
       
       $this->db->or_where('tbl_sarana.jenisSarana',$index6);
      $this->db->where('tbl_sarana.kategoriSarana',$param);
      $this->db->group_end();
          $query = $this->db->get('');
     $count_row = $query->num_rows();
     return $count_row;
 }




}