<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_surat_peringatan extends CI_Controller
{
	// main page

	public function __construct()
	{
		parent::__construct();
		$this->load->model("SuratPeringatan_model");
	}

	public function index()
	{

$data = konfigurasi('Pilih Surat Tugas', 'ap');
		$data = konfigurasi('Pilih Surat Peringatan', '');
		$data['list_peringatan'] = $this->SuratPeringatan_model->getSuratPeringatan();
		// $data['upload_file'] = $this->SuratPeringatan_model->getFile();
		$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_peringatan', $data);
	}

	public function sub_obat()
	{
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$data = konfigurasi('Pilih Surat Peringatan Obat', '');
		$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/sub_surat_obat', $data);
	}

	public function edit_peringatan()
	{
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$id = $this->uri->segment(5);
		$data = konfigurasi('Form Edit Surat Peringatan', "ap");
		$data["peringatan"] = $this->SuratPeringatan_model->getPeringatanEdit($id);
		$jenisPeringatan = $this->SuratPeringatan_model->jenisPeringatan($id);
		foreach ($jenisPeringatan as $row) {
			$jenis = $row->jenisPeringatan;
		}


		$array_temuan = array();

		if ($jenis == "pbf") {


			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_pbf/edit', $data);
		} else if ($jenis == "apt") {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_obat");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_obat");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_apotek/edit', $data);
		} else if ($jenis == "rs") {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_obat");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_obat");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_rs/edit', $data);
		} else if ($jenis == "klinik") {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_obat");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_obat");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_klinik/edit', $data);
		} else if ($jenis == "obat") {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_obat");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_obat");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_obat/edit', $data);
		} else if ($jenis == "puskesmas") {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_obat");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_obat");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_puskesmas/edit', $data);
		} else if ($jenis == "pangan") {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_pangan");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_pangan");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_pangan/edit', $data);
		} else if ($jenis == "kosmetik") {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_kosmetik");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_kosmetik");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_kosmetik/edit', $data);
		} else {

			// foreach ($temuan_arr as $num) {
			// 	$temuan2 = $this->SuratPeringatan_model->getTemuanDetail($num, "tbl_temuan_kemasan");
			// 	array_push($array_temuan, $temuan2);
			// }


			// $data['temuanData'] = $array_temuan;

			// $data["temuanAll"] = $this->SuratPeringatan_model->getTemuan("tbl_temuan_kemasan");
			$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_kemasan/edit', $data);
		}
	}



	public function ubah_suratPeringatan()
	{
		$id = $this->input->post('idPeringatan');
		$tglEdit = $this->input->post('tglEdit');
		$noEdit = $this->input->post('noEdit');

		// $config['upload_path'] = './assets/uploads/files/peringatan';
		// $config['allowed_types'] = 'pdf';
		// $config['file_name'] = 'suratPeringatan-' . $id;
		// $config['overwrite'] = true;
		// $config['max_size'] = 0;


		// $this->load->library("upload", $config);
		// $this->upload->initialize($config);

		// if (!$this->upload->do_upload('fileEdit')) {
		// 	echo $this->upload->display_errors();
		// } else {
		// 	$fd = $this->upload->data();
		// 	$file = $fd['file_name'];

		$data_peringatan = array(
			'id' => $id,
			'tglSuratPeringatan' => $tglEdit,
			'noSuratPeringatan' => $noEdit
			// 'filePeringatan' => $file
		);

		$this->SuratPeringatan_model->updateSuratPeringatan($data_peringatan);
		redirect('petugas/surat_peringatan/C_surat_peringatan');
		// }
		// $config['file_name'] = 'suratPeringatan-'.$id;
		// $config['overwrite'] = true;
		// $config['max_size'] = 0;


		// $this->load->library("upload",$config);
		// $this->upload->initialize($config);

		// if(!$this->upload->do_upload('fileEdit')){
		// 	echo $this->upload->display_errors();
		// }else{
		// 	$fd=$this->upload->data();
		// 	$file=$fd['file_name'];

		$data_peringatan = array(
			'id' => $id,
			'tglSuratPeringatan' => $tglEdit,
			'noSuratPeringatan' => $noEdit
			// 'filePeringatan' => $file	
		);

		$this->SuratPeringatan_model->updateSuratPeringatan($data_peringatan);
		redirect('petugas/surat_peringatan/C_surat_peringatan');
	}





	public function hapus_suratPeringatan()
	{
	    $data = konfigurasi('Pilih Surat Tugas', 'ap');
		$id = $this->input->post('idPeringatan');
		$this->SuratPeringatan_model->hapusSuratPeringatan($id);
		redirect('petugas/surat_peringatan/C_surat_peringatan');
	}


	public function getSaranaPer()
	{
		if ($this->input->post('idPer')) {
			echo $this->SuratPeringatan_model->getSaranaPer($this->input->post('idPer'));
		}
	}
}

	



/* End of file Home.php */
/* Location: ./application/controllers/Home.php */