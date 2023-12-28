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
        $data['list_lhk'] = $this->Lhk_model->getLhkPenindakan();
        // $data['upload_file'] = $this->Lhk_model->getFileLhk();
        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/list_lhk_v', $data);
    }


    public function tambahLhk()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $data['surat_tugas'] = $this->Lhk_model->getSuratTugasPenindakan();
        $data['sarana'] = $this->Lhk_model->getSarana();
        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/lhk_pendik_v', $data);
    }



    public function addLhk()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $idSurat = $this->input->post('suratTugas');
        $tglLhk = $this->input->post('tglLhk');
        $sppd = $this->input->post('sppd');
        $kwitansi = $this->input->post('kwitansi');
        $form = $this->input->post('form');

        $data2 = array(
            'tglLhk'   => $tglLhk,
            'jenisLhk' => "penindakan",
            'pengesahSppd' => $sppd,
            'pengesahKwitansi' => $kwitansi,
            'pengesahForm' => $form,
            'idSuratTugas' => $idSurat
        );


        $checkvalidation = $this->Lhk_model->checkDuplicate($idSurat);

        //var_dump($t);

        if ($checkvalidation == true) {

            $this->db->insert('tbl_lhk', $data2);
            redirect('petugas/lhkPenindakan/list_lhk_c', 'refresh');
        } else {
            redirect('petugas/lhkPenindakan/list_lhk_c/tambahLhk', 'refresh');
        }
    }

    public function edit_lhk()
    {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->uri->segment(5);
        $data = konfigurasi('Form Edit LHK', "ap");
        $data['lhk'] = $this->Lhk_model->getLhkDet($id);
        // $data['data_sarana'] = $this->Lhk_model->getSarana();
        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/edit_lhk_penindakan_v', $data);
    }

    public function edit()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $idSurat = $this->input->post('idSuratTugas');
        $tglLhk = $this->input->post('tglLhk');
        $sppd = $this->input->post('sppd');
        $kwitansi = $this->input->post('kwitansi');
        $form = $this->input->post('form');


        $data_edit = array(
            'tglLhk' => $tglLhk,
            'pejabat' => "-",
            'sppd' => $sppd,
            'kwitansi' => $kwitansi,
            'form' => $form,
            'sampling' => "-",
            'deskripsi' => "-",
            'idSurat' => $idSurat
        );

        $this->Lhk_model->updateLhk($data_edit);



        redirect('petugas/lhkPenindakan/list_lhk_c', 'refresh');
    }



    public function hp_lhk()
    {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
        $idLhk = $this->uri->segment(5);
        $data = konfigurasi('Form Tambah Hasil Pemeriksaan LHK', "ap");
        $idSurat = $this->Lhk_model->getNomorSurat($idLhk);
        $lhk = $this->Lhk_model->jenisLhkSuratOne($idLhk);

        $data['idLhk'] = $idLhk;
        $data['idSurat'] = $idSurat;
        $data['data_sarana'] = $this->Lhk_model->getSarana();

        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/hp_lhk_pem_v', $data);
    }

    public function addhp()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $idSurat = $this->input->post('idSurat');
        $idLhk = $this->input->post('idLhk');
        $idSarana = $this->input->post('sarana');
        $temuan = $this->input->post('temuan');
        $tl = $this->input->post('tl');
        $kesimpulan = $this->input->post('kesimpulan');
        $keterangan = $this->input->post('keterangan');
        $temuan_tm = implode(",", $temuan);

        $datahp = array(
            'idSarana' => $idSarana,
            'temuan' => $temuan_tm,
            'jenisTl' => $tl,
            'isMk' => $kesimpulan,
            'deskripsiTemuan' => $keterangan,
            'idSuratTugas' => $idSurat
        );

        $this->db->insert('tbl_surattl', $datahp);
        $data['lhk'] = $this->Lhk_model->getLhkDet($idLhk);
        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/edit_lhk_penindakan_v', $data);
    }

    public function editt_hp_lhk()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $idd = $this->uri->segment(5);
        $id = explode("%20", $idd);
        $idLhk = $id[0];
        $idSarana = $id[1];

        $data['data_sarana'] = $this->Lhk_model->getSarana();
        $data['detail_sarana'] = $this->Lhk_model->getDetailSarana($idSarana);
        $data['idLhk'] = $idLhk;


        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/edit_hp_lhk_penindakan_v', $data);
    }

    public function edit_hasil()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->input->post('id');
        $id = explode(" ", $id);
        $idLhk = $id[0];
        $idTl = $id[1];

        echo $idTl;

        $idSarana = $this->input->post('sarana');
        $temuan = $this->input->post('temuan');
        $temuan_tm = implode(",", $temuan);
        $tl = $this->input->post('tl');
        $kesimpulan = $this->input->post('kesimpulan');
        $keterangan = $this->input->post('keterangan');


        $data_edit = array(
            'idSarana' => $idSarana,
            'temuan' => $temuan_tm,
            'jenisTl' => $tl,
            'isMk' => $kesimpulan,
            'deskripsiTemuan' => $keterangan,
            'idTl' => $idTl,
            'tglPeriksa'=>"-"

        );


        $this->Lhk_model->updateSarana($data_edit);

        $data['lhk'] = $this->Lhk_model->getLhkDet($idLhk);
        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/edit_lhk_penindakan_v', $data);
    }




    public function hapus_lhk()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->input->post('id_');
        $this->Lhk_model->hapusLhk($id);
        redirect('petugas/lhkPenindakan/list_lhk_c');
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
        $this->load->view('petugas/lhkPenindakan/lhk_penindakan_isi', $data, FALSE);
    }

    public function hapusHasilPemeriksaan()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->input->post('id_');
        $id = explode("+", $id);
        $idLhk = $id[0];
        $idSarana = $id[1];
        $this->Lhk_model->hapusPemeriksaan($idSarana);
        $data['lhk'] = $this->Lhk_model->getLhkDet($idLhk);
        $this->template->load('layouts/petugas_template', 'petugas/lhkPenindakan/edit_lhk_penindakan_v', $data);
    }
}
