<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Data Outlet</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">DATA OUTLET</h1>
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
	<div class="col-md-4 col-lg-offset-0 text-center">
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<form action="<?= site_url('Admin/Outlet/mencari_outlet') ?>" method="POST">
					<input name="keyword" type="text" placeholder="Cari" value="<?= set_value('keyword') ?>">
					<button class="btn btn-success"><em class="fa fa-search"></em></button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<!-- <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Download Report">
					<em class="fa fa-download"></em>
				</a> -->
				<a href="<?= site_url('Admin/Outlet/add_outlet') ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Tambah">
					<em class="fa fa-plus"></em>
				</a>
				<a href="#" onclick="location.reload();" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Refresh Page">
					<em class="fa fa-refresh"></em>
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-6"></div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				TABLE DATA OUTLET
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
					      <th scope="col">NAMA</th>
					      <th scope="col">ALAMAT</th>
					      <th scope="col">NO HANDPHONE</th>
					      <th scope="col" width="150px">MENU</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php
					  	$no = 1;
					  	foreach ($getDataOutlet as $gdo) :
					  ?>
					    <tr>
					      <th scope="row"><?= $no++ ?></th>
					      <!-- <td>
					      	<img src="http://placehold.it/50/30a5ff/fff" alt="" class="img-responsive img-rounded" width="100px" height="100px">
					      </td> -->
					      <td class="text-info"><?= $gdo->nama_outlet ?></td>
					      <td><?= $gdo->alamat ?></td>
					      <td><?= $this->lps->getNoHp($gdo->tlp) ?></td>
					      <td>
					      	<!-- <a href="<?= site_url('Admin/Outlet/delete_outlet/').$gdo->id ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Detail">
					      		<em class="fa fa-eye"></em>
					      	</a> -->
					      	<a href="<?= site_url('Admin/Outlet/edit_outlet/').$gdo->id ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
					      		<em class="fa fa-edit"></em>
					      	</a>
					      	<a href="<?= site_url('Admin/Outlet/hapus_outlet/').$gdo->id ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
					      		<em class="fa fa-trash"></em>
					      	</a>
					      	<!-- <a data-toggle="modal" data-target="#hapus"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
					      		<em class="fa fa-trash"></em>
					      	</a> -->
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

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<h5>CATATAN</h5>
				<div class="col-md-12">
					<p>-</p>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->

<!-- modal hapus -->
<!-- 	<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content center-block">
	      <div class="modal-body">
	        <h3 class="text-center">Yakin mau hapus data Outlet?</h3>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>

	        <a href="<?= site_url('Admin/Outlet/hapus_outlet/').$gdo->id ?>" class="btn btn-secondary">Hapus</a>
	      </div>
	    </div>
	  </div>
	</div> -->
<!-- end modal -->