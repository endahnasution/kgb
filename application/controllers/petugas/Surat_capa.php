<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_capa extends CI_Controller
{
	// main page

	public function __construct()
	{
		parent::__construct();
		$this->load->model("SuratPeringatan_model");
		$this->load->model("SuratTl_model");
	}

	public function index()
	{
 $data = konfigurasi('Dashboard');
            
		$data['capa'] = $this->SuratPeringatan_model->getCapa();
		$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/capa/list_capa', $data);
	}

	public function buatCapa()
	{
		$data = konfigurasi('Pilih Surat Capa', 'ap');
		$data['surat'] = $this->SuratTl_model->getSuratTugasCapa();
		$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/capa/sub_capa', $data);
	}

	public function simpanCapa()
	{
	     $data = konfigurasi('Dashboard');
            
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

		// $tanggal =  $this->input->post('tanggal');
		$noSurat =  $this->input->post('noSurat');
		$halSurat = $this->input->post('halSurat');
		$idSurat = $this->input->post('suratTugas');
		// detil sarana
		$idSarana =  $this->input->post('idSarana');
		$komoditi = $this->input->post('komoditi');
		$pembuat =  $this->input->post('pembuat');

		// detil temuan
		$detailTemuan =  $this->input->post('detailTemuan');

// 		$tanggalolah  = strtotime($tanggal);

// 		if ($komoditi == "obat") {
// 			$noSuratFix = "T-PW.01.12.9A.9A2." . convertMonths($tanggalolah) . "." . convertYears($tanggalolah) . "." . $noSurat;
// 		} else if ($komoditi == "pangan") {
// 			$noSuratFix = "T-PW.04.02.9A.9A2." . convertMonths($tanggalolah) . "." . convertYears($tanggalolah) . "." . $noSurat;
// 		}else if($komoditi == "kemasan"){
// 			$noSuratFix = "T-PW.04.01.9A.9A2." . convertMonths($tanggalolah) . "." . convertYears($tanggalolah) . "." . $noSurat;
// 		}else{
// 			$noSuratFix = "T-PW.03.02.9A.9A2." . convertMonths($tanggalolah) . "." . convertYears($tanggalolah) . "." . $noSurat;
// 		}
		
				if ($komoditi == "obat") {
			$noSuratFix = "T-PW.01.12.9A.9A2." . $noSurat;
		} else if ($komoditi == "pangan") {
			$noSuratFix = "T-PW.04.02.9A.9A2.". $noSurat;
		}else if($komoditi == "kemasan"){
			$noSuratFix = "T-PW.04.01.9A.9A2.". $noSurat;
		}else{
			$noSuratFix = "T-PW.03.02.9A.9A2." . $noSurat;
		}

		$dataSarana = $this->SuratPeringatan_model->getSarana($idSarana);


		foreach ($dataSarana as $row) {
			$idTl =  $row->idTl;
		}

		if ($halSurat == "Close CAPA") {
			$data_db = array(

				// 'tglSuratPeringatan' => $tanggal,
				'noSuratPeringatan' => $noSuratFix,
				'jenisPeringatan' => $halSurat,
				'pembuatCapa' => $pembuat,
				'isiCapa' =>$detailTemuan,
				'idTl' => $idTl,
				'status' => 0
			);
		} else {
			$data_db = array(
				// 'tglSuratPeringatan' => $tanggal,
				'noSuratPeringatan' => $noSuratFix,
				'jenisPeringatan' => $halSurat,
				'isiCapa' =>$detailTemuan,
				'idTl' => $idTl,
				'status' => 0
			);
		}

			$checkvalidation = $this->SuratPeringatan_model->checkDuplicate($noSuratFix);
		if ($checkvalidation == true) {
			$this->db->insert('tbl_peringatan', $data_db);
			redirect('petugas/surat_capa', 'refresh');

		} else {
			// $this->session->set_flashdata('failed', 'Maaf, Data tidak diproses karena duplikat');
			redirect('petugas/surat_capa/buat_capa', 'refresh');
		}
	}

	public function editCapa(){
	     $data = konfigurasi('Dashboard');
            
		$id = $this->uri->segment(4);
		$data = konfigurasi('Form Edit Surat CAPA', "ap");
		$data["editCapa"] = $this->SuratPeringatan_model->getEditCapa($id);
		$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/capa/edit_capa', $data);
	}

	public function simpanEditCapa(){
	     $data = konfigurasi('Dashboard');
            
		$id = $this->input->post('idPeringatan');
		// $tanggal =  $this->input->post('tanggalSurat');
		$noSurat =  $this->input->post('noSurat');
		$halSurat = $this->input->post('halSurat');
		// detil sarana
		$pembuat =  $this->input->post('pembuat');

		// detil temuan
		$detailTemuan =  $this->input->post('detailTemuan');

		$data_edit = array(
				// 'tglSuratPeringatan' => $tanggal,
				'noSuratPeringatan' => $noSurat,
				'jenisPeringatan' => $halSurat,
				'pembuatCapa' => $pembuat,
				'isiCapa' =>$detailTemuan,
				'idPeringatan' => $id
			);

		$this->SuratPeringatan_model->updateSuratCapa($data_edit);

		redirect('petugas/surat_capa');


	}

	public function printCapa()
	{
 $data = konfigurasi('Dashboard');
            
		
	$id = $this->input->post('idPeringatan');
	$detail = $this->SuratPeringatan_model->getEditCapa($id);
	
		foreach ($detail as $row) {
                $noSurat = $row->noSuratTugas;
                $tanggal = $row->tglSuratPeringatan;
                $noSurat = $row->noSuratPeringatan;
                $halSurat = $row->jenisPeringatan;
                $namaSarana = $row->namaSarana;
                $alamatSarana = $row->alamatSarana;
                $kota = $row->kotaSarana;
                $detailTemuan = $row->isiCapa;
		}




		$data = array(
			'title' => 'Cetak surat tugas',
			// 'tanggal' => $tanggal,
			'noSurat' => $noSurat,
			'halSurat' => $halSurat,
			'penerimaSurat' => $namaSarana,
			// detil sarana
			'namaSarana' => $namaSarana,
			'alamatSarana' => $alamatSarana,
			'kotaSurat' => $kota,

			// detil temuan
			'detailTemuan' => $detailTemuan
		);

		

	$this->load->view('petugas/surat_peringatan/capa/surat_capa', $data, FALSE);
		
	}

	public function getSaranaPer()
	{
		if ($this->input->post('idPer')) {
			echo $this->SuratPeringatan_model->getSaranaCapa($this->input->post('idPer'));
		}
	}
	
	public function hapusCapa()
	{
	     $data = konfigurasi('Dashboard');
            
		$id = $this->input->post('idCapa');
		echo $id;
		$this->SuratPeringatan_model->hapusSuratPeringatan($id);
		redirect('petugas/surat_capa');
	}
}
