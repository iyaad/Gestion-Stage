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
<body class="fixed-left p-30 p-l-0 p-r-0">
	<div class="wraper">
		<?php if (empty($NOTOPBAR)): ?>
		<div class="topbar">
			<!-- LOGO -->
			<div class="topbar-left">
				<div class="text-center">
					<a href="<?= base_url() ?>" class="logo">
						Plateforme Stages
					</a>
				</div>
			</div>

			<!-- Infos utilisateur en cours -->
			<div class="navbar navbar-default" role="navigation">
				<div class="container">
					<ul class="nav navbar-nav navbar-right pull-right">
						<?php if (loggedIn()): ?>
							<li><?= anchor('logout', '<i class="fa fa-power-off m-r-10"></i> Déconnexion') ?></li>
						<?php else: ?>
							<li><?= anchor('login', 'Se connecter') ?></li>
							<li><?= anchor('signup', 'Inscription Entreprises') ?></li>
						<?php endif ?>
					</ul>
				</div>
			</div>
		</div><!-- /.topbar -->
		<?php endif ?>

		<?php if (empty($NOSIDEBAR)): ?>
		<div class="left side-menu">
			<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 297px;">
				<div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 297px;">

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
