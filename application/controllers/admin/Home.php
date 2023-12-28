    <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Home extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('Pengajuan_model');
        

            $this->check_login();
            if ($this->session->userdata('id_role') != "1") {
                redirect('', 'refresh');
            }
        }

        public function index()
        {
            
            $data = konfigurasi('Dashboard');
            
        

         $data['pengajuan'] = $this->Pengajuan_model->countPengajuanBaru();
         $data['selesai'] = $this->Pengajuan_model->countPengajuanSelesai();

                

         $this->template->load('layouts/admin_template', 'admin/dashboard', $data);
     }
    }
