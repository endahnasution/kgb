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
					$latest_spmk= $this->db->select("*")->limit(1)->order_by('idKgb',"DESC")-> where('idPegawai', $userdata->idPegawai) ->get("tbl_kgb")->row();
					if($latest_spmk != null){
						$interval = strtotime($latest_spmk->spmk_baru) - strtotime(date("Y/m/d"));
					$dateline = $interval/60/60/24;

					if($dateline<=60){
						echo '<span class="badge bg-red">1</span>';
					}
					}else{
						echo '<span class="badge bg-red">0</span>';
					}
					

					?>
					
				</a>
				<div ></div>
				<ul id="notifications" class="dropdown-menu">
					
					<?php  

					$latest_spmk= $this->db->select("*")->limit(1)->order_by('idKgb',"DESC")-> where('idPegawai', $userdata->idPegawai) ->get("tbl_kgb")->row();
					if($latest_spmk != null){
						$dateline = $interval/60/60/24;
						if($dateline<=60){ ?>
							<li class="header">Hi, <b><?= $userdata->nama; ?></b> Sudah saatnya mengajukan KGB</li>
							<?php }else{
							?>
							<li class="header">Hi, <b> <?= $userdata->nama; ?> </b>Belum ada notifikasi buat kamu</li>
							<?php
								}
								}else{
									?> <li class="header">Hi, <b> <?= $userdata->nama; ?> </b>Belum ada notifikasi buat kamu</li>
									<?php
								}?>
					
					
					
					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu">
							<li >
								<?php

								$query = $this->db->select("*")->limit(1)->order_by('idKgb',"DESC")-> where('idPegawai', $userdata->idPegawai) ->get("tbl_kgb");

								?>

								<?php

								$latest_spmk= $this->db->select("*")->limit(1)->order_by('idKgb',"DESC")-> where('idPegawai', $userdata->idPegawai) ->get("tbl_kgb")->row();

								if($latest_spmk != null){
									$dateline = $interval/60/60/24;
									if($dateline<=60) {
										foreach ($query->result() as $row) {
	
											?>
											<li>
											<a href="<?php echo base_url('petugas/kgb/tambah_kgb/'.$userdata->idPegawai) ?>">Buat disini</i>
											
											
											</a>
											</li>
											<?php
										}
									} else {
										echo "<li>no record found</li>";
									}
								}

								

								?>

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