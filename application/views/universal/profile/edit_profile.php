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
		<h1 class="page-header">Edit Profile</h1>
	</div>
</div><!--/.row-->

<!-- <div class="row"> -->
	<!-- <div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default shadow">
			<div class="panel-body text-center bg-danger">
				<h5 style="color : white;">Jam <em id="jam"></em> : <em id="menit"></em> : <em id="detik"></em></h5>
			</div>
		</div>
	</div> -->
	<!-- <div class="col-md-9">
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
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body bg-primary">
				<div class="col-md-12">
					<h5>* Ini adalah Photo Profile sebelumnya...</h5>
				</div>
			</div>
		</div>
      <?= form_open_multipart('Profile/ubah_profile') ?>
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<img src="<?= site_url('uploads/img/profile/').$getProfile->photo_profile ?>" alt="" class="img-rounded img-responsive center-block"><br>
					<div class="form-group">
						<label class="text-center">Klik tombol dibawah untuk mengganti Photo Profile</label>
						<input name="photo_profile" type="file" class="form-control">
						<!-- <p class="help-block">Example block-level help text here.</p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<input name="id_user" type="hidden" value="<?= $getProfile->id ?>">
					<div class="form-group">
						<label>Nama lengkap</label>
						<input name="nama" type="text" class="form-control" placeholder="contoh : Alexander antonio del calsius" value="<?= $getProfile->nama ?>">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input name="username" type="text" class="form-control" placeholder="contoh : Alexander" value="<?= $getProfile->username ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="email" type="email" class="form-control" placeholder="contoh : Alexander@gmail.com" value="<?= $getProfile->email ?>">
					</div>
					<div class="form-group">
						<label>No Handphone/Telp</label>
						<input name="tlp" type="text" class="form-control" placeholder="contoh : 08xx xxxx xxxx" value="<?= $getProfile->tlp ?>">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<div class="row">
							<div class="col-md-2">
								<select name="tgl" id="" class="form-control">
									<option value="<?= $tgl ?>"><?= $tgl ?></option>
									<?php
										for ($i=1; $i <= 32; $i++) { 
									?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php
										}
									?>
								</select>
							</div>
							<div class="col-md-2">
								<select name="bln" id="" class="form-control">
									<option value="<?= $bulan ?>"><?= $bulan ?></option>
									<?php
										for ($i=1; $i <= 12; $i++) { 
									?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php
										}
									?>
								</select>
							</div>
							<div class="col-md-2">
								<select name="thn" id="" class="form-control">
									<option value="<?= $tahun ?>"><?= $tahun ?></option>
									<?php
										for ($i=1950; $i <= 2020; $i++) { 
									?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<div class="radio">
							<label>
								<input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L" checked>Laki-laki
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P">Perempuan
							</label>
						</div>
					</div>
					<div class="form-group">
						<label>Jabatan</label>
						<input name="role" type="text" class="form-control" value="<?= $getProfile->role ?>" readonly>
						<!-- <select name="role" class="form-control">
							<option value="<?= $getProfile->role ?>"><?= $getProfile->role ?></option>
							<option value="kasir">Kasir</option>
							<option value="owner">Owner</option>
						</select> -->
					</div>
					<hr>
					<div class="pull-right">
						<a href="<?= site_url('Profile') ?>" class="btn btn-toolbar">Batalkan</a>
						<button type="submit" class="btn btn-primary">Simpan Data</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->