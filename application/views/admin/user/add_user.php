<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Tambah User</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tambah User</h1>
		<?= $this->session->flashdata('message'); ?>
	</div>
</div><!--/.row-->


<div class="row">
	
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body text-center bg-success">
				<h5 style="color : white;">Tanggal <?= date("d-m-Y") ?></h5>
				<!-- <h5 style="color : white;">Jam <em id="jam"></em> : <em id="menit"></em> : <em id="detik"></em></h5> -->

			</div>
		</div>
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<!-- <h5></h5> -->
				<ol>Cara Tambah user :
					<li>Masukkan nama lengkap,</li>
					<li>Masukkan username yang mudah diingat,</li>
					<li>Masukkan email,</li>
					<li>Masukkan no handphone yang aktif agar mudah dihubungi,</li>
					<li>Masukkan tanggal lahir</li>
					<li>Masukkan jenis kelamin</li>
					<li>Masukkan jabatan</li>
					<li>Masukkan tempat kerja</li>
					<li>Masukkan password</li>
					<li>Klik tombol Simpan jika data dirasa sudah benar.</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<?= form_open_multipart('Admin/User/tambah_user') ?>
						<div class="form-group">
							<label>Nama lengkap</label>
							<input name="nama" type="text" class="form-control" placeholder="contoh : Alexander antonio del calsius">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input name="username" type="text" class="form-control" placeholder="contoh : Alexander">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input name="email" type="email" class="form-control" placeholder="contoh : Contoh@email.com">
						</div>
						<div class="form-group">
							<label>No Hp.</label>
							<input name="tlp" type="text" class="form-control" placeholder="contoh : 08xx xxxx xxxx">
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<div class="row">
								<div class="col-md-2">
									<select name="tgl" id="" class="form-control">
										<!-- <option value="<?= $tgl ?>"><?= $tgl ?></option> -->
										<option value="">Tgl</option>
										<?php
											for ($i=1; $i <= 31; $i++) { 
										?>
											<option value="<?= $i ?>"><?= $i ?></option>
										<?php
											}
										?>
									</select>
								</div>
								<div class="col-md-2">
									<select name="bln" id="" class="form-control">
										<!-- <option value="<?= $bulan ?>"><?= $bulan ?></option> -->
										<option value="">Bulan</option>
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
										<!-- <option value="<?= $tahun ?>"><?= $tahun ?></option> -->
										<option value="">Tahun</option>
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
							<select name="jk" id="" class="form-control">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
							<!-- <div class="radio">
								<label>
									<input type="radio" name="jk" id="jk1" value="laki-laki">Laki-laki
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="jk" id="jk2" value="perempuan">Perempuan
								</label>
							</div> -->
						</div>
						<div class="form-group">
							<label>Jabatan</label>
							<select name="jabatan" class="form-control">
								<option>Pilih Jabatan</option>
								<option value="admin">Admin</option>
								<option value="owner">Owner</option>
								<option value="kasir">Kasir</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tempat Kerja</label>
							<select name="id_outlet" class="form-control">
									<option>Pilih Outlet</option>
								<?php
									foreach ($getDataOutlet as $gdo) {
								?>
									<option value="<?= $gdo->id ?>"><?= $gdo->nama_outlet ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Photo Profile</label>
							<input type="file" name="photo_profile" class="form-control">
						</div>
						<div class="form-group">
							<label>Password </label>
							<input name="password" type="password" class="form-control" placeholder="********">
						</div>
					<!-- 	<div class="form-group">
							<label>Ulangi Password</label> <div class="btn"></div>
							<input name="password2" type="password" class="form-control" placeholder="********">
						</div> -->
						<hr>
						<div style="float:right; margin-top: 20px;">
							<!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
							<a href="<?= site_url('Admin/User') ?>" class="btn btn-default">Batalkan</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- <div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<img src="<?= site_url('assets/img/me.png') ?>" alt="" class="img-rounded img-responsive">
				</div>
			</div>
		</div>
	</div> -->
</div><!--/.row-->