<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?= site_url('Admin/Home') ?>">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Dashboard</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<?= $this->session->flashdata('message'); ?>
		<h1 class="page-header">DASHBOARD</h1>
	</div>
</div><!--/.row-->

<div class="panel panel-container shadow">
	<div class="row">
		<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-teal panel-widget border-right">
				<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
					<div class="large"><?= $getCountNewTransaksi ?></div>
					<div class="text-muted">Orderan Baru</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-red panel-widget border-right">
				<div class="row no-padding"><em class="glyphicon fa-xl glyphicon-transfer color-teal"></em>
					<div class="large"><?= $getCountTransaksiSuccess ?></div>
					<div class="text-muted">Transaksi Berhasil</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-blue panel-widget border-right">
				<div class="row no-padding"><em class="glyphicon fa-xl glyphicon-credit-card color-red"></em>
					<div class="h2"><?= $getSeluruhPemasukan ?></div>
					<div class="text-muted">Seluruh Pemasukkan</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding"><em class="fa fa-xl fa-users color-orange"></em>
					<div class="large"><?= $getCountMember ?></div>
					<div class="text-muted">Member</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-container shadow">
		<div class="row center-block">
			<div class="col-xs-12 col-md-12 col-lg-4 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="glyphicon fa-xl glyphicon-cloud color-teal"></em>
						<div class="h2"><?= $getCountPaket ?></div>
						<div class="text-muted">Produk / Paket</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-12 col-lg-4 no-padding">
				<div class="panel panel-orange panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
						<div class="large"><?= $getCountUser ?></div>
						<div class="text-muted">Users</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-12 col-lg-4 no-padding">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding"><em class="fa fa-xl fa-home color-red"></em>
						<div class="large"><?= $getCountOutlet ?></div>
						<div class="text-muted">Outlet</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
	</div>
</div>

