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

    <!-- search form (Optional) -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

      
      <li class="treeview" style="height: auto;">
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Pengajuan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          
          <li><a href="<?php echo base_url('admin/pengajuan/pengajuan_baru') ?>"><i class="fa fa-circle-o"></i>Pengajuan Baru</a></li>
          <li><a href="<?php echo base_url('admin/pengajuan') ?>"><i class="fa fa-circle-o"></i>Pengajuan Selesai</a></li>
      
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          
          <li><a href="<?php echo base_url('admin/master/data_pegawai') ?>"><i class="fa fa-circle-o"></i>Pegawai</a></li>
        </ul>
      </li>

      <!-- <li class="active"><a href="<?php echo base_url('admin/surat_perjadin/surat_perjadin') ?>"><i class="fa fa-plane"></i> <span>Surat Perjalanan Dinas</span></a></li> -->

      <!-- <li class="treeview" style="height: auto;">
        <a href="#">
          <i class="fa fa-money"></i> <span>Pertanggung Jawaban</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="<?php echo base_url('admin/surat_pj') ?>"><i class="fa fa-circle-o"></i>Surat PJ</a></li>
          <li><a href="<?php echo base_url('admin/surat_pj/list_nominatif') ?>"><i class="fa fa-circle-o"></i>Nominatif</a></li>
        </ul>
      </li> -->

      <!--<li class="treeview" style="height: auto;">-->
      <!--  <a href="#">-->
      <!--    <i class="fa fa-share"></i> <span>Tindak Lanjut</span>-->
      <!--    <span class="pull-right-container">-->
      <!--      <i class="fa fa-angle-left pull-right"></i>-->
      <!--    </span>-->
      <!--  </a>-->
      <!--  <ul class="treeview-menu" style="display: none;">-->
      <!--    <li><a href="<?= base_url('admin/surat_peringatan/c_surat_peringatan') ?>"><i class="fa fa-circle-o"></i>List Tindak Lanjut</a></li>-->
      <!--    <li><a href="<?= base_url('admin/surat_capa') ?>"><i class="fa fa-circle-o"></i>List CAPA Petugas</a></li>-->
      <!--  </ul>-->
      <!--</li>-->


      <!--<li class="active"><a href="<?php echo base_url('admin/Feedback') ?>"><i class="fa fa-share"></i> <span>Feedback CAPA</span></a></li>-->

      <!-- <li class="treeview" style="height: auto;">
        <a href="#">
          <i class="fa fa-caret-square-o-down"></i> <span>Tarik Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a> -->




        <ul class="treeview-menu" style="display: none;">
<li><a href="<?php echo base_url('admin/eksporDataAdmin/surat') ?>"><i class="fa fa-circle-o"></i>Surat Tugas</a></li>
          <li><a href="<?php echo base_url('admin/eksporDataAdmin/anggaran') ?>"><i class="fa fa-circle-o"></i>Realisasi Anggaran</a></li>
          <li><a href="<?php echo base_url('admin/eksporDataAdmin/subpemeriksaan') ?>"><i class="fa fa-circle-o"></i>Hasil Pemeriksaan</a></li>
          <li><a href="<?php echo base_url('admin/eksporDataAdmin/tarikDetailAnggaran') ?>"><i class="fa fa-circle-o"></i>Rekap keuangan</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>