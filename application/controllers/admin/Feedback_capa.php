<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Feedback_capa extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model("Feedback_capa_model");
		}


		public function index()
		{
			// $data['peringatan'] = $this->Feedback_capa_model->getPeringatan();
       		//  $this->template->load('layouts/admin_template', 'admin/Feedback', $data);
			
		}

	

	}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */