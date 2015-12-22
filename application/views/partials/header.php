<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= asset_url('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/core.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/components.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/icons.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/pages.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/responsive.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('plugins/morris/morris.css') ?>">

	<title><?= $title ?></title>
</head>
<body class="fixed-left">
	<div class="wraper">
		<?php if (empty($NOTOPBAR)): ?>
		<div class="topbar">
			<!-- LOGO -->
			<div class="topbar-left">
				<div class="text-center">
					<a href="<?= base_url() ?>" class="logo">
						<i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span>
					</a>
				</div>
			</div>

<<<<<<< HEAD
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Link</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>

=======
			<!-- Button mobile view to collapse sidebar menu -->
			<div class="navbar navbar-default" role="navigation">
				<div class="container">
					
				</div>
			</div>
		</div><!-- /.topbar -->
		<?php endif ?>

		<?php if (empty($NOSIDEBAR)): ?>
		<div class="left side-menu">
			<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 297px;">
				<div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 297px;">
					<div class="user-details">
							<div class="pull-left">
									<img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
							</div>
							<div class="user-info">
									<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
											<ul class="dropdown-menu">
													<li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
													<li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
													<li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
													<li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
											</ul>
									</div>
									<p class="text-muted m-0">Administrator</p>
							</div>
					</div>
					<!--- Divider -->
					<div id="sidebar-menu">
						<ul>
							<li class="text-muted menu-title">Navigation</li>
								<li class="has_sub">
										<a href="#" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a>
										<ul class="list-unstyled" style="">
											<li><a href="index.html">Dashboard 1</a></li>
											<li><a href="dashboard_2.html">Dashboard 2</a></li>
											<li><a href="dashboard_3.html">Dashboard 3</a></li>
										</ul>
								</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="slimScrollBar" style="width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 320.224px; visibility: visible; background: rgb(220, 220, 220);"></div>
				<div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
			</div>
		</div><!-- /.side-menu -->
		<?php endif ?>
>>>>>>> 55754f49018516a279ef0101c8bef7990207fbe5
