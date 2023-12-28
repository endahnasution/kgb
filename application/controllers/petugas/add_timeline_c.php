<?php

defined('BASEPATH') or exit('No direct script access allowed');

class add_timeline_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('add_timeline_m');

        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $this->template->load('layouts/petugas_template', 'petugas/add_timeline_v');
    }
    public function add()
    {
        $this->load->model('add_timeline_m');
        
        $post_no_surat = $this->input->post('no_surat');
        $data = array
        (
            'no_surat'          =>$this->input->post('no_surat'),
            'sarana'            =>$this->input->post('sarana'),
            'tgl_surat'         =>$this->input->post('tgl_surat'),
            'tanggal_timeline'  =>$this->input->post('tanggal_timeline'),
            'created_date'      =>$this->input->post('created_date')
            
        );
        $checkvalidation = $this->add_timeline_m->checkDuplicate($post_no_surat);
            if($checkvalidation == true){
                $this->db->insert('notif',$data);
                $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
                redirect('petugas/add_timeline_c', 'refresh');
            }else{
            $this->session->set_flashdata('failed', 'Data Duplikat');
            redirect('petugas/add_timeline_c', 'refresh');
            }
     
        
    }
}
       