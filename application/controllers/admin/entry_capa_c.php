<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Entry_capa_c extends CI_Controller {
	// main page


		public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('feedbackCapa');
    }


		function index()
		{
		    $data = konfigurasi('Pilih Surat Tugas', 'ap');
        	$data['sarana_tl'] = $this->feedbackCapa->getSaranaTl();
            $this->template->load('layouts/admin_template', 'admin/entry_capa_v', $data);
		}

		function getSarana(){
		
			if($this->input->post('idPer'))
			{
				echo $this->feedbackCapa->getSaranaModel($this->input->post('idPer'));
			}
		}

		function add_data(){
		    $data = konfigurasi('Pilih Surat Tugas', 'ap');
			$idTl =  $this->input->post('idTl');
			$noFeedback =  $this->input->post('noFeedback');
			$tanggal =  $this->input->post('tanggal');
			$perihalFeedback =  $this->input->post('perihalFeedback');


			// $config['upload_path'] = './assets/uploads/files/feedback';
			// $config['allowed_types'] = '*';
			// $config['file_name'] = 'feedback-'.$noFeedback;
			// $config['overwrite'] = true;
			// $config['max_size'] = 0;
		

			// $this->load->library("upload",$config);
			// $this->upload->initialize($config);


			// if(!$this->upload->do_upload('fileFeedback')){
			// 	echo $this->upload->display_errors();
			// }else{
			// 	$fd=$this->upload->data();
			// 	$file=$fd['file_name'];

			$data = array(
				'noFeedback' => $noFeedback,
				'tglFeedback' => $tanggal,
				'isiFeedback' => $perihalFeedback,
				'idTl' => $idTl
			);

			$this->db->insert('tbl_feedback',$data);

			redirect('/admin/Feedback', 'refresh');


		}

	}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */