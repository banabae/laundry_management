<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="nav navbar-brand" href="<?= site_url('Admin/Home') ?>">
				<img src="<?= site_url('assets/img/laundry logo.png')?>" width="32px" height="32px" style="float:left; margin-right: -7px">
				<!-- <span style="margin-top: 10px">Laundry</span> -->
			</a>
			<a class="nav navbar-brand" href="<?= site_url('Admin/Home') ?>" style="margin-top: 6px">
				Buble <span style="margin-top: 10px">Laundry</span>
			</a>
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<!-- <h5 style="color : white; margin: 10px"><em id="jam"></em> : <em id="menit"></em> : <em id="detik"></em></h5> -->
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-user"></em>
					</a>
					<ul class="dropdown-menu dropdown-messages  dropdown-menu-right">
						<li>
							<div class="dropdown btn btn-block">
								<a href="<?= site_url('Profile') ?>">
									<h5 class="text-center">Profile</h5>
								</a>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="dropdown btn btn-block btn-danger">
								<h5 class="text-center" style="color: white" data-toggle="modal" data-target="#logout">Logout</h5>
								<!-- <a href="">
								</a> -->
							</div>
						</li>
					</ul>
				</li>
				<!-- <li class="dropdown">
					<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-user"></em>
					</a>
				</li> -->
				<!-- <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
					<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
				</a>
					<ul class="dropdown-menu dropdown-messages">
						<li>
							<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
								<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">3 mins ago</small>
									<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
								<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
								<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">1 hour ago</small>
									<a href="#">New message from <strong>Jane Doe</strong>.</a>
								<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
							</div>
						</li>
						<li class="divider"></li>
						<li>
							<div class="all-button"><a href="#">
								<em class="fa fa-inbox"></em> <strong>All Messages</strong>
							</a></div>
						</li>
					</ul>
				</li>
				<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
					<em class="fa fa-bell"></em><span class="label label-info">5</span>
				</a>
					<ul class="dropdown-menu dropdown-alerts">
						<li><a href="#">
							<div><em class="fa fa-envelope"></em> 1 New Message
								<span class="pull-right text-muted small">3 mins ago</span></div>
						</a></li>
						<li class="divider"></li>
						<li><a href="#">
							<div><em class="fa fa-heart"></em> 12 New Likes
								<span class="pull-right text-muted small">4 mins ago</span></div>
						</a></li>
						<li class="divider"></li>
						<li><a href="#">
							<div><em class="fa fa-user"></em> 5 New Followers
								<span class="pull-right text-muted small">4 mins ago</span></div>
						</a></li>
					</ul>
				</li> -->
			</ul>
		</div>
	</div><!-- /.container-fluid -->
</nav>