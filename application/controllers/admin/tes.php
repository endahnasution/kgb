<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
     
        $this->template->load('layouts/admin_template', 'admin/tes');
    }
}
