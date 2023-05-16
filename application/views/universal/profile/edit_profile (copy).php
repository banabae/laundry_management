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

<div class="row">
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
</div><!--/.row-->

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body bg-primary">
				<div class="col-md-12">
					<h5>* Ini adalah Photo Profile sebelumnya...</h5>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<img src="<?= site_url('assets/img/profile/').$getProfile->photo_profile ?>" alt="" class="img-rounded img-responsive center-block"><br>
					<div class="form-group">
						<label class="text-center">Klik tombol dibawah untuk mengganti Photo Profile</label>
						<input type="file">
						<!-- <p class="help-block">Example block-level help text here.</p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<form action="#" method="POST" role="form">
						<div class="form-group">
							<label>Nama lengkap</label>
							<input type="text" class="form-control" placeholder="contoh : Alexander antonio del calsius">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" placeholder="contoh : Contoh@email.com">
						</div>
						<div class="form-group">
							<label>No Handphone/Telp</label>
							<input type="text" class="form-control" placeholder="contoh : 08xx xxxx xxxx">
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="date" class="form-control">
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
							<select class="form-control">
								<option>Pilih Jabatan</option>
								<option value="">Option 1</option>
								<option value="">Option 2</option>
								<option value="">Option 3</option>
								<option value="">Option 4</option>
							</select>
						</div><hr>
						<div class="pull-right">
							<a href="<?= site_url('Admin/Profile') ?>" class="btn btn-toolbar">Batalkan</a>
							<button type="submit" class="btn btn-primary">Simpan Data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->