<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_pj extends CI_Controller {
	// main page


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('SuratKw_model');
	}


	public function index()
	{
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$data = konfigurasi('Form Surat Pertanggung Jawaban Dakota',"ap");
		$data['kwitansi'] = $this->SuratKw_model->getKw();
		$data['jumlah_file'] = $this->SuratKw_model->getFile();
		$this->template->load('layouts/admin_template', 'admin/surat_pj', $data);

	}


	public function ubahPj(){
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$id = $this->input->post('idKw');
		$tglEdit = $this->input->post('tglEdit');
	
		$config['upload_path'] = './assets/uploads/files/kwitansi';
		$config['allowed_types'] = 'pdf';
		$config['file_name'] = 'kwitansi-'.$id;
		$config['overwrite'] = true;
		$config['max_size'] = 0;
		

		$this->load->library("upload",$config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('fileEdit')){
			echo $this->upload->display_errors();
		}else{
			$fd=$this->upload->data();
			$file=$fd['file_name'];

			$data_kw = array (
				'idKwitansi' => $id,
				'tglKwitansi' => $tglEdit,
				'fileKwitansi' => $file	
			);


			$this->SuratKw_model->updateKw($data_kw);
			redirect('admin/surat_pj');
		}
	}

	public function printDk(){
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$id = $this->input->post('idKw');
		$data['idKw'] = $id;
		$data['kwDakota'] = $this->SuratKw_model->dataKw($id);
		$this->load->view('admin/pjDakota', $data, false);
		

	}

	public function printLk(){
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$id = $this->input->post('idKw');
		$data['idKw'] = $id;
		$data['kwLukota'] = $this->SuratKw_model->dataKw($id);
		$this->load->view('admin/pjLukota', $data, false);
	}

	public function list_nominatif(){
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$data = konfigurasi('List Nominatif per Surat Tugas',"ap");
		$data['kwitansi'] = $this->SuratKw_model->getKw();
		$data['jumlah_file'] = $this->SuratKw_model->getFile();
		$this->template->load('layouts/admin_template', 'admin/surat_pj', $data);
	}

}

/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */