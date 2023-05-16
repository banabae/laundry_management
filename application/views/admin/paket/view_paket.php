<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Data Paket</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">DATA PAKET</h1>
		<?= $this->session->userdata('message'); ?>
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
	<div class="col-md-6 col-lg-offset-0 text-center">
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<form action="<?= site_url('Admin/Paket/mencari_paket') ?>" method="POST">
					<!-- <input name="keyword" type="text" placeholder="Cari" value="<?= set_value('keyword') ?>">
					<button class="btn btn-success"><em class="fa fa-search"></em></button>
					 -->
					<div class="row">
						<div class="col-md-5">
							<select name="sort_by" id="" class="form-control">
								<option value="">Pilih Berdasarkan</option>
								<option value="nama_paket">Nama Paket</option>
								<option value="jenis">Jenis</option>
								<option value="harga">Harga</option>
							</select>
						</div>
						<div class="col-md-7">
							<input name="keyword" type="text" placeholder="Cari" value="<?= set_value('keyword') ?>">
							<button class="btn btn-success"><em class="fa fa-search"></em></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-2"></div> -->
	<div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<!-- <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Download Report">
					<em class="fa fa-download"></em>
				</a> -->
				<a href="<?= site_url('Admin/Paket/add_paket') ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Tambah">
					<em class="fa fa-plus"></em>
				</a>
				<a href="#" onclick="location.reload();" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Refresh Page">
					<em class="fa fa-refresh"></em>
				</a>
			</div>
		</div>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				TABLE DATA PAKET
				<span class="pull-right clickable panel-toggle panel-button-tab-left ">
					<em class="fa fa-toggle-up"></em>
				</span>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col" width="30px">NO</th>
					      <!-- <th scope="col">Photo</th> -->
					      <th scope="col" width="300px">NAMA PAKET</th>
					      <th scope="col" width="300px">OUTLET</th>
					      <th scope="col" width="200px">JENIS</th>
					      <th scope="col" width="150px">HARGA</th>
					      <th scope="col" width="150px">MENU</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php
					  	$no = 1;
					  	foreach ($getDataPaket as $gdo) :
					  ?>
					    <tr>
					      <th scope="row"><?= $no++ ?></th>
					      <!-- <td>
					      	<img src="http://placehold.it/50/30a5ff/fff" alt="" class="img-responsive img-rounded" width="100px" height="100px">
					      </td> -->
					      <td><?= $gdo->nama_paket ?></td>
					      <td class="text-info"><?= $gdo->nama_outlet ?></td>
					      <td><?= $gdo->jenis ?></td>
					      <td><?= $this->lps->getRupiah($gdo->harga) ?></td>
					      <td>
					      	<!-- <a href="<?= site_url('Admin/Paket/delete_paket/').$gdo->id ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Detail">
					      		<em class="fa fa-eye"></em>
					      	</a> -->
					      	<a href="<?= site_url('Admin/Paket/edit_paket/').$gdo->id ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Paket">
					      		<em class="fa fa-edit"></em>
					      	</a>
					      	<a href="<?= site_url('Admin/Paket/hapus_paket/').$gdo->id ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Paket">
					      		<em class="fa fa-trash"></em>
					      	</a>
					      </td>
					    </tr>
					  <?php endforeach; ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->

<!-- <div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h5>CATATAN</h5>
				<div class="col-md-12">
					<p>-</p>
				</div>
			</div>
		</div>
	</div>
</div> --><!--/.row-->