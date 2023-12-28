<?php

defined('BASEPATH') or exit('No direct script access allowed');

class add_timeline_m extends CI_Model
{
  private $_table   = 'notif';
  
  public $no_surat;
  public $sarana;
  public $tgl_surat;
  public $tanggal_timeline;

  function __construct()
  {
      parent::__construct();
  }
  
  public function checkDuplicate($no_surat)
  {
      $this->db->where('no_surat',$no_surat);
      $query = $this->db->get('notif');
      $count_row = $query->num_rows();
      if ($count_row > 0){
          return false;
      }
      else{
          return true;
      }
  }  
  }
  