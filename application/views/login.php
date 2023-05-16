<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laundry Apps - Login</title>
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
			background: #00c6ff;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #0072ff, #00c6ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

			/*width: auto;*/
			/*height: auto;*/
			/*background-position: center;*/
			/*background-repeat: no-repeat;*/
			/*background-size: cover;*/
			display: block;
	width: 100%;
	overflow-x: auto;			
		}

		@media screen and (max-width: 320px) {
			.bg-image{
				background: #00c6ff;  /* fallback for old browsers */
				background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);  /* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(to right, #0072ff, #00c6ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				/*background-repeat: no-repeat;
				background-size: cover;*/
			}
		}
	</style>
</head>
<body class="bg-image">
	<div>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<!-- <div class="alert alert-danger fade in"> -->
				<?= $this->session->flashdata('message'); ?>
              <!-- </div> -->
		</div>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

			<div class="login-panel panel panel-default">
				<div class="panel-heading text-center">
					<img src="<?= site_url('assets/img/laundry logo.png')?>" width="32px" height="32px" style="float:left;">
					BUBLE <label class="text-primary">LAUNDRY</label>
				</div>
				<div class="panel-body">
					<form action="<?= site_url('Auth/login') ?>" method="POST" role="form">
						<fieldset>
							<div class="form-group">
								<label>USERNAME</label>
								<input class="form-control" placeholder="Username" name="username" type="username" autofocus="" value="<?= set_value('username') ?>">
		                     	<?= form_error('username', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<label>PASSWORD</label>
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
		                     	<?= form_error('password', '<div class="text-danger">', '</div>') ?>
							</div>
							<!-- Belum punya akun? <a href="<?= site_url('Auth/register') ?>" class="text-danger">Daftar disini</a> -->
							<hr>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							<button type="submit" class="btn btn-primary btn-block">LOGIN</button>
						</fieldset>
					</form>

				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

	<script src="<?= site_url('assets/') ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?= site_url('assets/') ?>custom_js/alert.js"></script>
	<script src="<?= site_url('assets/') ?>js/bootstrap.min.js"></script>
	<script>
		history.forward(0);
	</script>
</body>
</html>
