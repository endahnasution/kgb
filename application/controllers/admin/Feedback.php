	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Feedback extends CI_Controller {
	// main page


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model("Feedback_model");
			$this->load->model('feedbackCapa');
		}


		public function index()
		{
			$data = konfigurasi('Lihat Feedback','');
			$data['list_feedback']= $this->Feedback_model->getFeedback();
			// $data['jumlah_confirm'] = $this->Feedback_model->getChecklist();
			// foreach ($data['list_feedback']->result() as $row){
   //                echo "<tr>";
   //                echo "<td>".$row->noSuratFeedback."</td>";
   //                echo "<td>".$row->tglFeedback."</td>";
   //                echo "<td>".$row->isiFeedback."</td>";
   //                echo "<td>".$row->file_feedback."</td>";
   //                echo "<td>".$row->closed."</td>";
   //            }
       		 $this->template->load('layouts/admin_template', 'admin/Feedback', $data);
			
		}

		// public function updateClosed(){
		// 	$id = $this->input->post('id');
		// 	$editClosed = $this->input->post('editclosed');

		// 	$this->Feedback_model->updateClosed($id, $editClosed);
		// 	redirect('admin/Feedback');
		// }

		public function editFeedback(){
		$idFeedback = $this->uri->segment(4);
		$data['sarana_tl'] = $this->feedbackCapa->getSaranaTl();
        $data['dataFeedback'] = $this->Feedback_model->getFeedbackId($idFeedback);
		$this->template->load('layouts/admin_template', 'admin/editFeedback', $data);
		
		}
	
		
	

		public function ubahFeedback(){
		    $data = konfigurasi('Pilih Surat Tugas', 'ap');
			$idFeedback = $this->input->post('idFeedback');
       	 	$noFeedback = $this->input->post('noFeedback');
			$tglFeedback = $this->input->post('tglFeedback');
        	$isiFeedback = $this->input->post('isiFeedback');
			$isiFeedback = $this->input->post('isiFeedback');	
			$status = $this->input->post('status');
			$idTl = $this->input->post('idTl');
        	$data = array (
            	'idFeedback' => $idFeedback,
            	'noFeedback' => $noFeedback,
           		'isiFeedback' => $isiFeedback,
           		'tglFeedback' => $tglFeedback,
				   'idTl' => $idTl
        	);

		
        echo $status;
        $this->Feedback_model->updateFeedback($data);
		$this->Feedback_model->updateCapa($status,$idTl);
		redirect('admin/Feedback');
		}


		public function hapus_Feedback(){
			$id = $this->input->post('idFeedback');
			$idTl = $this->input->post('idTl');
			$this->Feedback_model->hapus_SuratFeedback($id,$idTl);
			redirect('admin/Feedback');
			}	
	
		}
	

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */