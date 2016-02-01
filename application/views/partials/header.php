<!DOCTYPE html>
<html lang="en" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= asset_url('plugins/morris/morris.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/core.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/components.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/icons.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/pages.css') ?>">
	<link rel="stylesheet" href="<?= asset_url('css/responsive.css') ?>">
	<script type="text/javascript" src="<?= asset_url('js/modernizr.min.js') ?>"></script>
	<title><?= $title ?> | ENSAT Stages</title>
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
							<?php if (isEtudiant()): ?>
							<li class="dropdown hidden-xs">
								<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">
									<i class="icon-bell"></i> <span class="badge badge-xs badge-danger"><?= count($this->notification_model->dailyNotifs()) ?></span><!-- count($this->notification_model->dailyNotifs()) -->
								</a>
								<ul class="dropdown-menu dropdown-menu-lg">
									<li class="notifi-title">Notifications</li>
									<li class="list-group nicescroll notification-list" tabindex="5000" style="overflow: hidden; outline: none;">
										<!-- list item-->
										<?php foreach ($this->notification_model->dailyNotifs() as $n): ?>
										<a href="<?= $n->url ?>" <?php if ($n->title == 'Date de soutenance!') echo 'data-toggle="modal" data-target="#soutenance"' ?> class="list-group-item">
										  <div class="media">
											 <div class="pull-left p-r-10">
												<em class="fa fa-<?= $n->icon ?> fa-2x text-primary"></em>
											 </div>
											 <div class="media-body">
												<h5 class="media-heading"><?= $n->title ?></h5>
												<p class="m-0">
													<small><?= $n->desc ?></small>
												</p>
											 </div>
										  </div>
										</a>
										<?php endforeach ?>
									</li>
								</ul>
							</li>
							<?php endif ?>
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
								<li><?= anchor('superviseur/jury', '<i class="fa-users fa"></i> Jurys', navIsActive('superviseur', 'jury')) ?></li>
							<?php elseif (isChefFiliere()): ?>
								<li><?= anchor('tuteur', '<i class="fa-home fa"></i> Acceuil', navIsActive('tuteur', 'index')) ?></li>
								<li><?= anchor('tuteur/profile/'.currentSession()['id'], '<i class="fa-user fa"></i> Profil du Tuteur', navIsActive('tuteur', 'profile')) ?></li>
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


		<div id="soutenance" class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Choisissez une date pour votre soutenance</h4>
		      </div>
		      <div class="modal-body">
		        <?= form_open('etudiant/finaliserSoutenance', 'class="form-horizontal" id="dateSoutenance"') ?>
			        <div class="form-group <?= form_error('date') ? 'has-error' : '' ?>">
						<?= form_error('date') ?>
						<input class="form-control" type="text" placeholder="Date de Soutenance (jj/mm/yyyy)" name="date" value="<?= set_value('ate de debut') ?>" >
					</div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
		        <button form="dateSoutenance" type="submit" class="btn btn-primary">Valider</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
