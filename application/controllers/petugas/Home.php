<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
         $this->load->model('Master_model');
         $this->load->model('Feedback_model');
        
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        
        $data = konfigurasi('Dashboard');

    
         date_default_timezone_set("Asia/Jakarta");
         $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);


         $data['list_capa'] = $this->Feedback_model->getFeedbackDashboard();
         $tanggal_capa = $this->Feedback_model->getFeedbackDashboard();
         $aktif = 0;
         $tenggang= 0;
         $expired = 0;
         foreach($tanggal_capa->result() as $row){
            // $awal = date_('d-m-Y', $row->tglFeedback);
            // $awal = date_format($awal, 'Y-m-d');
            $awal = strtotime($row->tglFeedback);
 
            $akhir = date('Y-m-d');
            // $akhir = date_format($akhir, 'Y-m-d');
            $akhir = strtotime($akhir);

            $jumlah=0;

            for ($i=$awal; $i<= $akhir; $i += (60 * 60 * 24)) {
                // echo date("D",$i). " -->". date("Y-m-d",$i)." ";
                if(isset($array[date("Ymd",$i)])):		
                    $jumlah+=0;
                   
                elseif (date("D",$i)==="Sun" or date("D",$i)==="Sat") :
                    $jumlah+=0;
                    
                else 
                : $jumlah+=1;
                endif;
               
            }

            if(20-$jumlah >6){
                $aktif++;
            }else if (20-$jumlah < 6 and 20-$jumlah >=1){
                $tenggang++;
            }else{
                $expired++;
            }

            

         }

         $data['aktif'] = $aktif;
         $data['tenggang'] = $tenggang;
         $data['expired'] = $expired;
         $data['jumlah_capa'] = count($this->Feedback_model->getFeedbackDashboard()->result());
     
         // print_r($data['prod_kos_kota');
                
        
        $this->template->load('layouts/petugas_template', 'petugas/dashboard', $data);
    }
}
