<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EksporDataAdmin extends CI_Controller
{
    // main page


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Laporan_model');
    }


    public function surat()
    {
        $data = konfigurasi('Ekspor Data', 'rs');
        // $data['surat_tugas'] = $this->SuratTl_model->getSuratTugas();
        $this->template->load('layouts/admin_template', 'admin/tarikDataSurat', $data);
    }

    public function anggaran()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $this->template->load('layouts/admin_template', 'admin/subAnggaran',$data);
    }

    public function subAnggaran()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $tahun = $this->uri->segment(4);
        $data['anggaran']= $this->Laporan_model->getLaporanAnggaran($tahun);
        $data['tahun'] = $tahun;
        $this->template->load('layouts/admin_template', 'admin/tarikdataAnggaran', $data);
    }

    public function tarikAnggaran()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $tahun = $this->uri->segment(4);
        $data['anggaran']= $this->Laporan_model->getLaporanAnggaran($tahun);
        $this->load->view('admin/isilaporananggaran', $data, FALSE);
    }
    
     public function tarikDetailAnggaran()
  {
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $this->template->load('layouts/admin_template', 'admin/detailAnggaran',$data);
  }
  
  
  public function tarikRekapKw()
  {
      
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $tglAwal = $this->input->post('tglAwal');
    $tglAkhir = $this->input->post('tglAkhir');
    $data['tglAwal'] = $tglAwal;
    $data['tglAkhir'] = $tglAkhir;
    $data['rincianIdentitas'] = $this->Laporan_model->getRekapIdentitas($tglAwal, $tglAkhir);
    $data['rincianDetail'] = $this->Laporan_model->getRekapDetail($tglAwal, $tglAkhir);
    $data['rincianUh'] = $this->Laporan_model->getRekapUh($tglAwal, $tglAkhir,"uh");
    $data['rincianRiil']= $this->Laporan_model->getRekapUh($tglAwal, $tglAkhir,"rl");
    $data['rincianRepresentasi']= $this->Laporan_model->getRekapUh($tglAwal, $tglAkhir,"rep");
    $data['rincianTrans'] = $this->Laporan_model->getRekapUh($tglAwal, $tglAkhir,"trans");
    $data['rincianTransport'] = $this->Laporan_model->getRekapUh($tglAwal, $tglAkhir,"tr");
    $data['rincianHotel'] = $this->Laporan_model->getRekapUh($tglAwal, $tglAkhir,"ht");
    // $data['rincianTransport']= $this->Laporan_model->getRekapTransportdanHotel($tglAwal, $tglAkhir,"tr");
    // $data['rincianHotel']= $this->Laporan_model->getRekapTransportdanHotel($tglAwal, $tglAkhir,"ht");
    $this->load->view('admin/isiRekapAnggaran', $data);
    

  }


   public function tarikSurat()
  {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
    $tglAwal = $this->input->post('tglAwal');
    $tglAkhir = $this->input->post('tglAkhir');
    $deskripsi =  $this->input->post('deskripsi');
    $data['tglAwal'] = $tglAwal;
    $data['tglAkhir'] = $tglAkhir;
    $data['deskripsi'] = $deskripsi;
    $data['laporanSurat'] = $this->Laporan_model->getLaporanSurat($tglAwal, $tglAkhir);
    $data['petugas'] = $this->Laporan_model->getPetugasSurat($tglAwal, $tglAkhir);
    $data['feedback'] = $this->Laporan_model->getFeedbackSurat($tglAwal, $tglAkhir);
    $data['closed'] = $this->Laporan_model->getClosedSurat($tglAwal, $tglAkhir);
    

    $this->load->view('admin/isiLaporanSurat', $data, FALSE);
  }


    public function subpemeriksaan()
    {
      
        $data = konfigurasi('Ekspor Data', 'rs');
        // $data['surat_tugas'] = $this->SuratTl_model->getSuratTugas();
        $this->template->load('layouts/admin_template', 'admin/subPemeriksaan', $data);
    }

     public function pemeriksaan()
    {
       
        $data = konfigurasi('Ekspor Data', 'rs');
        // $data['surat_tugas'] = $this->SuratTl_model->getSuratTugas();
        $this->template->load('layouts/admin_template', 'admin/tarikDataPemeriksaan', $data);
    }

    public function rekapTL()
    {
       
        $data = konfigurasi('Ekspor Data', 'rs');
        // $data['surat_tugas'] = $this->SuratTl_model->getSuratTugas();
        $this->template->load('layouts/admin_template', 'admin/tarikDataTl', $data);
    }



    public function tarikPemeriksaan(){
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
      $tglAwal = $this->input->post('tglAwal');
      $tglAkhir = $this->input->post('tglAkhir');
      $kota = $this->input->post('kota');
      $data['tglAwal'] = $tglAwal;
      $data['tglAkhir'] = $tglAkhir;
      $data['kota'] = $kota;
      $data['pbf'] = $this->Laporan_model->getHasilPemeriksaan("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['mk_pbf'] = $this->Laporan_model->getMKPemeriksaan("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['tmk_pbf'] = $this->Laporan_model->getMKPemeriksaan("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['pembinaan_pbf'] = $this->Laporan_model->getPembinaan("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['pembinaantek_pbf'] = $this->Laporan_model->getPembinaanTek("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
       $data['peringatan_pbf'] = $this->Laporan_model->getPeringatan("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['peringatanKer_pbf'] = $this->Laporan_model->getPeringatanKeras("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['psk_pbf'] = $this->Laporan_model->getPSK("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['notl_pbf'] = $this->Laporan_model->getnoTl("pbf","","","","","","",$tglAwal,$tglAkhir,$kota);


      // apotek 
      $data['apotek'] = $this->Laporan_model->getHasilPemeriksaan("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['mk_apotek'] = $this->Laporan_model->getMKPemeriksaan("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['pembinaan_apotek'] = $this->Laporan_model->getPembinaan("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaantek_apotek'] = $this->Laporan_model->getPembinaanTek("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['peringatan_apotek'] = $this->Laporan_model->getPeringatan("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);
           $data['peringatanKer_apotek'] = $this->Laporan_model->getPeringatanKeras("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);
           $data['psk_apotek'] = $this->Laporan_model->getPSK("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);
            $data['notl_apotek'] = $this->Laporan_model->getnoTl("Apotek","","","","","","",$tglAwal,$tglAkhir,$kota);


// puskesmas
            $data['puskesmas'] = $this->Laporan_model->getHasilPemeriksaan("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['mk_puskesmas'] = $this->Laporan_model->getMKPemeriksaan("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);
      $data['pembinaan_puskesmas'] = $this->Laporan_model->getPembinaan("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaantek_puskesmas'] = $this->Laporan_model->getPembinaanTek("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['peringatan_puskesmas'] = $this->Laporan_model->getPeringatan("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);
           $data['peringatanKer_puskesmas'] = $this->Laporan_model->getPeringatanKeras("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);
           $data['psk_puskesmas'] = $this->Laporan_model->getPSK("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);
            $data['notl_puskesmas'] = $this->Laporan_model->getnoTl("puskesmas","","","","","","",$tglAwal,$tglAkhir,$kota);

      // toko obat
       $data['toko_obat'] = $this->Laporan_model->getHasilPemeriksaan("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['mk_toko_obat'] = $this->Laporan_model->getMKPemeriksaan("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaan_toko_obat'] = $this->Laporan_model->getPembinaan("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaantek_toko_obat'] = $this->Laporan_model->getPembinaanTek("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['peringatan_toko_obat'] = $this->Laporan_model->getPeringatan("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);
          $data['peringatanKer_toko_obat'] = $this->Laporan_model->getPeringatanKeras("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);
          $data['psk_toko_obat'] = $this->Laporan_model->getPSK("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);
          $data['notl_toko_obat'] = $this->Laporan_model->getnoTl("Toko Obat","","","","","","",$tglAwal,$tglAkhir,$kota);

        // klinik
       $data['klinik'] = $this->Laporan_model->getHasilPemeriksaan("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);
       $data['mk_klinik'] = $this->Laporan_model->getMKPemeriksaan("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaan_klinik'] = $this->Laporan_model->getPembinaan("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['pembinaantek_klinik'] = $this->Laporan_model->getPembinaanTek("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);
           $data['peringatan_klinik'] = $this->Laporan_model->getPeringatan("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);
             $data['peringatanKer_klinik'] = $this->Laporan_model->getPeringatanKeras("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);
             $data['psk_klinik'] = $this->Laporan_model->getPSK("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);
             $data['notl_klinik'] = $this->Laporan_model->getnoTl("klinik","","","","","","",$tglAwal,$tglAkhir,$kota);



//          // rs

       $data['rs'] = $this->Laporan_model->getHasilPemeriksaan("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['mk_rs'] = $this->Laporan_model->getMKPemeriksaan("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaan_rs'] = $this->Laporan_model->getPembinaan("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaantek_rs'] = $this->Laporan_model->getPembinaanTek("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['peringatan_rs'] = $this->Laporan_model->getPeringatan("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
           $data['peringatanKer_rs'] = $this->Laporan_model->getPeringatanKeras("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
           $data['psk_rs'] = $this->Laporan_model->getPSK("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
             $data['notl_rs'] = $this->Laporan_model->getnoTl("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);


//           // ifk
       $data['ifk'] = $this->Laporan_model->getHasilPemeriksaan("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
       $data['mk_ifk'] = $this->Laporan_model->getMKPemeriksaan("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
       $data['pembinaan_ifk'] = $this->Laporan_model->getPembinaan("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['pembinaantek_ifk'] = $this->Laporan_model->getPembinaanTek("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['peringatan_ifk'] = $this->Laporan_model->getPeringatan("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
          $data['peringatanKer_ifk'] = $this->Laporan_model->getPeringatanKeras("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
            $data['psk_ifk'] = $this->Laporan_model->getPSK("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
            $data['notl_ifk'] = $this->Laporan_model->getnoTl("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);


//          // prod ot
       $data['prod_ot'] = $this->Laporan_model->getHasilPemeriksaan("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);
        $data['mk_prod_ot'] = $this->Laporan_model->getMKPemeriksaan("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['pembinaan_prod_ot'] = $this->Laporan_model->getPembinaan("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);
$data['pembinaantek_prod_ot'] = $this->Laporan_model->getPembinaanTek("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);
$data['peringatan_prod_ot'] = $this->Laporan_model->getPeringatan("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);
$data['peringatanKer_prod_ot'] = $this->Laporan_model->getPeringatanKeras("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);
$data['psk_prod_ot'] = $this->Laporan_model->getPSK("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);
$data['notl_prod_ot'] = $this->Laporan_model->getnoTl("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir,$kota);

//           // dist ot
       $data['dist_ot'] = $this->Laporan_model->getHasilPemeriksaan("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);
        $data['mk_dist_ot'] = $this->Laporan_model->getMKPemeriksaan("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);
         $data['pembinaan_dist_ot'] = $this->Laporan_model->getPembinaan("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);
          $data['pembinaantek_dist_ot'] = $this->Laporan_model->getPembinaanTek("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);
          $data['peringatan_dist_ot'] = $this->Laporan_model->getPeringatan("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);
           $data['peringatanKer_dist_ot'] = $this->Laporan_model->getPeringatanKeras("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);
            $data['psk_dist_ot'] = $this->Laporan_model->getPSK("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);
$data['notl_dist_ot'] = $this->Laporan_model->getnoTl("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir,$kota);


//         // prod kos
       $data['prod_kos'] = $this->Laporan_model->getHasilPemeriksaan("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);
       $data['mk_prod_kos'] = $this->Laporan_model->getMKPemeriksaan("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);
         $data['pembinaan_prod_kos'] = $this->Laporan_model->getPembinaan("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);
$data['pembinaantek_prod_kos'] = $this->Laporan_model->getPembinaanTek("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);
$data['peringatan_prod_kos'] = $this->Laporan_model->getPeringatan("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);

$data['peringatanKer_prod_kos'] = $this->Laporan_model->getPeringatanKeras("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);
$data['psk_prod_kos'] = $this->Laporan_model->getPSK("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);
$data['notl_prod_kos'] = $this->Laporan_model->getnoTl("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir,$kota);


//          // dist kos
       $data['dist_kos'] = $this->Laporan_model->getHasilPemeriksaan("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);
       $data['mk_dist_kos'] = $this->Laporan_model->getMKPemeriksaan("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);
       $data['pembinaan_dist_kos'] = $this->Laporan_model->getPembinaan("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);
$data['pembinaantek_dist_kos'] = $this->Laporan_model->getPembinaanTek("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);
$data['peringatan_dist_kos'] = $this->Laporan_model->getPeringatan("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);
$data['peringatanKer_dist_kos'] = $this->Laporan_model->getPeringatanKeras("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);
$data['psk_dist_kos'] = $this->Laporan_model->getPSK("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);
$data['notl_dist_kos'] = $this->Laporan_model->getnoTl("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir,$kota);

//         // prod pangan

       $data['prod_pangan'] = $this->Laporan_model->getHasilPemeriksaan("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);
       $data['mk_prod_pangan'] = $this->Laporan_model->getMKPemeriksaan("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);
       $data['pembinaan_prod_pangan'] = $this->Laporan_model->getPembinaan("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);
          $data['pembinaantek_prod_pangan'] = $this->Laporan_model->getPembinaanTek("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);
           $data['peringatan_prod_pangan'] = $this->Laporan_model->getPeringatan("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);
            $data['peringatanKer_prod_pangan'] = $this->Laporan_model->getPeringatanKeras("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);
             $data['psk_prod_pangan'] = $this->Laporan_model->getPSK("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);
$data['notl_prod_pangan'] = $this->Laporan_model->getnoTl("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir,$kota);




//          // dist pangan
      $data['dist_pangan'] = $this->Laporan_model->getHasilPemeriksaan("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
      $data['mk_dist_pangan'] = $this->Laporan_model->getMKPemeriksaan("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
      $data['pembinaan_dist_pangan'] = $this->Laporan_model->getPembinaan("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
       $data['pembinaantek_dist_pangan'] = $this->Laporan_model->getPembinaanTek("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
       $data['peringatan_dist_pangan'] = $this->Laporan_model->getPeringatan("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
        $data['peringatanKer_dist_pangan'] = $this->Laporan_model->getPeringatanKeras("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
        $data['psk_dist_pangan'] = $this->Laporan_model->getPSK("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
$data['notl_dist_pangan'] = $this->Laporan_model->getnoTl("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);


      $this->load->view('admin/isiPemeriksaan', $data, FALSE);
  }


  public function tarikRekapTl(){
      $data = konfigurasi('Pilih Surat Tugas', 'ap');
    $tglAwal = $this->input->post('tglAwal');
    $tglAkhir = $this->input->post('tglAkhir');
    echo "kaka";
    $data['tglAwal'] = $tglAwal;
    $data['tglAkhir'] = $tglAkhir;

    $data['tl_pbf_created'] = $this->Laporan_model->getTlDibuat("PBF","","","","","","",$tglAwal,$tglAkhir);
    $data['tl_pbf_sent'] = $this->Laporan_model->getTlDikirim("PBF","","","","","","",$tglAwal,$tglAkhir);
    $data['feedback_pbf_get'] = $this->Laporan_model->getFeedbackDiterima("PBF","","","","","","",$tglAwal,$tglAkhir);
   
    


//         // apotek 
$data['tl_apotek_created'] = $this->Laporan_model->getTlDibuat("Apotek","","","","","","",$tglAwal,$tglAkhir);
$data['tl_apotek_sent'] = $this->Laporan_model->getTlDikirim("Apotek","","","","","","",$tglAwal,$tglAkhir);
$data['feedback_apotek_get'] = $this->Laporan_model->getFeedbackDiterima("Apotek","","","","","","",$tglAwal,$tglAkhir);

// // puskesmas
$data['tl_puskesmas_created'] = $this->Laporan_model->getTlDibuat("Puskesmas","","","","","","",$tglAwal,$tglAkhir);
$data['tl_puskesmas_sent'] = $this->Laporan_model->getTlDikirim("Puskesmas","","","","","","",$tglAwal,$tglAkhir);
$data['feedback_puskesmas_get'] = $this->Laporan_model->getFeedbackDiterima("Puskesmas","","","","","","",$tglAwal,$tglAkhir);

//         // toko obat
$data['tl_toko_obat_created'] = $this->Laporan_model->getTlDibuat("Toko Obat","","","","","","",$tglAwal,$tglAkhir);
$data['tl_toko_obat_sent'] = $this->Laporan_model->getTlDikirim("Toko Obat","","","","","","",$tglAwal,$tglAkhir);
$data['feedback_toko_obat_get'] = $this->Laporan_model->getFeedbackDiterima("Toko Obat","","","","","","",$tglAwal,$tglAkhir);

//           // klinik
$data['tl_klinik_created'] = $this->Laporan_model->getTlDibuat("klinik","","","","","","",$tglAwal,$tglAkhir);
$data['tl_klinik_sent'] = $this->Laporan_model->getTlDikirim("klinik","","","","","","",$tglAwal,$tglAkhir);
$data['feedback_klinik_get'] = $this->Laporan_model->getFeedbackDiterima("klinik","","","","","","",$tglAwal,$tglAkhir);


// //          // rs

//          $data['rs'] = $this->Laporan_model->getHasilPemeriksaan("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir,$kota);
$data['tl_rs_created'] = $this->Laporan_model->getTlDibuat("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir);
$data['tl_rs_sent'] = $this->Laporan_model->getTlDikirim("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir);
$data['feedback_rs_get'] = $this->Laporan_model->getFeedbackDiterima("Rumah Sakit","","","","","","",$tglAwal,$tglAkhir);


// //           // ifk
//          $data['ifk'] = $this->Laporan_model->getHasilPemeriksaan("IFK","","","","","","",$tglAwal,$tglAkhir,$kota);
$data['tl_ifk_created'] = $this->Laporan_model->getTlDibuat("IFK","","","","","","",$tglAwal,$tglAkhir);
$data['tl_ifk_sent'] = $this->Laporan_model->getTlDikirim("IFK","","","","","","",$tglAwal,$tglAkhir);
$data['feedback_ifk_get'] = $this->Laporan_model->getFeedbackDiterima("IFK","","","","","","",$tglAwal,$tglAkhir);


// //          // prod ot
$data['tl_prod_ot_created'] = $this->Laporan_model->getTlDibuat("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir);
$data['tl_prod_ot_sent'] = $this->Laporan_model->getTlDikirim("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir);
$data['feedback_prod_ot_get'] = $this->Laporan_model->getFeedbackDiterima("Produksi Obat Tradisional","","","","","","",$tglAwal,$tglAkhir);

// //           // dist ot

$data['tl_dist_ot_created'] = $this->Laporan_model->getTlDibuat("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir);
$data['tl_dist_ot_sent'] = $this->Laporan_model->getTlDikirim("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir);
$data['feedback_dist_ot_get'] = $this->Laporan_model->getFeedbackDiterima("Retail Obat Tradisional","Distributor Obat Tradisional","Retail Suplemen Kesehatan","","","Agen/Stokis MLM","Obat Tradisional",$tglAwal,$tglAkhir);


// //         // prod kos
$data['tl_prod_kos_created'] = $this->Laporan_model->getTlDibuat("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","","Obat Tradisional",$tglAwal,$tglAkhir);
$data['tl_prod_kos_sent'] = $this->Laporan_model->getTlDikirim("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","",$tglAwal,$tglAkhir);
$data['feedback_prod_kos_get'] = $this->Laporan_model->getFeedbackDiterima("Produksi Kosmetika","Industri Kosmetik Golongan B","","","","","","Obat Tradisional",$tglAwal,$tglAkhir);


// //          // dist kos

$data['tl_dist_kos_created'] = $this->Laporan_model->getTlDibuat("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik","Obat Tradisional",$tglAwal,$tglAkhir);
$data['tl_dist_kos_sent'] = $this->Laporan_model->getTlDikirim("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik" ,$tglAwal,$tglAkhir);
$data['feedback_dist_kos_get'] = $this->Laporan_model->getFeedbackDiterima("Importir Kosmetik","Distributor Kosmetik","Toko Kosmetik","Konter Kosmetik", "Pemohon Notif","Agen/Stokis MLM","Kosmetik",$tglAwal,$tglAkhir);

// //         // prod pangan

$data['tl_prod_pangan_created'] = $this->Laporan_model->getTlDibuat("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir);
$data['tl_prod_pangan_sent'] = $this->Laporan_model->getTlDikirim("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir);
$data['feedback_prod_pangan_get'] = $this->Laporan_model->getFeedbackDiterima("Pangan MD","Pangan IRTP","Produksi Pangan","","","","",$tglAwal,$tglAkhir);



// //          // dist pangan
//         $data['dist_pangan'] = $this->Laporan_model->getHasilPemeriksaan("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir,$kota);
$data['tl_dist_pangan_created'] = $this->Laporan_model->getTlDibuat("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir);
$data['tl_dist_pangan_sent'] = $this->Laporan_model->getTlDikirim("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir);
$data['feedback_dist_pangan_get'] = $this->Laporan_model->getFeedbackDiterima("Importir Pangan","Distributor Pangan","Retail Pangan Modern","Retail Pangan Tradisional","Distribusi Pangan","","",$tglAwal,$tglAkhir);

$this->load->view('admin/isiRekapTl', $data, FALSE);
}

}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */