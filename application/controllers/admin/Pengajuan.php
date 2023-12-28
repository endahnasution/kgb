<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Pengajuan_model');
        $this->load->model('Kgb_model');
    }

    public function index()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $data['pengajuan'] = $this->Pengajuan_model->getPengajuanSelesai();
        $this->template->load('layouts/admin_template', 'admin/pengajuan_selesai/index',$data);
    }

    public function pengajuan_baru()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $data['pengajuan'] = $this->Pengajuan_model->getPengajuanBaru();
        $this->template->load('layouts/admin_template', 'admin/pengajuan_baru/index',$data);
    }

    public function edit_pengajuan()
    {
        $id = $this->uri->segment(4);
        $data = konfigurasi('Form Edit Surat', "ap");
    $data['kgb'] = $this->Kgb_model->getKgbId($id);
    $data['idKgb'] = $id;
    $this->template->load('layouts/admin_template', 'admin/pengajuan_baru/edit', $data);
       
    }

    public function update_pengajuan()
    {
        $idKgb = $this->input->post('idKgb');
        $status = $this->input->post('status');
       
        $dataKgb = array(
            'idKgb' => $idKgb,
            'gapok_baru' => $this->input->post('gapok_baru'),
            'sk_baru' => $this->input->post('sk_baru'),
            'tgl_sk_baru' =>$this->input->post('tgl_sk_baru'),
            'note_kgb' =>$this->input->post('note_kgb'),
            'status' => $this->input->post('status')
            
            );  
        
        $this->Pengajuan_model->updateKgb($dataKgb);

        $dataPegawai = array(
            'idPegawai' => $this->db->select("*")-> where('idKgb', $idKgb)->get("tbl_kgb")->row()->idPegawai,
            'golongan' => $this->input->post('golongan'),
            
            );  

            $this->Pengajuan_model->updatePegawai($dataPegawai);

        $this->session->set_flashdata('success', 'Data Berhasil Diubah');

        if($status == "Diterima"){
            redirect('admin/pengajuan/', 'refresh');
        }else{
            redirect('admin/pengajuan/pengajuan_baru', 'refresh');
        }

        
    
    }


    public function print_kgb()
    {
        $data = konfigurasi('Form Tambah Sarana', "as");
        $id = $this->input->post('idKgb');
        $kgbCetak = $this->Kgb_model->getKgbId($id);
        $data['idKgb'] = $kgbCetak->idKgb;
        $data['gapok_lama'] = $kgbCetak->gapok_lama;
        $data['sk_lama'] = $kgbCetak->sk_lama;
        $data['tgl_sk_lama'] = $kgbCetak->tgl_sk_lama;
        $data['spmk_lama'] = $kgbCetak->spmk_lama;
        $data['tahun_kerja_lama'] = $kgbCetak->tahun_kerja_lama;
        $data['bulan_kerja_lama'] = $kgbCetak->bulan_kerja_lama;  
        $data['gapok_baru'] = $kgbCetak->gapok_baru;        
        $data['tahun_kerja_baru'] = $kgbCetak->tahun_kerja_baru;        
        $data['bulan_kerja_baru'] = $kgbCetak->bulan_kerja_baru;        
        $data['golongan_baru'] = $kgbCetak->golongan_baru;        
        $data['spmk_baru'] = $kgbCetak->spmk_baru;        
        $data['sk_baru'] = $kgbCetak->sk_baru;        
        $data['tgl_sk_baru'] = $kgbCetak->tgl_sk_baru;        
        $data['nama'] = $kgbCetak->nama;        
        $data['nip'] = $kgbCetak->nip;        
        $data['pangkat'] = $kgbCetak->pangkat;            
        $data['jabatan'] = $kgbCetak->jabatan;        
        $data['golongan'] = $kgbCetak->golongan;        
       $this->load->view('admin/pengajuan_selesai/print', $data, FALSE);
      
    
    }

}