<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Data User</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data User</h1>
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
				<form action="<?= site_url('Admin/User/mencari_user') ?>" method="POST">
					<input name="keyword" type="text" placeholder="Cari" value="<?= set_value('keyword') ?>">
					<button class="btn btn-success"><em class="fa fa-search"></em></button>
					<!-- <div class="row">
						<div class="col-md-5">
							<select name="sort_by" id="" class="form-control">
								<option value="">Pilih Berdasarkan</option>
								<option value="nama">Nama user</option>
								<option value="alamat">Alamat</option>
								<option value="tlp">No Telp.</option>
							</select>
						</div>
						<div class="col-md-7">
							<input name="keyword" type="text" placeholder="Cari" value="<?= set_value('keyword') ?>">
							<button class="btn btn-success"><em class="fa fa-search"></em></button>
						</div>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-4"></div> -->
	<div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default shadow">
			<div class="panel-body bg-primary">
				<!-- <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Download Report">
					<em class="fa fa-download"></em>
				</a> -->
				<a href="<?= site_url('Admin/User/add_user') ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Tambah">
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
  <?php
  	$no = 1;
  	foreach ($getDataUser as $gdu) :
  ?>
	<div class="col-md-4">
		<div class="panel panel-default shadow">
			<div class="panel-body">
		    	<label for="">No. <?= $no++ ?></label>
				<label style="float:right" class="text-success">
					<?= $gdu->nama_outlet ?>
				</label>
				<hr>
				<div class="row">
					<div class="col-md-4 center-block">
						<img src="<?= site_url('uploads/img/profile/').$gdu->photo_profile ?>" alt="" class="img-rounded" width="80px" height="80px" style="float: right">
					</div>
					<div class="col-md-8">
						<div>
							<?= strtoupper($gdu->nama) ?>
						</div>
						<div class="text-info">
							<?= $gdu->role ?>
						</div>
						<div>
							<?= $this->lps->getNoHp($gdu->tlp) ?>
						</div>
					</div>
					<!-- <div class="col-md-12 text-center">
						<i class="">Terakhir login : <?= $gdu->last_login ?></i>
					</div> -->
				</div>
				<hr>
				<div style="float:right">
					<a href="<?= site_url('Admin/User/detail_user/').$gdu->id ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Detail">
			      		<em class="fa fa-eye"></em>
			      	</a>
					<a href="<?= site_url('Admin/User/edit_user/').$gdu->id ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
			      		<em class="fa fa-edit"></em>
			      	</a>
			      	<a href="<?= site_url('Admin/User/hapus_user/').$gdu->id ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
			      		<em class="fa fa-trash"></em>
			      	</a>
				</div>
			</div>
		</div>
	</div>
  <?php endforeach; ?>

<!-- 	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Table Data User
				<span class="pull-right clickable panel-toggle panel-button-tab-left ">
					<em class="fa fa-toggle-up"></em>
				</span>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-responsive">
				  <thead>
				    <tr> -->
				      <!-- <th scope="col">Photo</th> -->
				     <!--  <th scope="col">Photo Profile</th>
				      <th scope="col">Nama Lengkap</th>
				      <th scope="col">Username</th>
				      <th scope="col">Jabatan</th>
				      <th scope="col">Outlet</th>
				      <th scope="col">Tanggal Lahir</th>
				      <th scope="col">JK</th>
				      <th scope="col">email</th>
				      <th scope="col">No Hp.</th>
				      <th scope="col" width="150px">Menu</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row"></th> -->
				      <!-- <td>
				      	<img src="http://placehold.it/50/30a5ff/fff" alt="" class="img-responsive img-rounded" width="100px" height="100px">
				      </td> -->
				    <!--   <td></td>
				      <td></td>
				      <td><?= $gdu->username ?></td>
				      <td></td>
				      <td class="text-info"></td>
				      <td><?= $this->lps->getTanggalLahir($gdu->tgl_lahir) ?></td>
				      <td><?= $gdu->jenis_kelamin ?></td>
				      <td><?= $gdu->email ?></td>
				      <td></td>
				      <td> -->
				      	<!-- <a href="<?= site_url('Admin/User/delete_user/').$gdu->id ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Detail">
				      		<em class="fa fa-eye"></em>
				      	</a> -->
				      	
				     <!--  </td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div> -->

</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h5>Catatan</h5>
				<div class="col-md-12">
					<p>-</p>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->