<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Entri Transaksi</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">ENTRI TRANSAKSI</h1>
		<div id="msg"></div>
		<!-- <div class="alert alert-success">Transaksi Berhasil!</div> -->
	</div>
</div><!--/.row-->


<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default shadow">
			<div class="panel-heading" style="background-color: #30a5ff; color: black">
				<em class="glyphicon glyphicon-list text-white"></em>
				<label class="text-white"> Tambah List Paket</label>
			</div>
			<div class="panel-body">
				<div class="row">
				<form action="<?php
					if($this->session->userdata('role') == 'admin'){
						echo site_url('Admin/Transaksi/tambah_tempData');
					}else if($this->session->userdata('role') == 'kasir'){
						echo site_url('Kasir/Transaksi/tambah_tempData');
					}else{

					}
				?>" method="POST">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group center-block">
									<label>Paket</label>
									<!-- <input name="nama_paket" type="text" class="form-control shadow" id="tag" placeholder="Masukkan Paket" required> -->
									<select name="nama_paket" id="" class="form-control shadow form-pass">
										<option value="">Pilih Paket</option>
										<?php
											foreach ($getDataPaket as $gdp) {
										?>
											<option value="<?= $gdp->nama_paket ?>"><?= $gdp->nama_paket ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group center-block">
									<label for="">Qty</label>
									<input name="qty" type="number" class="form-control shadow" placeholder="Qty" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Keterangan</label>
									<!-- <select name="keterangan" id="" class="form-control">
										<option value="satuan">Satuan</option>
										<option value="kiloan">Kiloan</option>
									</select> -->
									<textarea name="keterangan" id="" cols="30" rows="2" class="form-control shadow" placeholder="Keterangan tambahan"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
							<div class="form-group center-block">
								<button class="btn btn-success btn-block btn-form">
									<em class="fa fa-save"></em>
								</button>
							</div>
					</div>
				</form>
				</div>
			</div>
		</div>
<!-- big form 4 me -->
<form id="form">
		<div class="panel panel-default shadow">
			<div class="panel-heading" style="background-color: #30a5ff; color: black">
				<em class="glyphicon glyphicon-user text-white"></em>
				<label  class="text-white"> INFO PELANGGAN</label>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-5">
						<button class="btn btn-block btn-success shadow" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Member</button>
					</div>
					<div class="col-md-7">
						<a href="<?= site_url('Admin/Member/add_member') ?>" class="btn btn-block shadow">Tambah Member?</a>
					</div>
				</div>
				<br>

				<div class="row">

				  <div class="col-md-12">
				    <div class="collapse in multi-collapse" id="multiCollapseExample1" aria-expanded="true">
				      <div class="card card-body">
				        <div class="form-group">
				        	<label> Nama Pelanggan</label>
				        	<input name="nama_nonmember" type="text" class="form-control shadow" placeholder="Nama Lengkap">
				        </div>
				        <div class="form-group">
				        	<label> No. Hp</label>
							<input name="tlp_nonmember" type="text" class="form-control shadow" placeholder="08xx-xxxx-xxxx">

				        </div>
				        <div class="form-group">
				        	<label> Alamat</label>
							<textarea name="alamat_nonmember" id="" cols="20" rows="5" class="form-control shadow" placeholder="Alamat lengkap..."></textarea>
				        </div>
				      </div>
				    </div>
				  </div>

				  <div class="col-md-12">
				    <div class="collapse multi-collapse" id="multiCollapseExample2">
				      <div class="card card-body">
				    	<div class="form-group">
				        	<label> Input ID Member</label>
				        	<input name="id_member" id="member" type="text" class="form-control shadow">
							<!-- <input name="nama_paket" type="text" class="form-control" id="tag" placeholder="Masukkan Paket" required> -->
				        	
				        </div>
				        <div class="form-group">
				        	<label> Nama Member</label>
				        	<input name="nama_member" type="text" class="form-control" placeholder="Nama Member" readonly>
				        </div>
				        <div class="form-group">
				        	<label> No. Hp</label>
							<input name="tlp_member" type="text" class="form-control" placeholder="08xx-xxxx-xxxx" readonly>

				        </div>
				        <div class="form-group">
				        	<label> Alamat</label>
							<textarea name="alamat_member" id="" cols="20" rows="5" class="form-control" placeholder="Alamat lengkap..." readonly></textarea>
				        </div>
				      </div>
				    </div>
				  </div>

				</div>

			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="panel panel-default shadow">
			<div class="panel-heading">
				<em class="glyphicon glyphicon-book"></em>
				<label> INFO NOTA</label>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Kode Invoice</label>
							<input name="kode_invoice" type="text" class="form-control" value="<?= $kodeInVoice ?>" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal</label>
							<input type="text" class="form-control" value="<?= date("d-m-Y"); ?>" readonly>
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kasir</label>
							<input name="id_user" type="hidden" class="form-control" value="<?= $id_user ?>" readonly>
							<input name="role" type="hidden" class="form-control" value="<?= $this->session->userdata('role'); ?>" readonly>
							<input type="text" class="form-control" value="<?= $kasir ?>" readonly>
						</div>
						<div class="form-group">
							<label>Batas Waktu</label>
							<input name="batas_waktu" type="date" class="form-control shadow">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default shadow">
			<div class="panel-body">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered">
						  <thead>
						    <tr style="background-color: #e9ecf2;">
							    <th class="text-center">#</th>
								<th class="text-center">Paket Jasa</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Total</th>
								<th class="text-center"></th>
						    </tr>
						  </thead>
						  <tbody>
						    <?php
						    	$no = 1;
						    	foreach ($getTemp as $gt) {
						    ?>
						    <tr>
						      <th scope="row" class="text-center"><?= $no++ ?></th>
						      <td><?= $gt->nama_paket ?></td>
						      <td class="text-center"><?= $this->lps->getRupiah($gt->harga) ?></td>
						      <td class="text-center"><?= $gt->qty ?></td>
						      <td class="text-center"><?= $this->lps->getRupiah($gt->sub_total) ?></td>
						      <td class="text-center">
						      	<a href="<?= site_url('Admin/Transaksi/hapus_tempData/').$gt->id ?>" class="btn btn-danger">
						      		<em class="fa fa-close"></em>
						      	</a>
						      </td>
						    </tr>
							<?php
								}
							?>
						  </tbody>
						</table>
					</div>
					<div class="form-total">
						<label for="">Sub Total : </label>
						<label class="total-harga">
							<label><?= $this->lps->getRupiah($getTotal) ?></label>
						</label>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-9">
									<div class="form-group">
										<label for="">Pajak :</label>
										<input name="pajak" type="text" class="form-control" value="<?= $pajak ?>" readonly>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Diskon :</label>
										<input name="diskon" id="diskon" type="number" class="form-control shadow" placeholder="00%" oninput="dis()">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Keterangan :</label>
										<textarea name="keterangan_tambahan" id="" cols="30" rows="5" class="form-control shadow"></textarea>
									</div>
								</div>
							</div>
						</div>
									
						<div class="col-md-4">
							<div class="form-group">
								<label for="">
									Harga Setelah di Diskon :
								</label>
								<input name="hargaAfterDiskon" id="hargaAfterDiskon" type="text" class="form-control" value="<?= $hargaAfterDiskon ?>" readonly>
							</div>
							<div class="form-group">
								<label for="">Biaya Tambahan</label>
								<input name="biaya_tambahan" id="biayaTambahan" type="text" class="form-control shadow" value="" oninput="biayaPlesPles()" >
							</div>
							<div class="form-group">
								<label for="">Total Keseluruhan :</label>
								<input name="totalKeseluruhan" id="totalKeseluruhan" type="text" class="form-control" value="<?= $hargaAfterDiskon ?>" readonly>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							
						</div>
						<div class="col-md-5"></div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Bayar :</label>
								<input name="bayar" id="bayar" type="text" class="form-control shadow" oninput="bayarLangsung()">
								<!-- <label id="msg"></label> -->
							</div>
							<div class="form-group">
								<label for="">Kembalian :</label>
								<input name="kembalian" id="kembalian" type="text" class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<button onclick="save(2)" class="btn btn-info btn-block btn-form">
									<em class="fa fa-dollar"></em> Bayar Nanti
								</button>
							</div>
						</div>
						<div class="col-md-4">
							
						</div>
						<div class="col-md-4">
							<button onclick="save(1)" class="btn btn-form btn-success btn-block">
								<em class="fa fa-dollar"></em> Bayar
							</button>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>

</form>

</div><!--/.row-->

