	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Surat_kemasan extends CI_Controller
	{
		// main page


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('SuratKemasan_model');
			$this->load->model('SuratPeringatan_model');
			$this->load->model('SuratTl_model');
		}


		public function index()
		{
			$data = konfigurasi('Form Surat Peringatan Obat', "");
			$data['surat_tugas'] = $this->SuratTl_model->getSuratTugas();
			$this->template->load('layouts/admin_template', 'admin/surat_peringatan/surat_kemasan/form', $data);
		}


		public function editPeringatan()
		{
		    $data = konfigurasi('Pilih Surat Tugas', 'ap');
			$idPeringatan = $this->input->post('idPeringatan');
			$tanggal =  $this->input->post('tanggalSurat');
			$noSurat =  $this->input->post('noSurat');
			// detil sarana
			$tglMulaiperiksa = $this->input->post('tglMulaiperiksa');

			$namaPimpinan =  $this->input->post('namaPimpinan');
			$namaPj = $this->input->post('namaPj');
			$nib = $this->input->post('nib');

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
				'noIzin' => $noIzin,
				'namaPimpinan' => $namaPimpinan,
				'namaPj' => $namaPj,
				'nib' => $nib,
				'noSipa' => $noSip,
				'noHp' => $noHp,
				'detailPeringatan' => $detPelanggaran,
				'pasalPeringatan' => $detPasal

			);



			$this->SuratPeringatan_model->updateSuratPeringatan($data_edit);

			redirect('admin/surat_peringatan/C_surat_peringatan');
		}





		public function surat()
		{
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
			$idPeringatan = $this->input->post('idPeringatan');
			$detail = $this->SuratPeringatan_model->getPeringatanEdit($idPeringatan);

			foreach ($detail as $row) {
				$tanggal = $row->tglSuratPeringatan;
				$noSuratFix = $row->noSuratPeringatan;
				$tglMulaiperiksa = $row->tglPeriksa;
				$noIzin = $row->noIzin;
				$namaPimpinan = $row->namaPimpinan;
				$namaPj = $row->namaPj;
				$noHp = $row->noHp;
				$pasal = $row->pasalPeringatan;
				$idSarana = $row->idSarana;
				$detailTemuan = $row->deskripsiTemuan;
				$nib = $row->nib;
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
				'penerimaSurat' => $namaSarana,
				'kotaSurat' => $kotaSurat,
				'halSurat' => $halSurat,
				// 
				'namaSarana' => $namaSarana,
				'alamatSarana' => $alamatSarana,
				'tglMulaiperiksa' => $tglMulaiperiksa,
				'nib' => $nib,
				'noHp' => $noHp,
				'namaPimpinan' => $namaPimpinan,
				'namaPj' => $namaPj,
				'noIzin' => $noIzin,

				'detailTemuan' => $detailTemuan,
				'pasalPeringatan' => $pasalPeringatan
			);

			$this->load->view('admin/surat_peringatan/surat_kemasan/isiSurat', $data, FALSE);
		}
	}


	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */