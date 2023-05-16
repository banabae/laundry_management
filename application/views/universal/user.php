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
		<h1 class="page-header">My Profile</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<!-- <div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default">
			<div class="panel-body text-center bg-danger">
				<h5 style="color : white;">Jam <em id="jam"></em> : <em id="menit"></em> : <em id="detik"></em></h5>
			</div>
		</div>
	</div> -->
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body bg-primary">
				<h5>Welcome Back Sir!</h5>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<div class="col-md-12">
					<h5>
						<label class="text-center center-block">Ganti password? <a href="<?= site_url('Profile/editPassword/').$getProfile->id ?>">Klik disini</a></label>
					</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<a href="<?= site_url('Profile/editProfile/').$getProfile->id ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Profile">
					<em class="fa fa-edit"></em>
				</a>
				<a href="#" onclick="location.reload();" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Refresh Page">
					<em class="fa fa-refresh"></em>
				</a>
			</div>
		</div>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<img src="<?= site_url('uploads/img/profile/').$getProfile->photo_profile ?>" alt="" class="img-rounded img-responsive center-block">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<h2 class="text-primary text-center"><?= strtoupper($getProfile->nama) ?></h2>
					<h3 class="text-warning text-center"><?= strtoupper($getProfile->role) ?></h3>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<h5>Cabang Outlet</h5>
						</div>
						<div class="col-md-6">
							<h5 class="text-danger"><?= $getOutlet->nama_outlet ?></h5>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<h5>Tanggal Lahir</h5>
						</div>
						<div class="col-md-6">
							<h5><?= $getTanggalLahir ?></h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<h5>Jenis Kelamin</h5>
						</div>
						<div class="col-md-6">
							<h5>
							<?php
								if ($getProfile->jenis_kelamin == 'L') {
									echo "Laki-laki";
								} else{
									echo "Perempuan";
								}
							?>	
							</h5>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<h5>Email</h5>
						</div>
						<div class="col-md-6">
							<h5><?= $getProfile->email ?></h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<h5>No Handphone/Telp</h5>
						</div>
						<div class="col-md-6">
							<h5><?= $getNoHp ?></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->
