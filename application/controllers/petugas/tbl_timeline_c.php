<?php

defined('BASEPATH') or exit('No direct script access allowed');

class tbl_timeline_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('tbl_timeline_m');
        
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
         $data = konfigurasi('Dashboard');
            
        $data['timeline']= $this->tbl_timeline_m->tampil_timeline();
        
        $this->template->load('layouts/petugas_template', 'petugas/tbl_timeline_v', $data);
    }
}