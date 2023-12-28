<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      <img src="<?php echo base_url('assets/uploads/images/foto_profil/' . $userdata->photo); ?>" class="img-circle">
      </div>
      <div class="pull-left info">
        <p><?= $userdata->nama; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

 
   
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <!--  -->
        <!-- <li><a href="<?php echo base_url('petugas/surat_tugas/surat_tugas/surat_tugas_tu') ?>"><i class="fa fa-circle-o"></i>Surat Tugas</a></li> -->
        <!-- <li><a href="<?php echo base_url('petugas/kgb/index/'.$userdata->idPegawai) ?>"><i class="fa fa-circle-o"></i>Informasi KGB</a></li> -->
         <li><a href="<?php echo base_url('petugas/kgb/list_kgb/'.$userdata->idPegawai) ?>"><i class="fa fa-circle-o"></i>List Pengajuan KGB</a></li>
       

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>