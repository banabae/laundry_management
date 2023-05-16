<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">View Transaksi</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">TRANSAKSI</h1>
	</div>
</div><!--/.row-->


<div class="row">
	

	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<form action="<?= site_url('Admin/Transaksi/updateTransaksi') ?>" method="POST" role="form">
						<input name="id" type="hidden" class="form-control" value="<?= $getDataTransaksi->id ?>">
						<div class="form-group">
							<label>TANGGAL</label>
							<input name="tgl" class="form-control" value="<?= $getDataTransaksi->tgl ?>" readonly>
						</div>
						<div class="form-group">
							<label>KODE INVOICE	</label>
							<input name="kode_invoice" class="form-control" value="<?= $getDataTransaksi->kode_invoice ?>" readonly>
						</div>
						<div class="form-group">
							<label>NAMA PELANGGAN</label>
							<input name="nama_pelanggan" class="form-control" value="<?= $getDataTransaksi->nama_pelanggan ?>" readonly>
						</div>
						<div class="form-group">
							<label>TOTAL HARGA</label>
							<input name="totalKeseluruhan" id="totalKeseluruhan" type="text" class="form-control" value="<?= $getDataTransaksi->totalKeseluruhan ?>" readonly>	
						</div>
					<?php
						if ($getDataTransaksi->dibayar == 'dibayar') {
					?>
						<div class="form-group">
							<label>PEMBAYARAN</label>
							<input name="dibayar" class="form-control" value="dibayar" readonly>
						</div>
					<?php
						} else {
					?>
						<div class="form-group">
							<label>PEMBAYARAN</label>
							<input name="dibayar" class="form-control" value="belum_diayar" readonly>
						</div>
						<div class="form-group">
							<label for="">Bayar :</label>
							<input name="bayar" id="bayar" type="text" class="form-control" oninput="bayarLangsung()">
							<label for="" class="text-warning">*isi form ini ketika pelanggan ingin membayar atau status sudah selesai kemudian ganti status menjadi Diambil</label>
						</div>
						<div class="form-group">
							<label for="">Kembalian :</label>
							<input name="kembalian" id="kembalian" type="text" class="form-control" readonly>
						</div>
					<?php
						}
					?>
						<div class="form-group">
							<label>STATUS</label>
							<select name="status" id="" class="form-control form-pass">
								<?php
									if ($getDataTransaksi->status == 'baru') {
								?>
									<option value="baru">Baru</option>
									<option value="proses">Proses</option>
									<option value="selesai">Selesai</option>
									<option value="diambil">Diambil</option>
								<?php
									} else if($getDataTransaksi->status == 'proses'){
								?>
									<option value="proses">Proses</option>
									<option value="selesai">Selesai</option>
									<option value="diambil">Diambil</option>
									<option value="baru">Baru</option>
								<?php
									} else if($getDataTransaksi->status == 'selesai'){
								?>
									<option value="selesai">Selesai</option>
									<option value="diambil">Diambil</option>
									<option value="baru">Baru</option>
									<option value="proses">Proses</option>
								<?php
									}else{
								?>
									<option value="diambil">Diambil</option>
									<option value="baru">Baru</option>
									<option value="proses">Proses</option>
									<option value="selesai">Selesai</option>
								<?php
									}
								?>
							</select>
							<!-- <input name="kode_invoice" class="form-control" value="<?= $getDataTransaksi->status ?>"> -->
						</div>
						<div class="form-group">
							<label>OUTLET	</label>
							<input name="id_outlet" type="hidden" class="form-control" value="<?= $getDataTransaksi->id_outlet ?>" readonly>
							<input name="nama_outlet" class="form-control" value="<?= $getDataTransaksi->nama_outlet ?>" readonly>
						</div>

						<div style="float:right; margin-top: 30px;">
							<!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
							<a href="<?= site_url('Admin/Transaksi/DataTransaksi') ?>" class="btn btn-default">Batalkan</a>
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
