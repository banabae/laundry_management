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
				DATA TRANSAKSI
				<span class="pull-right clickable panel-toggle panel-button-tab-left ">
					<em class="fa fa-toggle-up"></em>
				</span>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">KODE INVOICE</th>
					      <th scope="col">STATUS</th>
					      <!-- <th scope="col">Photo</th> -->
					      <th scope="col">OUTLET</th>
					      <th scope="col">NAMA PELANGGAN</th>
					      <th scope="col">TANGGAL</th>
					      <th scope="col">PEMBAYARAN</th>
					      <th scope="col">TOTAL HARGA</th>
					      <th scope="col" width="50px">MENU</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php
					  	$no = 1;
					  	foreach ($getDataTransaksi as $gdt) :
					  ?>
					    <tr>
					      <!-- <td>
					      	<img src="http://placehold.it/50/30a5ff/fff" alt="" class="img-responsive img-rounded" width="100px" height="100px">
					      </td> -->
					      <td class="text-info"><?= $gdt->kode_invoice ?></td>
					      <td>
					      	<?php
					      		if ($gdt->status == 'baru') {
				      		?>
								<label class="btn btn-danger btn-block">BARU</label>

				      		<?php
				      			} else if($gdt->status == 'proses'){
				      		?>
								<label class="btn btn-warning btn-block">PROSES</label>
							<?php
				      			} else if($gdt->status == 'selesai'){
				      		?>
								<label class="btn btn-primary btn-block">SELESAI</label>
				      		<?php
				      			} else {
				      		?>
								<label class="btn btn-success btn-block">DIAMBIL</label>
				      		<?php
				      			}
					      				
					      	?>
				      	  </td>
					      <td><?= $gdt->nama_outlet ?></td>
					      <td><?= $gdt->nama_pelanggan ?></td>
					      <td><?= $gdt->tgl ?></td>
					      <td>
					      	<?php
					      		if ($gdt->dibayar == 'dibayar') {
				      		?>
								<label for="" class="text-success">DIBAYAR</label>
				      		<?php
				      			} else {
				      		?>
								<label for="" class="text-danger">BELUM DIBAYAR</label>
				      		<?php
				      			}		
					      	?>
					      </td>
					      <td><?= $this->lps->getRupiah($gdt->totalKeseluruhan) ?></td>
					      <td>
					      	<?php
					      		if ($gdt->dibayar == 'dibayar' && $gdt->status == 'selesai') {
				      		?>
								<a href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Report">
									<em class="fa fa-download"></em>
								</a>
				      		<?php
				      			} else {
				      		?>
						      	<a href="<?= site_url('Admin/Transaksi/editTransaksi/').$gdt->id ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Detail">
						      		<em class="fa fa-eye"></em>
						      	</a>
				      		<?php
				      			}		
					      	?>
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