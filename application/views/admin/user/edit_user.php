<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Edit User</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit User</h1>
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
				<ol>Cara Edit user :
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
					<?= form_open_multipart('Admin/User/ubah_user') ?>
						<input name="id_user" type="hidden" value="<?= $getDataUser->id ?>">
						<div class="form-group">
							<label>Nama lengkap</label>
							<input name="nama" type="text" class="form-control" placeholder="contoh : Alexander antonio del calsius" value="<?= $getDataUser->nama ?>">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input name="username" type="text" class="form-control" placeholder="contoh : Alexander" value="<?= $getDataUser->username ?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input name="email" type="email" class="form-control" placeholder="contoh : Contoh@email.com" value="<?= $getDataUser->email ?>">
						</div>
						<div class="form-group">
							<label>No Hp.</label>
							<input name="tlp" type="text" class="form-control" placeholder="contoh : 08xx xxxx xxxx" value="<?= $getDataUser->tlp ?>">
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<div class="row">
								<div class="col-md-2">
									<select name="tgl" id="" class="form-control">
										<option value="<?= $tgl ?>"><?= $tgl ?></option>
										<!-- <option value="">Tgl</option> -->
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
										<option value="<?= $bulan ?>"><?= $bulan ?></option>
										<!-- <option value="">Bulan</option> -->
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
										<!-- <option value="">Tahun</option> -->
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
							<?php
								if ($getDataUser->jenis_kelamin == 'L') {
							?>
								<option value="<?= $getDataUser->jenis_kelamin ?>">Laki-laki</option>
								<option value="P">Perempuan</option>
							<?php
								} else {
							?>
								<option value="<?= $getDataUser->jenis_kelamin ?>">Perempuan</option>
								<option value="L">Laki-laki</option>
							<?php
								}	
							?>
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
								<?php
									if ($getDataUser->role == 'admin') {
								?>
									<option value="admin">Admin</option>
									<option value="owner">Owner</option>
									<option value="kasir">Kasir</option>
								<?php
									} else if($getDataUser->role == 'kasir'){
								?>
									<option value="kasir">Kasir</option>
									<option value="admin">Admin</option>
									<option value="owner">Owner</option>
								<?php
									}else{
								?>
									<option value="owner">Owner</option>
									<option value="kasir">Kasir</option>
									<option value="admin">Admin</option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Tempat Kerja</label>
							<select name="id_outlet" class="form-control">
								<option value="<?= $getDataUser->id_outlet ?>"><?= $getDataUser->nama_outlet ?></option>
									<!-- <option value="">Pilih Outlet</option> -->
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
						<hr>
						<div style="float:right; margin-top: 20px;">
							<a href="<?= site_url('Admin/User') ?>" class="btn btn-default">Batalkan</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->