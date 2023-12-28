<?php

defined('BASEPATH') or exit('No direct script access allowed');

class monitoring extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Monitoring_model');
        $this->load->model('Master_model');
        $this->load->model("Feedback_model");
			$this->load->model('feedbackCapa');
    }


    public function data_monitoring()
    {
 $data = konfigurasi('Dashboard');
            
        $data['monitoring'] = $this->Monitoring_model->getMonitoring();
        $this->template->load('layouts/petugas_template', 'petugas/data_monitoring', $data);
    }

    public function tambah_monitoring()
    {
        $data1 = konfigurasi('Form Tambah Sarana', "as");
        $data['sarana'] = $this->Monitoring_model->getSarana();
        $data['petugas'] = $this->Master_model->getPegawai();
        $this->template->load('layouts/petugas_template', 'petugas/form_monitoring',$data);
    }

   

    public function simpan_monitoring()
    {
         $data = konfigurasi('Dashboard');
            
        $idPegawai = $this->input->post('idPegawai');
        $idTl =  $this->input->post('idTl');
       
        $data = array(
            'idPetugas' => $idPegawai,
            'idTl' => $idTl
           
        );

        $this->db->insert('tbl_peringatan', $data);

        $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
        redirect('petugas/Monitoring/data_monitoring', 'refresh');
    }

    public function edit_monitoring()
    {
        $data1 = konfigurasi('Form Tambah Sarana', "as");
        $idPeringatan = $this->uri->segment(4);
        
        $data['riwayatMonitoring'] = $this->Monitoring_model->getRiwayatId($idPeringatan);
        $data['monitoring'] = $this->Monitoring_model->getMonitoringId($idPeringatan);
        $data['petugas'] = $this->Master_model->getPegawai();
        $this->template->load('layouts/petugas_template', 'petugas/edit_monitoring',$data);
       
    }

    public function ubah_monitoring()
    {
         $data = konfigurasi('Dashboard');
            
        $idPeringatan = $this->input->post('idPeringatan');
        $idPegawai = $this->input->post('idPegawai');
         $data = array(
            'idPeringatan' => $idPeringatan,
            'idPegawai' => $idPegawai
            
        );

        $this->Monitoring_model->updateMonitoring($data);
        
        redirect('petugas/Monitoring/data_monitoring');
    }


    public function hapus_monitoring()
    {
         $data = konfigurasi('Dashboard');
            
        $id = $this->input->post('idHapus');
        $this->Monitoring_model->hapus_monitoring($id);
        redirect('petugas/monitoring/data_monitoring');
    }

    public function data_capa()
    {
 $data = konfigurasi('Dashboard');
            
        $data['list_feedback']= $this->Feedback_model->getFeedback();
        $this->template->load('layouts/petugas_template', 'petugas/data_capa', $data);
    }

    public function edit_capa()
    {
         $data = konfigurasi('Dashboard');
            

        $idFeedback = $this->uri->segment(4);
		$data['sarana_tl'] = $this->feedbackCapa->getSaranaTl();
        $data['dataFeedback'] = $this->Feedback_model->getFeedbackId($idFeedback);
        $data['petugas'] = $this->Feedback_model->getPetugas($idFeedback);
		$this->template->load('layouts/petugas_template', 'petugas/edit_capa', $data);
    }

    public function ubah_capa(){
       
        $data = konfigurasi('Dashboard');
            
			$idFeedback = $this->input->post('idFeedback');
            $idPetugas = $this->input->post('idPetugas');
			$created = $this->input->post('created');
        	

		$this->Feedback_model->updateCreatedCapa($created,$idFeedback,$idPetugas);
		redirect('petugas/monitoring/data_capa');
		
    }

    
		public function hapus_capa(){
		     $data = konfigurasi('Dashboard');
            
			$id = $this->input->post('idFeedback');
			$idTl = $this->input->post('idTl');
			$this->Feedback_model->hapus_SuratFeedback($id,$idTl);
			redirect('petugas/monitoring/data_capa');
			}
	
		

    public function tambah_riwayat()
    {
         $data = konfigurasi('Dashboard');
     
        $idPeringatan = $this->uri->segment(4);
        $data['idPeringatan']= $idPeringatan;
        $this->template->load('layouts/petugas_template', 'petugas/tambah_riwayat',$data);
       
    }

    public function simpan_riwayat()
    {
         $data = konfigurasi('Dashboard');
            
        $idPeringatan = $this->input->post('idPeringatan');
        $tanggal = $this->input->post('tanggal');
        $status = $this->input->post('status');
        $sesuai = $this->input->post('sesuai');
        $justifikasi = $this->input->post('justifikasi');
        if($sesuai!=null){
            $sesuai = 1;
        }else{
            $sesuai = 0;
        }
        $data = array(
            'statusMonitoring' => $status,
            'tanggalMonitoring' => $tanggal,
            'kesesuaianMonitoring' => $sesuai, 
            'justifikasiMonitoring' => $justifikasi,
            'idPeringatan' => $idPeringatan
           
        );

        $this->db->insert('tbl_monitoring', $data);

        $data['riwayatMonitoring'] = $this->Monitoring_model->getRiwayatId($idPeringatan);
        $data['monitoring'] = $this->Monitoring_model->getMonitoringId($idPeringatan);
        $data['petugas'] = $this->Master_model->getPegawai();
        $this->template->load('layouts/petugas_template', 'petugas/edit_monitoring',$data);
    }

    public function hapus_riwayat()
    {
         $data = konfigurasi('Dashboard');
            
        $id = $this->input->post('id__');
        $idPeringatan = $this->input->post('idPeringatan');
        $this->Monitoring_model->hapus_riwayat($id);
        $data['riwayatMonitoring'] = $this->Monitoring_model->getRiwayatId($idPeringatan);
        $data['monitoring'] = $this->Monitoring_model->getMonitoringId($idPeringatan);
        $data['petugas'] = $this->Master_model->getPegawai();
        $this->template->load('layouts/petugas_template', 'petugas/edit_monitoring',$data);
        
        
    }

    public function edit_riwayat()
    {
         $data = konfigurasi('Dashboard');
            
     
        $id = explode("&",$this->uri->segment(4));
        $idMonitoring = $id[0];
        $idPeringatan = $id[1];
        $data['idPeringatan'] = $idPeringatan;
        $data['riwayatMonitoring'] = $this->Monitoring_model->getRiwayatMonitoring($idMonitoring);
        $this->template->load('layouts/petugas_template', 'petugas/edit_riwayat',$data);
       
    }

    public function update_riwayat()
    {
        
        $data = konfigurasi('Form Tambah Sarana', "as");
        $idPeringatan = $this->input->post('idPeringatan');
        $idMonitoring = $this->input->post('idMonitoring');
        $tanggal = $this->input->post('tanggal');
        $status = $this->input->post('status');
        $sesuai = $this->input->post('sesuai');
        $justifikasi = $this->input->post('justifikasi');
        if($sesuai!=null){
            $sesuai = 1;
        }else{
            $sesuai = 0;
        }
        $data = array(
            'statusMonitoring' => $status,
            'tanggalMonitoring' => $tanggal,
            'kesesuaianMonitoring' => $sesuai, 
            'justifikasiMonitoring' => $justifikasi,
            'idMonitoring' => $idMonitoring
           
        );
        
        $this->Monitoring_model->updateRiwayatMonitoring($data);
        $data['riwayatMonitoring'] = $this->Monitoring_model->getRiwayatId($idPeringatan);
        $data['monitoring'] = $this->Monitoring_model->getMonitoringId($idPeringatan);
        $data['petugas'] = $this->Master_model->getPegawai();
        $this->template->load('layouts/petugas_template', 'petugas/edit_monitoring',$data);
       
    }
}
