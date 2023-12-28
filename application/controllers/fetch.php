<?php

defined('BASEPATH') or exit('No direct script access allowed');

class fetch extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        

        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $this->template->load('layouts/petugas_template', 'petugas/dashboard');
    }
    public function fetch_notif()
    {
        
        if(isset($_POST['view'])){

            // $con = mysqli_connect("localhost", "root", "", "notif");
            
            if($_POST["view"] != '')
            {
                $sql = "UPDATE notif SET stat_notif = 1 WHERE stat_notif = 0";
                $this->db->query($sql);
            }
                $select = "SELECT * FROM notif ORDER BY no_surat DESC LIMIT 5";
                $query = $this->db->query($select);
                
                $output = '';
                if($query->num_rows() > 0)
                {
                    $result = $query->result(); //or $query->result_array() to get an array
                    foreach( $result as $row )
                {
                    $output .= '
                    <li>
                    <a href="#">
                    <strong>'.$row["no_surat"].'</strong><br />
                    <small><em>'.$row["sarana"].'</em></small>
                    </a>
                    </li>
                    ';
                
                }
                }
                else{
                    $output .= '
                    <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
            }
            
            
            
            $status_query = "SELECT * FROM notif WHERE stat_notif=0";
            $result_query = $this->db->query($status_query);
            $count = $result_query->num_rows();
            $data = array(
                'notification' => $output,
                'unseen_notification'  => $count
            );
            
            echo json_encode($data);
            
            }
        
    }
}