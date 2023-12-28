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
    $this->load->model('Lhk_model');
  }

  public function index()
  {
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $data['surat_tugas'] = $this->Lhk_model->getSuratTugas();
    $data['sarana'] = $this->Lhk_model->getSarana();
    $data['list_lhk'] = $this->Lhk_model->getLhkPengujian();
    $this->template->load('layouts/petugas_template', 'petugas/lhkPengujian/list_lhk_v', $data);
  }

   public function tambahLhk()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $data['surat_tugas'] = $this->Lhk_model->getSuratTugasPengujian();
        $data['sarana'] = $this->Lhk_model->getSarana();
        $this->template->load('layouts/petugas_template', 'petugas/lhkPengujian/lhk_pengujian_v', $data);
    }

    public function hapus_lhk()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->input->post('id_');
        $this->Lhk_model->hapusLhk($id);
        redirect('petugas/lhkPengujian/list_lhk_c');
    }


  public function add()
  {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
    $idSurat = $this->input->post('suratTugas');
    $tglLhk = $this->input->post('tglLhk');
    $sppd = $this->input->post('sppd');
    $kwitansi = $this->input->post('kwitansi');
    $form = $this->input->post('form');
    $keterangan = $this->input->post('keterangan');

    // $data['surat'] = $this->Lhk_model->getAtribut($idSurat);
    // $data['idSurat'] = $idSurat;
    // $data['tglLhk'] = $tglLhk;
    // $data['sppd'] = $sppd;
    // $data['kwitansi'] = $kwitansi;
    // $data['form'] = $form;
   
    $data2 = array(
        'tglLhk'   => $tglLhk,
        'jenisLhk' => "umum",
            'jenisLhk' => "pengujian",
            'pejabatDituju' =>"-",
            'pengesahSppd' => $sppd,
      'pengesahKwitansi' => $kwitansi,
      'pengesahForm' => $form,
      'rincianSampling' => "-",
      'deskripsi' => $keterangan,
      'idSuratTugas' => $idSurat
    );

    $checkvalidation = $this->Lhk_model->checkDuplicate($idSurat);
    if ($checkvalidation == true) {
      $this->db->insert('tbl_lhk', $data2);
      // $this->load->view('petugas/lhk/lhk_umum_isi.php', $data, FALSE);
      redirect('petugas/lhkPengujian/list_lhk_c', 'refresh');
    } else {
      redirect('petugas/lhkPengujian/list_lhk_c/tambahLhk', 'refresh');
    }
  }

  public function print_lhk()
  {
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $id = $this->input->post('idSurat');
  
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
      array_push($idSarana, $row->idSarana);
      array_push($kesimpulan, $row->statusBalai);
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

   
      $this->load->view('petugas/lhkPengujian/lhk_pengujian_isi', $data, FALSE);
   
  
  }


   public function edit_lhk()
    {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->uri->segment(5);
        $data = konfigurasi('Form Edit LHK', "ap");
        $data['lhk'] = $this->Lhk_model->getLhkDet($id);
        // $data['data_sarana'] = $this->Lhk_model->getSarana();
        $this->template->load('layouts/petugas_template', 'petugas/lhkPengujian/edit_lhk_pengujian_v', $data);
    }

   public function edit(){
    $idSurat = $this->input->post('idSuratTugas');
    $tglLhk = $this->input->post('tglLhk');
    $sppd = $this->input->post('sppd');
    $kwitansi = $this->input->post('kwitansi');
    $form = $this->input->post('form');
    $deskripsi = $this->input->post('keterangan');
  

    $data_edit = array(
          'tglLhk' => $tglLhk,
          'pejabat' => "-",
          'sppd' => $sppd,
          'kwitansi' => $kwitansi,
          'form' =>$form,
          'sampling' =>"-",
          'deskripsi' => $deskripsi,
          'idSurat' => $idSurat
        );


    $this->Lhk_model->updateLhk($data_edit);

     redirect('petugas/lhkPengujian/list_lhk_c', 'refresh');

  }
}
