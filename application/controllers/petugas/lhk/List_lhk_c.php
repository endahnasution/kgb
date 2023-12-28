<?php

defined('BASEPATH') or exit('No direct script access allowed');

class List_lhk_c extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->check_login();
    if ($this->session->userdata('id_role') != "2") {
      redirect('', 'refresh');
    }

    $this->load->model("Lhk_model");
  }

  public function index()
  {
      $data = konfigurasi('Pilih Surat Tugas', 'ap');

    $data['list_lhk'] = $this->Lhk_model->getLhk();
    // $data['upload_file'] = $this->Lhk_model->getFileLhk();
    $this->template->load('layouts/petugas_template', 'petugas/lhk/list_lhk_v', $data);
  }

  public function hp_lhk()
  {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
    $idLhk = $this->uri->segment(5);
    $data = konfigurasi('Form Tambah Hasil Pemeriksaan LHK', "ap");
    $idSurat = $this->Lhk_model->getNomorSurat($idLhk);
    $jenisLhk = $this->Lhk_model->jenisLhk($idLhk);
    
    foreach ($jenisLhk as $key) {
      $lhk = $key->jenisLhk;
    }

    $data['idLhk'] = $idLhk;
    $data['idSurat'] = $idSurat;
    $data['data_sarana'] = $this->Lhk_model->getSarana();

    if ($lhk == "pemeriksaan") {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/hp_lhk_pem_v', $data);
    } else {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/hp_lhk_sertifikasi_v', $data);
    }
  }

  

  public function edit_lhk()
  {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
    $id = $this->uri->segment(5);
    $data = konfigurasi('Form Edit LHK', "ap");
    $jenisLhk = $this->Lhk_model->jenisLhk($id);
    foreach ($jenisLhk as $key) {
      $lhk = $key->jenisLhk;
    }
    $data['ketuaTims'] = $this->Lhk_model->getKetuaTim();

    $data['lhk'] = $this->Lhk_model->getLhkDet($id);
    $data['data_sarana'] = $this->Lhk_model->getSarana();

    if ($lhk == "pemeriksaan") {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_lhk_pem_v', $data);
    } else if ($lhk == "sampling") {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_lhk_sampling_v', $data);
    } else if ($lhk == "umum") {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_lhk_umum_v', $data);
    } else if ($lhk == "iklan") {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_lhk_iklan_v', $data);
    } else {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_lhk_sertifikasi_v', $data);
    }
  }

  public function edit_hp_lhk()
  {
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $id = $this->uri->segment(5);

    $id = explode("%20", $id);
    $idLhk = $id[0];
    $idSarana = $id[1];

    $data['data_sarana'] = $this->Lhk_model->getSarana();
    $data['detail_sarana'] = $this->Lhk_model->getDetailSarana($idSarana);
    $data['idLhk'] = $idLhk;

    $jenisLhk = $this->Lhk_model->jenisLhk($idLhk);
    foreach ($jenisLhk as $key) {
      $lhk = $key->jenisLhk;
    }
  

    if ($lhk == "pemeriksaan") {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_hp_lhk_pem_v', $data);
    } else {
      $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_hp_lhk_sertifikasi_v', $data);
    }

   


   
  }

  public function edit_hasilpem()
  {
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $id = $this->input->post('id');
    $id = explode(" ", $id);
    $idLhk = $id[0];
    $idTl = $id[1];

    echo $idTl;

    $idSarana = $this->input->post('sarana');
    $temuan = $this->input->post('temuan');
    $temuan_tm = implode(",",$temuan); 
    $tanggal = $this->input->post('tanggal');
    $tl = $this->input->post('tl');
    $kesimpulan = $this->input->post('kesimpulan');
    $keterangan = $this->input->post('keterangan');
    
    $data_edit = array(
      'idSarana' => $idSarana,
      'temuan' => $temuan_tm,
      'jenisTl' => $tl,
      'isMk' => $kesimpulan,
      'tglPeriksa' => $tanggal,
      'deskripsiTemuan' => $keterangan,
      'idTl' => $idTl

    );


    $this->Lhk_model->updateSarana($data_edit);

    $data['lhk'] = $this->Lhk_model->getLhkDet($idLhk);
    $this->template->load('layouts/petugas_template', 'petugas/lhk/edit_lhk_pem_v', $data);
  }




  public function hapus_lhk()
  {
    $id = $this->input->post('id_');
    $this->Lhk_model->hapusLhk($id);
    redirect('petugas/lhk/list_lhk_c');
  }

  public function addSarana()
  {
    redirect('admin/master/tambah_sarana');
  }

  public function print_lhk()
  {
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $id = $this->input->post('idSurat');
    $jenisLhk = $this->Lhk_model->jenisLhkSurat($id);

    foreach ($jenisLhk as $key) {
      $lhk = $key->jenisLhk;
    }
    echo $lhk;
    $detailLhk = $this->Lhk_model->getLhkDetail($id);

    $idSarana = array();
    $temuan = array();
    $kesimpulan = array();
    $keterangan = array();
    $tl = array();

    foreach ($detailLhk as $row) {
      // $idLhk = $row->idLhk;
      $tglLhk = $row->tglLhk;
      // $jenisLhk = $row->jenisLhk;
      $sppd = $row->pengesahSppd;
      $kwitansi = $row->pengesahKwitansi;
      $form = $row->pengesahForm;
      $noSurat = $row->noSuratTugas;
      $idSurat = $row->idSurat;
      $detSampling = $row->rincianSampling;
      $deskripsi = $row->deskripsi;
      $pejabat = $row->pejabatDituju;
      $namaKetua = $row->nama;
      $nipKetua = $row->nip;
      array_push($idSarana, $row->idSarana);
      array_push($kesimpulan, $row->isMk);
      array_push($keterangan,  $row->deskripsiTemuan);
      array_push($temuan, $row->temuan);
      array_push($tl, $row->jenisTl);

      //  = ;
      // $deskripsiTemuan = $row->deskripsiTemuan;
      // $jenisTl = ;
    }

    $data['surat'] = $this->Lhk_model->getAtribut($idSurat);
    $data['noSurat'] = $noSurat;
    $data['tglLhk'] = $tglLhk;
    $data['sppd'] = $sppd;
    $data['kwitansi'] = $kwitansi;
    $data['form'] = $form;
    $data['detSampling'] = $detSampling;
    $data['detKegiatan'] =  $deskripsi;
    $data['pejabat'] = $pejabat;
    $kepalaBpom = $this->Lhk_model->getKepalaBalai();
    $namaKepala ="";
    $nipKepala ="";
    foreach($kepalaBpom as $values){
        $namaKepala = $values->nama;
        $nipKepala = $values->nip;
    }
    $data['namaKepala'] =  $namaKepala;
    $data['nipKepala'] = $nipKepala;
    $data['namaKetua'] = $namaKetua;
    $data['nipKetua'] = $nipKetua;

    if ($lhk == "pemeriksaan") {

      $array_sarana = array();
      foreach ($idSarana as $num) {
        $sarana2['data'] = $this->Lhk_model->getSarana2($num);
        array_push($array_sarana, $sarana2);
      }

      $data['sarana'] =  $array_sarana;
      $data['temuan'] = $temuan;
      $data['tl'] = $tl;
      $data['kesimpulan'] = $kesimpulan;
      $data['keterangan'] = $keterangan;
      $this->load->view('petugas/lhk/lhk_pem_isi', $data, FALSE);
    } else if ($lhk == "sampling") {

      $this->load->view('petugas/lhk/lhk_sampling_isi', $data, FALSE);
    } else if ($lhk == "umum") {
      $this->load->view('petugas/lhk/lhk_umum_isi', $data, FALSE);
    } else if ($lhk == "iklan") {
      $this->load->view('petugas/lhk/lhk_iklan_isi', $data, FALSE);
    } else {
      $array_sarana = array();
      foreach ($idSarana as $num) {
        $sarana2['data'] = $this->Lhk_model->getSarana2($num);
        array_push($array_sarana, $sarana2);
      }
      $data['sarana'] =  $array_sarana;
      $data['keterangan'] = $keterangan;


      $this->load->view('petugas/lhk/lhk_sertifikasi_isi', $data, FALSE);
    }
  }
}
