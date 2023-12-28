<!DOCTYPE html>
<html lang="en">
<head>
	<title>login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('login_assets/images/icons/favicon.ico');?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login_assets/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login_assets/vendor/animate/animate.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login_assets/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login_assets//vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login_assets/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('login_assets/css/main.css');?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
		<div id="center">
      <h2>Registrasi Akun Dulu Ya</h2>
      <?php echo form_open('auth/check_register','') ;?>
	  <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<?php echo form_error('username','<div class="text-danger">','</div>') ;?>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="fullname" placeholder="Fullname (Dengan Gelar)" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<?php echo form_error('fullname','<div class="text-danger">','</div>') ;?>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="number" name="nip" placeholder="NIP" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card	" aria-hidden="true"></i>
						</span>
						<?php echo form_error('nip','<div class="text-danger">','</div>') ;?>
					</div>

					<div class="wrap-input100 validate-input" >
						<select class="input100" type="number" name="substansi" class="form-control" placeholder="Pilih Substansi" required>
						<option>Pilih Substansi</option>
						<option value="pemeriksaan">Substansi Pemeriksaan</option>
						<option value="penindakan">Substansi Penindakan</option>
						<option value="infokom">Substansi Infokom</option>
						<option value="tatausaha">Substansi Tata Usaha</option>
						<option value="pengujian">Substansi Pengujian</option>
						</select>	
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
						<?php echo form_error('nip','<div class="text-danger">','</div>') ;?>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						<?php echo form_error('password','<div class="text-danger">','</div>') ;?>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="repassword" placeholder="Retype Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
        
					<div class="container-login100-form-btn ">
						<button type="submit" name="submit" value="login" class="login100-form-btn">
							Register
						</button>
						<?php echo form_close() ;?>
					</div>

					<div class="container-login100-form-btn mb-5">
					<a href="<?php echo base_url('auth/login') ;?>" class="text-center">Has registered ? Let's Login</a>
					</div>

					
					
      </form>
    </div>
			<!-- <div class="wrap-login100" >
				<div class="judul">
				<h2 class="title" >Registrasi Akun </h2>
				<br>
				<h2 class="title">( E-SATUPINTU )</h2>
				</div>
				


				<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login" class="login100-form validate-form" action="<?php echo base_url('auth/login'); ?>" method="post">

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
						
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" value="login" class="login100-form-btn">
							Login
						</button>
						<a href="<?php echo base_url('auth/create'); ?>" class="mt-2">New User? Create an Account!</a>
						<a href="" class="mt-1">Forgot password? </a>
					</div>
					
					<div id="myalert">
						<?php echo $this->session->flashdata('alert', true); ?>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
						
							<i class="" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div> -->
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url('login_assets/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('login_assets/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?php echo base_url('login_assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('login_assets/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('login_assets/vendor/tilt/tilt.jquery.min.js');?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('login_assets/js/main.js');?>"></script>

</body>
<style>
h1, h2, h3, h4, h5, h6 {
    margin-left: 100px;
    text-align: center;
    color: #001ba3;
    -webkit-text-stroke: medium;
}
.login100-form {
    width: 270px;
    padding-top: 145px;
}
.login100-pic img {
    max-width: 100%;
    padding-top: 95px;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    margin-top: 40px;
}
</style>

</html>