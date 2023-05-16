<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Edit Member</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">EDIT MEMBER</h1>
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
		<div class="panel panel-default">
			<div class="panel-body bg-primary shadow">
				<!-- <h5></h5> -->
				<ol>CARA EDIT MEMBER :
					<li>masukkan nama member,</li>
					<li>masukkan no handphone member,</li>
					<li>pilih jenis kelamin member,</li>
					<li>masukkan alamat member dengan benar,</li>
					<li>Klik tombol Simpan jika data dirasa sudah benar.</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<form action="<?= site_url('Admin/Member/ubah_member') ?>" method="POST" role="form">
						<input name="id_member" class="form-control" value="<?= $getDataMember->id ?>" type="hidden">
						<div class="form-group">
							<label>NAMA MEMBER</label>
							<input name="nama_member" class="form-control" required="" value="<?= $getDataMember->nama_member ?>" type="text">
						</div>
						<div class="form-group">
							<label>NO HANDPHONE</label>
							<input name="tlp_member" type="text" class="form-control" required=""  value="<?= $getDataMember->tlp_member ?>">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jk" id="" class="form-control">
								<?php
									if ($getDataMember->jenis_kelamin == 'L') {
								?>
									<option value="<?= $getDataMember->jenis_kelamin ?>">Laki-laki</option>
									<option value="P">Perempuan</option>
								<?php
									} else {
								?>
									<option value="<?= $getDataMember->jenis_kelamin ?>">Perempuan</option>
									<option value="L">Laki-laki</option>
								<?php
									}
									
								?>
							</select>
						</div>
						<div class="form-group">
							<label>ALAMAT</label>
							<div class="row">
								<div class="col-md-12">
									<textarea name="alamat_member" id="" cols="20" rows="5" class="form-control" required=""><?= $getDataMember->alamat_member ?></textarea>
								</div>
							</div>
						</div>
						<div style="float:right; margin-top: 30px;">
							<!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
							<a href="<?= site_url('Admin/Member') ?>" class="btn btn-default">Batalkan</a>
							<button type="submit" class="btn btn-primary">SIMPAN</button>
						</div>
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
