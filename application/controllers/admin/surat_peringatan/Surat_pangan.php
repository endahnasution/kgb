	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Surat_pangan extends CI_Controller
	{
		// main page


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('SuratPeringatan_model');
			$this->load->model('SuratPangan_model');
			$this->load->model('SuratTl_model');
		}


		public function index()
		{
			$data = konfigurasi('Form Surat Peringatan Pangan', "");
			$data['surat_tugas'] = $this->SuratTl_model->getSuratTugas();
			$this->template->load('layouts/admin_template', 'admin/surat_peringatan/surat_pangan/form', $data);
		}


		public function editPeringatan()
		{
			$idPeringatan = $this->input->post('idPeringatan');
			$tanggal =  $this->input->post('tanggalSurat');
			$noSurat =  $this->input->post('noSurat');
			// detil sarana
			$tglMulaiperiksa = $this->input->post('tglMulaiperiksa');

			$namaPimpinan =  $this->input->post('namaPimpinan');

			$noHp =  $this->input->post('noHp');
			// detil temuan
			$detPelanggaran = $this->input->post('detPelanggaran');
			$detPasal = $this->input->post('detPasal');

			$noSuratFix = "T-PW.01.12.9A.9A2." . $noSurat;
			echo $noSuratFix;





			$data_edit = array(
				'idPeringatan' => $idPeringatan,
				'tglSuratPeringatan' => $tanggal,
				'noSuratPeringatan' => $noSurat,
				'tglPeriksa' => $tglMulaiperiksa,

				'namaPimpinan' => "$namaPimpinan",

				'noHp' => $noHp,
				'detailPeringatan' => $detPelanggaran,
				'pasalPeringatan' => $detPasal

			);




			$this->SuratPeringatan_model->updateSuratPeringatan($data_edit);

			redirect('admin/surat_peringatan/C_surat_peringatan');
		}

		public function surat()
		{

			$idPeringatan = $this->input->post('idPeringatan');
			$detail = $this->SuratPeringatan_model->getPeringatanEdit($idPeringatan);

			foreach ($detail as $row) {
				$tanggal = $row->tglSuratPeringatan;
				$noSuratFix = $row->noSuratPeringatan;
				$tglMulaiperiksa = $row->tglPeriksa;
				$noIzin = $row->noIzin;
				$namaPimpinan = $row->namaPimpinan;
				$noHp = $row->noHp;
				$pasal = $row->pasalPeringatan;
				$idSarana = $row->idSarana;
				$detailTemuan = $row->deskripsiTemuan;
				$pasalPeringatan = $row->pasalPeringatan;
			}


			$pasal_peringatan = explode(", ", $pilihPasal);


			$pasal_peringatan = array();
			foreach ($pilihPasal as $num) {
				$pasal['data'] = $this->SuratPbf_model->getPasal($num);
				array_push($pasal_peringatan, $pasal);
			}


			$dataSarana = $this->SuratPeringatan_model->getSarana($idSarana);

			foreach ($dataSarana as $row) {
				$namaSarana = $row->namaSarana;
				$idTl =  $row->idTl;
				$alamatSarana = $row->alamatSarana;
				$halSurat = $row->jenisTl;
				$kotaSurat = $row->kotaSarana;
			}



			$data = array(
				'title' => 'Cetak surat tugas',
				'tanggal' => $tanggal,
				'noSurat' => $noSuratFix,
				'halSurat' => $halSurat,
				'penerimaSurat' => $namaSarana,
				'kotaSurat' => $kotaSurat,
				'namaSarana' => $namaSarana,
				'alamatSarana' => $alamatSarana,
				'tglMulaiperiksa' => $tglMulaiperiksa,
				'namaPemilik' => $namaPimpinan,
				'noHp' => $noHp,
				'detailTemuan' => $detailTemuan,
				'pasalPeringatan' => $pasalPeringatan

			);

			$this->load->view('admin/surat_peringatan/surat_pangan/isiSurat', $data, FALSE);
		}
	}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */