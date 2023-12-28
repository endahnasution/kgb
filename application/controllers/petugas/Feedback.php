	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Feedback extends CI_Controller {
	// main page


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model("Feedback_model");
		}


		public function index()
		{
			$data = konfigurasi('Lihat Feedback','');
			$data['list_feedback']= $this->Feedback_model->getFeedback();
			$data['jumlah_confirm'] = $this->Feedback_model->getChecklist();
			
       		 $this->template->load('layouts/petugas_template', 'petugas/feedback', $data);
			
		}

		public function updateClosed(){
			$id = $this->input->post('id');
			$editClosed = $this->input->post('editclosed');

			$idSarana = $this->Feedback_model->getSarana($id);
			foreach($idSarana as $row){
				$idSarana =$row;
			}
			echo $idSarana;

			$this->Feedback_model->isMk($idSarana, $editClosed);
			$this->Feedback_model->updateClosed($id, $editClosed);
			redirect('petugas/feedback');
		}
		
	

	}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */