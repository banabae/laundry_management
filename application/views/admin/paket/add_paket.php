<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Tambah Paket</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">TAMBAH PAKET</h1>
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
				<ol>CARA TAMBAH PAKET :
					<li>Pilih Outlet laundry,</li>
					<li>Masukkan nama Paket laundry,</li>
					<li>Pilih jenis Paket laundry yang mudah ditemukan oleh pelanggan,</li>
					<li>Masukkan Harga Paket tersebut</li>
					<li>Klik tombol Simpan jika data dirasa sudah benar.</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<form action="<?= site_url('Admin/Paket/tambah_paket') ?>" method="POST" role="form">
						<label>OUTLET</label>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<select name="id_outlet" id="" class="form-control">
										<option value="">Pilih Outlet</option>
										<?php foreach ($getDataOutlet as $gdo) :?>
											<option value="<?= $gdo->id ?>"><?= $gdo->nama_outlet ?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>NAMA PAKET</label>
							<input name="nama_paket" class="form-control" placeholder="Nama Paket" required="">
						</div>
						<div class="form-group">
							<label>JENIS PAKET</label>
							<div class="row">
								<div class="col-md-12">
									<select name="jenis" id="" class="form-control">
										<option value="">Pilih Jenis Paket</option>
										<option value="kiloan">Kiloan</option>
										<option value="selimut">Selimut</option>
										<option value="bed_cover">Bed Cover</option>
										<option value="kaos">Kaos</option>
										<option value="lain">Lainnya</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>HARGA PAKET</label>
							<input name="harga" type="text" class="form-control" placeholder="Rp000.000" required="">
						</div>
						<div style="float:right; margin-top: 30px;">
							<!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
							<a href="<?= site_url('Admin/Paket') ?>" class="btn btn-default">Batalkan</a>
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
