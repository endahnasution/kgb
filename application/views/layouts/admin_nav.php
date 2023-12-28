<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>

	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<!-- Notifications: style can be found in dropdown.less -->
			<li class="dropdown notifications-menu">
				<a id="noti_Button" href="" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bell-o"></i>
					<?php
					$latest_spmk= $this->db->select("*")->order_by('idKgb',"DESC")-> where('status_kgb', 'pengajuan') ->get("tbl_kgb")->num_rows();
					
					?>
					
					<span class="badge bg-red"><?=$latest_spmk ?></span>
				
				</a>
				<div ></div>
				<ul id="notifications" class="dropdown-menu">
					<li class="header"><a href="<?php echo base_url('admin/pengajuan/') ?>">Terdapat <b><?php echo $latest_spmk ?></b> Pengajuan KGB </li></a>
					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu">
							<li >
								
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<!-- Tasks: style can be found in dropdown.less -->

			<!-- User Account: style can be found in dropdown.less -->
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/uploads/images/foto_profil/'.$userdata->photo); ?>" class="user-image">
                <span class="hidden-xs"><?= $userdata->nama; ?> </span>
            </a>
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header">
						<img src="<?= base_url('assets/uploads/images/foto_profil/'.$userdata->photo); ?>" class="img-circle">
						<p>
							Hi, <?= $userdata->nama; ?>
							<small>Terakhir Masuk , <?= $userdata->last_login; ?></small>
						</p>
					</li>
					<!-- Menu Footer-->
					<li class="user-footer">
						<div class="pull-left">
							<a href="<?php echo base_url() ?>auth/profile" class="btn btn-default btn-flat"><i class="fa fa-user" aria-hidden="true"></i> Profil</a>
						</div>
						<div class="pull-right">
							<a href="<?php echo base_url() ?>auth/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
						</div>
					</li>
				</ul>
			</li>
			<!-- Control Sidebar Toggle Button -->
		</ul>
	</div>
</nav>
<style>
	.skin-blue .main-header .navbar {
		background-color: #00537d;
	}
</style>