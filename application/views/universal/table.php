<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Table</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Table</h1>
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
	<div class="col-md-4 col-lg-offset-0 text-center">
		<div class="panel panel-default">
			<div class="panel-body bg-primary">
				<form action="#" method="POST">
					<input type="text" class="" placeholder="Cari">
					<button class="btn btn-success"><em class="fa fa-search"></em></button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-2 col-lg-offset-0 text-center">
		<div class="panel panel-default">
			<div class="panel-body bg-primary">
				<a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Download Report">
					<em class="fa fa-download"></em>
				</a>
				<a href="<?= site_url('Admin/Home/addTable') ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Tambah">
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
				Contoh Table 
				<span class="pull-right clickable panel-toggle panel-button-tab-left ">
					<em class="fa fa-toggle-up"></em>
				</span>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-responsive">
				  <thead>
				    <tr>
				      <th scope="col" width="30px">No</th>
				      <th scope="col">Photo</th>
				      <th scope="col">First</th>
				      <th scope="col">Last</th>
				      <th scope="col">Handle</th>
				      <th scope="col" width="150px">Menu</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>
				      	<img src="http://placehold.it/50/30a5ff/fff" alt="" class="img-responsive img-rounded" width="100px" height="100px">
				      </td>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				      <td>
				      	<a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Detail">
				      		<em class="fa fa-eye"></em>
				      	</a>
				      	<a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
				      		<em class="fa fa-edit"></em>
				      	</a>
				      	<a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
				      		<em class="fa fa-trash"></em>
				      	</a>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
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