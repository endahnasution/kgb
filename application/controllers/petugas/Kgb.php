<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kgb extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Kgb_model');
    }


    public function index()
    {
        $id = $this->uri->segment(4);
        $data = konfigurasi('Form Tambah Sarana', "as");
        $data['pegawai'] = $this->Kgb_model->getKgb($id);
        $this->template->load('layouts/petugas_template', 'petugas/kgb/index', $data);
       
    }

    public function list_kgb()
    {
        $id = $this->uri->segment(4);
        $data = konfigurasi('Form Tambah Sarana', "as");
        $data['list_kgb'] = $this->Kgb_model->getKgb($id);
        $data['idPegawai'] = $id;
        
        $this->template->load('layouts/petugas_template', 'petugas/kgb/list_kgb', $data);
       
    }

    public function tambah_kgb()
    {
        $data = konfigurasi('Form Tambah Sarana', "as");
        $id = $this->uri->segment(4);
        $data['list_kgb'] = $this->Kgb_model->getKgb($id);
        $data['idPegawai'] = $id;
        if($data['list_kgb'] == []){
            $this->template->load('layouts/petugas_template', 'petugas/kgb/tambah_kgb_awal', $data);
        }else{
            $this->template->load('layouts/petugas_template', 'petugas/kgb/tambah_kgb', $data);
        }
        
        
        
    }

    public function simpan_kgb()
    {
        function convertMonths($month)
        {
            $month = date('m', $month);
            return $month;
        }

        function convertYears($year)
        {
            $year = date('y', $year);
            return $year;
        }
        // $jenis = $this->input->post('substansi');
        $no_surat = $this->input->post('no_surat');
        $tgl_surat = $this->input->post('tgl_surat');
        $idPegawai = $this->input->post('idPegawai');
         
        $tanggalolah  = strtotime($tgl_surat);


        $noSuratFix = "KP.05.03.9A.9A5." . convertMonths($tanggalolah) . "." . convertYears($tanggalolah) . "." . $no_surat;
        $lastKgb = $this->db->select("*")->limit(1)->order_by('idKgb',"DESC")-> where('idPegawai', $idPegawai) ->get("tbl_kgb")->row();

        $data = array(
            // 'jenisSurat' => $jenis,
            'sk_baru' => $noSuratFix,
            'tgl_sk_baru' => $tgl_surat,
            'gapok_lama' => $lastKgb->gapok_baru,
            'sk_lama' => $lastKgb->sk_baru,
            'tgl_sk_lama' => $lastKgb->tgl_sk_baru,
            'spmk_lama' => $lastKgb->spmk_baru,
            'tahun_kerja_lama' =>  $lastKgb->tahun_kerja_baru,
            'bulan_kerja_lama' =>  $lastKgb->bulan_kerja_baru,
            'gapok_baru' => '',
            'tahun_kerja_baru' => $lastKgb->tahun_kerja_baru + 2,
            'bulan_kerja_baru' => $lastKgb->bulan_kerja_baru,
            'golongan_baru'=> '',
            'spmk_baru'=> date_format(date_add(date_create($lastKgb->spmk_baru),date_interval_create_from_date_string("2 years")),"Y-m-d"),
            'status_kgb'=> 'Pengajuan',
            'idPegawai' => $idPegawai

        );

        $cekSurat= $this->Kgb_model->checkDuplicate($noSuratFix);

        if($cekSurat==0){
            $this->db->insert('tbl_kgb', $data);
        $this->session->set_flashdata('success', 'Data Berhasil Dimasukan');
        redirect('petugas/kgb/list_kgb/'.$idPegawai, 'refresh');
        }else{
            redirect('petugas/kgb/list_kgb/'.$idPegawai, 'refresh');
        }

        
        
    }


    public function simpan_kgb_awal()
    {
        function convertMonths($month)
        {
            $month = date('m', $month);
            return $month;
        }

        function convertYears($year)
        {
            $year = date('y', $year);
            return $year;
        }
       
       
        
        $idPegawai = $this->input->post('idPegawai');
        $sk_lama = $this->input->post('sk_lama');

        $data = array(
            // 'jenisSurat' => $jenis,
            
            'gapok_lama'=> $this->input->post('gapok_lama'),
            'sk_lama' => $this->input->post('sk_lama'),
            'sk_baru' => $this->input->post('sk_baru'),
            'spmk_lama' => $this->input->post('spmk_lama'),
            'tahun_kerja_lama' => $this->input->post('tahun_lama'),
            'gapok_baru'=> $this->input->post('gapok_baru'),
            'tahun_kerja_baru' =>$this->input->post('tahun_baru'),
            'tgl_sk_lama'=> $this->input->post('tgl_sk_lama'),
            'tgl_sk_baru'=> $this->input->post('tgl_sk_baru'),
            'bulan_kerja_lama' => $this->input->post('bulan_lama'),
            'bulan_kerja_baru' => $this->input->post('bulan_baru'),
            'spmk_baru' => $this->input->post('spmk_baru'),
            'status_kgb'=> 'Diterima',
            'note_kgb' => 'Ok',
            'idPegawai' => $idPegawai

        );

        $cekSurat= $this->Kgb_model->checkDuplicate($sk_lama);

        if($cekSurat==0){
            $this->db->insert('tbl_kgb', $data);
        $this->session->set_flashdata('success', 'Data Berhasil Dimasukan');
        redirect('petugas/kgb/list_kgb/'.$idPegawai, 'refresh');
        }else{
            redirect('petugas/kgb/list_kgb/'.$idPegawai, 'refresh');
        }

        
        
    }

    public function edit_kgb(){
    $id = $this->uri->segment(4);
    $data = konfigurasi('Form Edit Surat', "ap");
    $data['kgb'] = $this->Kgb_model->getKgbId($id);
    $data['idKgb'] = $id;
    $this->template->load('layouts/petugas_template', 'petugas/kgb/edit_kgb', $data);
        
    }


    public function edit_file_kgb(){
        $id = $this->uri->segment(4);
        $data = konfigurasi('Form Edit Surat', "ap");
        $data['kgb'] = $this->Kgb_model->getKgbId($id);
        $data['idKgb'] = $id;
        $this->template->load('layouts/petugas_template', 'petugas/kgb/edit_file_kgb', $data);
            
        }

    public function update_kgb(){
        $idKgb = $this->input->post('idKgb');
        $data = array(
            'idKgb' => $idKgb,
            'sk_baru' => $this->input->post('no_surat'),
            'tgl_sk_baru' =>$this->input->post('tgl_surat')
            
            );  
    
            

    $this->Kgb_model->updateKgb($data);
    $this->session->set_flashdata('success', 'Data Berhasil Diubah');

    $idPegawai = $this->db->select("*")-> where('idKgb', $idKgb)->get("tbl_kgb")->row()->idPegawai;
    
    redirect('petugas/kgb/list_kgb/'.$idPegawai, 'refresh');
    
            
        }

        public function update_kgb_file(){
            $idKgb = $this->input->post('idKgb');
            
            $config['upload_path'] = './assets/uploads/files/kgb';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = 'kgb-'.$idKgb;
                $config['overwrite'] = true;
                $config['max_size'] = 0;
            
    
                $this->load->library("upload",$config);
                $this->upload->initialize($config);
    
    
                if(!$this->upload->do_upload('file_kgb')){
                    echo $this->upload->display_errors();
                }else{
                    $fd=$this->upload->data();
                    $file=$fd['file_name'];
                }
    
                $data = array(
                    'file_kgb' => $file,
                    'idKgb' =>$idKgb
                    
                );
    
                $this->Kgb_model->updateFileKgb($data);

                $idPegawai = $this->db->select("*")-> where('idKgb', $idKgb)->get("tbl_kgb")->row()->idPegawai;
    
         
                redirect('petugas/kgb/list_kgb/'.$idPegawai, 'refresh');
                
            }
    
    

    public function hapus_kgb()
    {
        
        $id = $this->input->post('id_');
        $idPegawai = $this->input->post('idPegawai');
       
        $this->Kgb_model->hapus_kgb($id);
        redirect('petugas/kgb/list_kgb/'.$idPegawai, 'refresh');    
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
       $this->load->view('petugas/kgb/print_kgb', $data, FALSE);
      
    
    }


    // public function tambah_sarana()
    // {
    //     $data = konfigurasi('Form Tambah Sarana', "as");
    //     $this->template->load('layouts/petugas_template', 'petugas/form_sarana', $data);
    // }

    // public function simpan_sarana()
    // {
    //      $data = konfigurasi('Dashboard');
            
    //     $nama =  $this->input->post('namas');
    //     $alamat =  $this->input->post('alamats');
    //     $jenis =  $this->input->post('kategori');
    //     $produk = $this->input->post('produk');
    //     $kota =  $this->input->post('kota');
    //     $kecamatan =  $this->input->post('kecamatan');
    //     $kelurahan = $this->input->post('kelurahan');
    //     $kategori = $this->input->post('komoditi');

    //     $data1 = array(
    //         'namaSarana' => $nama,
    //         'alamatSarana' => $alamat,
    //         'jenisSarana' => $jenis,
    //         'produkSarana' => $produk,
    //         'kotaSarana' => $kota,
    //         'kecamatanSarana' => $kecamatan,
    //         'kelurahanSarana' => $kelurahan,
    //         'kategoriSarana' => $kategori
    //     );

    //     $this->db->insert('tbl_sarana', $data1);



    //     $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
    //     redirect('petugas/Master/data_sarana', 'refresh');
    // }
    
    // public function editSarana(){
    //         $id = $this->uri->segment(4);
    //     $data = konfigurasi('Form Edit Surat', "ap");
    //     $data['sarana'] = $this->Master_model->getSaranaId($id);
    //     $this->template->load('layouts/petugas_template', 'petugas/edit_sarana', $data);
            
    //     }

    // public function ubahSarana()
    // {
    //      $data = konfigurasi('Dashboard');
            
    //     $data = konfigurasi('Pilih Surat Tugas', 'ap');
    //         $id = $this->input->post('id');
    //         $ns =  $this->input->post('nama');
    //         $als =  $this->input->post('alamat');
    //         $jenis =  $this->input->post('jenis');
    //         $produk =  $this->input->post('produk');
    //         $kota =  $this->input->post('kota');
    //         $kecamatan =  $this->input->post('kecamatan');
    //         $kelurahan =  $this->input->post('kelurahan');
    //         $kategori =  $this->input->post('kategori');


    //     $data1 = array(
    //             'idSarana' => $id,
    //             'namaSarana' => $ns,
    //             'alamatSarana' => $als,
    //             'jenisSarana' => $jenis,
    //             'produkSarana' => $produk,
    //             'kotaSarana' => $kota,
    //             'kecamatanSarana' => $kecamatan,
    //             'kelurahanSarana' => $kelurahan,
    //             'kategoriSarana' => $kategori
    //             );  

    //     $this->Master_model->updateSarana($data1);
    //     redirect('petugas/Master/data_sarana');
    // }


    
}
