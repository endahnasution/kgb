<section class="content">
  <div class="row">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>Hi <?= $userdata->nama; ?> , Selamat Datang di Aplikasi E-KGB BPOM Batam!</h4>
      Elektronik Monitoring dan Pembuatan Surat KGB
      <br>
      <br>
      <?php
					$latest_spmk= $this->db->select("*")->limit(1)->order_by('idKgb',"DESC")-> where('idPegawai', $userdata->idPegawai) ->get("tbl_kgb")->row();
					if($latest_spmk != null){
						$interval = strtotime($latest_spmk->spmk_baru) - strtotime(date("Y/m/d"));
					$dateline = $interval/60/60/24;
          if($dateline<=60){
            echo "<h4> Sudah saatnya mengajukan KGB";
            ?>
            <a href="<?php echo base_url('petugas/kgb/tambah_kgb/'.$userdata->idPegawai) ?>">Buat disini</i>
            <?php
    
          }else{
            ?>
            <h4>Masih ada <?=$dateline?> hari lagi untuk mengajukan KGB</h4>
            <?php
          }

					
          }
					

					?>
    </div>


   
    
   
  
    <!-- /.row -->

    <!-- /.row -->
    
<style>
  th.dt-center,
  td.dt-center {
    text-align: center;
  }
</style>
</section>
<style>
  .chart1 {
    height: 0px;
  }

  .mid {
    margin: auto;
    width: 17%;
  }
  .mid {
    margin: auto;
    width: 17%;
  }
  .label-closed {
    background-color: #2ec4b6;
  }
  .label-open {
    background-color: #0f4c5c;
  }
</style>