<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="btn btn-block bg-primary">
		<h5 style="margin: 10px"><em id="jam"></em> : <em id="menit"></em> : <em id="detik"></em> WIB</h5>
	</div>
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<a href="<?= site_url('Profile') ?>">
				<img src="<?= site_url('uploads/img/profile/').$getProfile->photo_profile; ?>" class="img-responsive" alt="">
			</a>
		</div>
		<div class="profile-usertitle">
			<div class="profile-usertitle-name"><?= strtoupper($getProfile->nama) ?></div>
			<div class="profile-usertitle-status" style="color:#8ad919;"><?= $getProfile->role ?></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="divider"></div>
	<!-- <form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form> -->
	<?php
		if ($this->session->userdata('role') == 'admin') {
	?>
		<ul class="nav menu">
			<li class=" <?= ($this->uri->segment(2) == 'Home')? 'active' : '' ?>">
				<a href="<?= site_url('Admin/Home') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(3) == 'Index')? 'active' : '' ?>">
				<!-- <label class="text-muted center-block">Management</label> -->
				<a href="<?= site_url('Admin/Transaksi/Index') ?>"><em class="glyphicon glyphicon-transfer">&nbsp;</em> Entri Transaksi</a>
			</li>
			<li class=" <?= ($this->uri->segment(3) == 'DataTransaksi')? 'active' : '' ?>">
				<a href="<?= site_url('Admin/Transaksi/DataTransaksi') ?>"><em class="fa fa-database">&nbsp;</em> Data Transaksi</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(2) == 'Outlet')? 'active' : '' ?>">
				<!-- <label class="text-muted center-block">Management</label> -->
				<a href="<?= site_url('Admin/Outlet') ?>"><em class="fa fa-home">&nbsp;</em> Outlet</a>
			</li>
			<li class=" <?= ($this->uri->segment(2) == 'Paket')? 'active' : '' ?>">
				<!-- <label class="text-muted center-block">Management</label> -->
				<a href="<?= site_url('Admin/Paket') ?>"><em class="fa fa-database">&nbsp;</em> Paket Cucian</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(2) == 'Member')? 'active' : '' ?>">
				<a href="<?= site_url('Admin/Member') ?>"><em class="fa fa-users">&nbsp;</em> Member</a>
			</li>
			<li class=" <?= ($this->uri->segment(2) == 'User')? 'active' : '' ?>">
				<a href="<?= site_url('Admin/User') ?>"><em class="fa fa-users">&nbsp;</em> Management User</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(2) == 'Profile')? 'active' : '' ?>">
				<a href="<?= site_url('Profile') ?>"><em class="fa fa-user">&nbsp;</em> Profile</a>
			</li>
			<hr>
			<li><a style="color:red" data-toggle="modal" data-target="#logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	<?php
		}else if($this->session->userdata('role') == 'kasir') {
	?>
		<ul class="nav menu">
			<li class=" <?= ($this->uri->segment(2) == 'Home')? 'active' : '' ?>">
				<a href="<?= site_url('Kasir/Home') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(3) == 'Index')? 'active' : '' ?>">
				<!-- <label class="text-muted center-block">Management</label> -->
				<a href="<?= site_url('Kasir/Transaksi/Index') ?>"><em class="glyphicon glyphicon-transfer">&nbsp;</em> Entri Transaksi</a>
			</li>
			<li class=" <?= ($this->uri->segment(3) == 'DataTransaksi')? 'active' : '' ?>">
				<a href="<?= site_url('Kasir/Transaksi/DataTransaksi') ?>"><em class="fa fa-database">&nbsp;</em> Data Transaksi</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(2) == 'Member')? 'active' : '' ?>">
				<a href="<?= site_url('Kasir/Member') ?>"><em class="fa fa-users">&nbsp;</em> Member</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(2) == 'Profile')? 'active' : '' ?>">
				<a href="<?= site_url('Profile') ?>"><em class="fa fa-user">&nbsp;</em> Profile</a>
			</li>
			<hr>
			<li><a style="color:red" data-toggle="modal" data-target="#logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	<?php
		}else{
	?>
		<ul class="nav menu">
			<li class=" <?= ($this->uri->segment(2) == 'Home')? 'active' : '' ?>">
				<a href="<?= site_url('Owner/Home') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>
			</li>
			<hr>
			<li class=" <?= ($this->uri->segment(2) == 'Profile')? 'active' : '' ?>">
				<a href="<?= site_url('Profile') ?>"><em class="fa fa-user">&nbsp;</em> Profile</a>
			</li>
			<hr>
			<li><a style="color:red" data-toggle="modal" data-target="#logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	<?php
		}
		
	?>
</div>