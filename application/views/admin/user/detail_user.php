<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Detail User</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Detail User
			<div style="float:right" class="center-block">
				<!-- <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Download Report">
					<em class="fa fa-download"></em>
				</a> -->
				<a href="<?= site_url('Admin/User') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Kembali">
					<em class="fa fa-arrow-left"></em> Kembali
				</a>
			</div>
		</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<!-- <div class="col-md-4"></div> -->
	<div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default">
		</div>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<img src="<?= site_url('uploads/img/profile/').$getDataUser->photo_profile ?>" alt="" class="img-rounded img-responsive center-block">
				</div>
			</div>
		</div>
		<!-- <div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<label class="text-center center-block">Ganti password? <a href="<?= site_url('Profile/editPassword/').$getDataUser->id ?>">Klik disini</a></label>
				</div>
			</div>
		</div> -->
	</div>
	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<h2 class="text-primary text-center"><?= strtoupper($getDataUser->nama) ?></h2>
					<h3 class="text-warning text-center"><?= strtoupper($getDataUser->role) ?></h3>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<h5>Cabang Outlet</h5>
						</div>
						<div class="col-md-6">
							<h5 class="text-danger"><?= $getDataUser->nama_outlet ?></h5>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<h5>Tanggal Lahir</h5>
						</div>
						<div class="col-md-6">
							<h5><?= $this->lps->getTanggalLahir($getDataUser->tgl_lahir) ?></h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<h5>Jenis Kelamin</h5>
						</div>
						<div class="col-md-6">
							<h5>
							<?php
								if ($getDataUser->jenis_kelamin == 'L') {
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
							<h5><?= $getDataUser->email ?></h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<h5>No Handphone/Telp</h5>
						</div>
						<div class="col-md-6">
							<h5><?= $this->lps->getNoHp($getDataUser->tlp) ?></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->
