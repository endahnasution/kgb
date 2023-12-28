<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_pj extends CI_Controller
{
	// main page


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('SuratPj_model');
	}


	public function index()
	{
		$data = konfigurasi('Form Surat Pertanggung Jawaban Dakota', "ap");
		$data['tugas'] = $this->SuratPj_model->getTugas();
		$this->template->load('layouts/admin_template', 'admin/form_pj', $data);
	}

	function getPetugas()
	{
		if ($this->input->post('noSuratTugas')) {
			echo $this->SuratPj_model->getPetugas($this->input->post('noSuratTugas'));
		}
	}


	public function simpanKwitansi()
	{

$data = konfigurasi('Pilih Surat Tugas', 'ap');
		$noSurat =  $this->input->post('surattugas');
		$petugas =  $this->input->post('petugas');
		$tanggal =  $this->input->post('tanggal');
		$uraian =  $this->input->post('uraian');
		$kategori =  $this->input->post('kategori');
		$biaya =  $this->input->post('biaya');

		$idKwitansi = $this->SuratPj_model->getRowKwitansi();
		$idKw = $idKwitansi->idKwitansi + 1;


		$data1 = array(
			'tglKwitansi' => $tanggal,
			'idTugas' => $petugas
		);

		$this->db->insert('tbl_kwitansi', $data1);

		for ($i = 0; $i < count($uraian); $i++) {
			$data2 = array(
				'uraian' => $uraian[$i],
				'kategori' => $kategori[$i],
				'biaya' => $biaya[$i],
				'idKwitansi' => $idKw

			);

			$this->db->insert('tbl_uraian', $data2);
		}

		$this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
		redirect('admin/surat_pj', 'refresh');
	}

	public function editKwitansi()
	{

$data = konfigurasi('Pilih Surat Tugas', 'ap');
		$noSurat =  $this->input->post('surattugas');
		$idKwitansi = $this->input->post('idkwitansi');
		$tanggal =  $this->input->post('tanggal');
		$spm =  $this->input->post('spm');  
		$uraian =  $this->input->post('uraian');
		$kategori =  $this->input->post('kategori');
		$biaya =  $this->input->post('biaya');

		

		$this->SuratPj_model->ubahKw($tanggal, $spm, $idKwitansi);
		$this->SuratPj_model->hapusUraian($idKwitansi);

		for ($i = 0; $i < count($uraian); $i++) {
			$data = array(
				'uraian' => $uraian[$i],
				'kategori' => $kategori[$i],
				'biaya' => $biaya[$i],
				'idKwitansi' => $idKwitansi 	

			);

			$this->db->insert('tbl_uraian', $data);
		}

		$this->session->set_flashdata('success', 'Data Berhasil Diupdate	');
		redirect('admin/surat_pj', 'refresh');
	}
}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */