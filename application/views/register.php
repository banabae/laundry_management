<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NamaAplikasi - Register</title>
	<link href="<?= site_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>css/datepicker3.css" rel="stylesheet">
	<link href="<?= site_url('assets/') ?>css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		.bg-image{
			background-image: url(<?= site_url('assets/img/bg.jpg') ?>);
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body class="bg-image">
	<div class="row">
		<div class="col-xs-5 col-xs-offset-0 col-sm-0 col-sm-offset-1 col-md-6 col-md-offset-3">
			<div class="login-panel panel panel-default">
				<div class="panel-heading text-center">
					<label class="text-primary">Form Register</label>
				</div>
				<div class="panel-body">
					<?= $this->session->flashdata('message'); ?>
					<form action="<?= site_url('Auth/register') ?>" method="POST">
						<fieldset>
							<div class="form-group">
								<label>Nama lengkap</label>
								<input name="fullname" type="text" class="form-control" placeholder="contoh : Alexander antonio del calsius" value="<?= set_value('fullname') ?>">
		                     	<?= form_error('fullname', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input name="email" type="email" class="form-control" placeholder="contoh : Contoh@email.com" value="<?= set_value('email') ?>">
		                     	<?= form_error('email', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<div class="radio">
									<label>
										<input type="radio" name="jk" id="jk1" value="1" checked>Laki-laki
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="jk" id="jk2" value="2">Perempuan
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Jabatan</label>
								<select name="jabatan" class="form-control">
									<option>Pilih Jabatan</option>
									<option value="1">Option 1</option>
									<option value="2">Option 2</option>
									<option value="3">Option 3</option>
									<option value="4">Option 4</option>
								</select>
		                     	<?= form_error('jabatan', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>Password </label>
								<input name="password" type="password" class="form-control" placeholder="********">
		                     	<?= form_error('password', '<div class="text-danger">', '</div>') ?>
							</div>
						<!-- 	<div class="form-group">
								<label>Ulangi Password</label> <div class="btn"></div>
								<input name="password2" type="password" class="form-control" placeholder="********">
							</div> -->
							<br>
							Sudah punya akun? <a href="<?= site_url('Auth/login') ?>" class="text-info">Login</a>
							<hr>
							<button type="submit" class="btn btn-primary btn-block">Register</button><br>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

	<script src="<?= site_url('assets/') ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?= site_url('assets/') ?>js/bootstrap.min.js"></script>
</body>
</html>