<?php
	if ($this->session->userdata('role') != 'owner') {
?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					TRANSAKSI BARU
					<span class="pull-right clickable panel-toggle panel-button-tab-left ">
						<em class="fa fa-toggle-up"></em>
					</span>
				</div>
				<div class="panel-body">
					<a href="<?php
						if($this->session->userdata('role') == 'admin'){
							echo site_url('Admin/Transaksi/DataTransaksi');
						}else if($this->session->userdata('role') == 'kasir'){
							echo site_url('Kasir/Transaksi/DataTransaksi');
						}else{
							// site_url('Admin/Transaksi');		
						}
					?>" class="btn btn-info">
						<em class="fa fa-database"></em> Detail Data Transaksi
					</a>
					<div class="table-responsive">
						<table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">KODE INVOICE</th>
						      <!-- <th scope="col">Photo</th> -->
						      <th scope="col">OUTLET</th>
						      <th scope="col">NAMA PELANGGAN</th>
						      <th scope="col">TANGGAL</th>
						      <th scope="col">PEMBAYARAN</th>
						      <th scope="col">TOTAL HARGA</th>
						      <th scope="col">STATUS</th>
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
						      		if ($gdt->status == 'baru') {
					      		?>
									<label class="btn btn-danger">BARU</label>

					      		<?php
					      			} else if($gdt->status == 'proses'){
					      		?>
									<label class="btn btn-warning">PROSES</label>
								<?php
					      			} else if($gdt->status == 'selesai'){
					      		?>
									<label class="btn btn-primary">SELESAI</label>
					      		<?php
					      			} else {
					      		?>
									<label class="btn btn-success">DIAMBIL</label>
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
<?php
	} else {
		
	}
	
?>

<!-- <div class="row">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<h4>New Orders</h4>
				<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span></div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<h4>Comments</h4>
				<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<h4>New Users</h4>
				<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<h4>Visitors</h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span></div>
			</div>
		</div>
	</div>
</div> --><!--/.row-->

<!-- <div class="row">
	<div class="col-md-6">
		<div class="panel panel-default chat">
			<div class="panel-heading">
				Chat
				<ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
								<ul class="dropdown-settings">
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 1
									</a></li>
									<li class="divider"></li>
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 2
									</a></li>
									<li class="divider"></li>
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 3
									</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body">
				<ul>
					<li class="left clearfix"><span class="chat-img pull-left">
						<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
						</span>
						<div class="chat-body clearfix">
							<div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
						</div>
					</li>
					<li class="right clearfix"><span class="chat-img pull-right">
						<img src="http://placehold.it/60/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
						</span>
						<div class="chat-body clearfix">
							<div class="header"><strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small></div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
						</div>
					</li>
					<li class="left clearfix"><span class="chat-img pull-left">
						<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
						</span>
						<div class="chat-body clearfix">
							<div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="panel-footer">
				<div class="input-group">
					<input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." /><span class="input-group-btn">
						<button class="btn btn-primary btn-md" id="btn-chat">Send</button>
				</span></div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				To-do List
				<ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
								<ul class="dropdown-settings">
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 1
									</a></li>
									<li class="divider"></li>
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 2
									</a></li>
									<li class="divider"></li>
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 3
									</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body">
				<ul class="todo-list">
					<li class="todo-list-item">
						<div class="checkbox">
							<input type="checkbox" id="checkbox-1" />
							<label for="checkbox-1">Make coffee</label>
						</div>
						<div class="pull-right action-buttons"><a href="#" class="trash">
							<em class="fa fa-trash"></em>
						</a></div>
					</li>
					<li class="todo-list-item">
						<div class="checkbox">
							<input type="checkbox" id="checkbox-2" />
							<label for="checkbox-2">Check emails</label>
						</div>
						<div class="pull-right action-buttons"><a href="#" class="trash">
							<em class="fa fa-trash"></em>
						</a></div>
					</li>
					<li class="todo-list-item">
						<div class="checkbox">
							<input type="checkbox" id="checkbox-3" />
							<label for="checkbox-3">Reply to Jane</label>
						</div>
						<div class="pull-right action-buttons"><a href="#" class="trash">
							<em class="fa fa-trash"></em>
						</a></div>
					</li>
					<li class="todo-list-item">
						<div class="checkbox">
							<input type="checkbox" id="checkbox-4" />
							<label for="checkbox-4">Make more coffee</label>
						</div>
						<div class="pull-right action-buttons"><a href="#" class="trash">
							<em class="fa fa-trash"></em>
						</a></div>
					</li>
					<li class="todo-list-item">
						<div class="checkbox">
							<input type="checkbox" id="checkbox-5" />
							<label for="checkbox-5">Work on the new design</label>
						</div>
						<div class="pull-right action-buttons"><a href="#" class="trash">
							<em class="fa fa-trash"></em>
						</a></div>
					</li>
					<li class="todo-list-item">
						<div class="checkbox">
							<input type="checkbox" id="checkbox-6" />
							<label for="checkbox-6">Get feedback on design</label>
						</div>
						<div class="pull-right action-buttons"><a href="#" class="trash">
							<em class="fa fa-trash"></em>
						</a></div>
					</li>
				</ul>
			</div>
			<div class="panel-footer">
				<div class="input-group">
					<input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" /><span class="input-group-btn">
						<button class="btn btn-primary btn-md" id="btn-todo">Add</button>
				</span></div>
			</div>
		</div>
	</div> --><!--/.col-->
	
	
	<!-- <div class="col-md-6">
		<div class="panel panel-default ">
			<div class="panel-heading">
				Timeline
				<ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
								<ul class="dropdown-settings">
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 1
									</a></li>
									<li class="divider"></li>
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 2
									</a></li>
									<li class="divider"></li>
									<li><a href="#">
										<em class="fa fa-cog"></em> Settings 3
									</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body timeline-container">
				<ul class="timeline">
					<li>
						<div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge primary"><em class="glyphicon glyphicon-link"></em></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge"><em class="glyphicon glyphicon-camera"></em></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge"><em class="glyphicon glyphicon-paperclip"></em></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div> -->
	<!-- </div> --><!--/.col-->
<!-- </div> --><!--/.row-->

<!-- custom js -->
<!-- <script>
window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
	});
};
</script> -->