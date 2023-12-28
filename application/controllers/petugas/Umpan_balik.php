	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Umpan_balik extends CI_Controller {
	// main page


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model("UmpanBalik_model");
		}


		public function index()
		{
			$data = konfigurasi('Lihat Umpan Balik','');
			$data['sarana'] = $this->UmpanBalik_model->getSarana();
        $this->template->load('layouts/petugas_template', 'petugas/umpan_balik', $data);
			
		}

		public function getSarana()
		{
			if($this->input->post('idPer'))
			{
				echo $this->UmpanBalik_model->getSaranaFeedback($this->input->post('idPer'));
			}
			
			
		}
		
		public function tracking()
		{
		     $data = konfigurasi('Dashboard');
            

			$idSuratTugas =$this->input->post('idSurat');
			$idSarana =$this->input->post('sarana');


			$data['tracking_result']= $this->UmpanBalik_model->getHistory($idSuratTugas, $idSarana);

			$this->template->load('layouts/petugas_template', 'petugas/umpan_balik_data', $data);




		}

	}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */