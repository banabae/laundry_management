<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Profile</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit Password</h1>
	</div>
</div><!--/.row-->

<!-- <div class="row">
	<div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default">
			<div class="panel-body text-center bg-danger">
				<h5 style="color : white;">Jam <em id="jam"></em> : <em id="menit"></em> : <em id="detik"></em></h5>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">

		</div>
	</div>
	<div class="col-md-1 col-lg-offset-0 text-center">
		<div class="panel panel-default">
			<div class="panel-body bg-primary">
				<a href="#" onclick="location.reload();" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Refresh Page">
					<em class="fa fa-refresh"></em>
				</a>
			</div>
		</div>
	</div>
</div> --><!--/.row-->

<div class="row">
	<div class="col-md-5">
	<?= $this->session->flashdata('message'); ?>
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
				<form action="<?= site_url('Profile/ubahPassword') ?>" method="POST">
					<input name="id_user" type="hidden" value="<?= $getProfile->id ?>">
					<div class="form-group">
						<label>Password Lama</label>
						<input name="old_password" type="password" class="form-control" placeholder="********" required >
					</div>
					<div class="form-group">
						<label>Password Baru</label>
						<input name="new_password" type="password" class="form-control" placeholder="********" required>
					</div>
					<div class="form-group">
						<label>Ulangi Password Baru</label>
						<input name="retype_new_password" type="password" class="form-control" placeholder="********" required>
					</div>
					<hr>
					<div class="pull-right">
						<a href="<?= site_url('Profile') ?>" class="btn btn-toolbar">Kembali</a>
						<button type="submit" class="btn btn-primary">Simpan Data</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->