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
					ENSAT Stages
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
							<?php if (isEtudiant()): ?>
								<li><?= anchor(currentSession()['username'], '<i class="fa-user fa"></i> Profil de l\'Etudiant', navIsActive('etudiant', 'profile')) ?></li>
								<li><?= anchor('etudiant', '<i class="fa fa-file-text-o"></i> Sujets Disponibles', navIsActive('etudiant', 'index')) ?></li>
								<?php if(isEtudiantEnStage()): ?>
								<li><?= anchor('workspace/accueil/'.currentId(), '<i class="fa fa-home"></i> Workspace', navIsActive('workspace', 'accueil')) ?></li>
								<?php endif ?>
							<?php elseif (isEntreprise()): ?>
								<li><?= anchor('entreprise', '<i class="fa-file-text-o fa"></i> Sujets de Stage', navIsActive('entreprise', 'index')) ?></li>
								<li><?= anchor('entreprise/'.currentSession()['id'], '<i class="fa-users fa"></i> Profil de l\'Entreprise', navIsActive('entreprise', 'profile')) ?></li>
								<li><?= anchor('entreprise/tuteur', '<i class="fa-file-text-o fa"></i> Tuteurs', navIsActive('entreprise', 'tuteur')) ?></li>
							<?php elseif (isSuperviseur()): ?>
								<li><?= anchor('superviseur', '<i class="fa-home fa"></i> Accueil', navIsActive('superviseur', 'index')) ?></li>
								<li><?= anchor('superviseur/tuteurs', '<i class="fa-users fa"></i> Tuteurs', navIsActive('superviseur', 'tuteurs')) ?></li>
							<?php elseif (isChefFiliere()): ?>
								<li><?= anchor('tuteur/profile/'.currentSession()['id'], '<i class="fa-user fa"></i> Profil du Tuteur', navIsActive('tuteur', 'profile')) ?></li>
								<li><?= anchor('tuteur', '<i class="fa-home fa"></i> Acceuil', navIsActive('tuteur', 'index')) ?></li>
								<li><?= anchor('tuteur/finaliser', '<i class="fa-file-text-o fa"></i> Stage à finaliser', navIsActive('tuteur', 'finaliser')) ?></li>
							<?php elseif (isTuteur()): ?>
								<li><?= anchor('tuteur/profile/'.currentSession()['id'], '<i class="fa-user fa"></i> Profil du Tuteur', navIsActive('tuteur', 'profile')) ?></li>
								<?php if(isTuteurEnStage()): ?>
								<li><?= anchor('workspace/tuteur', '<i class="fa fa-home"></i> Workspace', navIsActive('workspace', 'tuteur')) ?></li>
								<?php endif ?>
							<?php elseif (isTuteurExt()): ?>
								<li><?= anchor('tuteur/profile/'.currentSession()['id'], '<i class="fa-user fa"></i> Profil du Tuteur', navIsActive('tuteur', 'profile')) ?></li>
								<?php if(isTuteurExtEnStage()): ?>
								<li><?= anchor('workspace/tuteur', '<i class="fa fa-home"></i> Workspace', navIsActive('workspace', 'tuteur')) ?></li>
								<?php endif ?>		
							<?php endif ?>
							<li><?= anchor('statistiques', '<i class="fa-line-chart fa"></i> Statistiques', navIsActive('statistiques')) ?></li>
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
