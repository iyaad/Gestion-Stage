<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Statistiques</h4>
					<p class="text-muted page-title-alt">Voici des statistiques qui vous concernent</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="widget-bg-color-icon card-box">
						<div class="bg-icon bg-icon-purple pull-left">
							<i class="md md-business text-purple"></i>
						</div>
						<div class="text-right">
							<h3 class="text-dark"><b class="counter"><?= $ent_insc ?></b></h3>
							<p class="text-muted">Entreprises</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget-bg-color-icon card-box">
						<div class="bg-icon bg-icon-purple pull-left">
							<i class="md md-school text-purple"></i>
						</div>
						<div class="text-right">
							<h3 class="text-dark"><b class="counter"><?= $this->statistique_model->nbEtudiant() ?></b></h3>
							<p class="text-muted">Etudiants</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget-bg-color-icon card-box">
						<div class="bg-icon bg-icon-purple pull-left">
							<i class="md md-local-library text-purple"></i>
						</div>
						<div class="text-right">
							<h3 class="text-dark"><b class="counter"><?= $this->statistique_model->nbTuteur() ?></b></h3>
							<p class="text-muted">Tuteurs</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget-bg-color-icon card-box">
						<div class="bg-icon bg-icon-purple pull-left">
							<i class="md md-people-outline text-purple"></i>
						</div>
						<div class="text-right">
							<h3 class="text-dark"><b class="counter"><?= $this->statistique_model->nbTuteurExt() ?></b></h3>
							<p class="text-muted">Tuteurs Externes </p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card-box col-md-4">
					<p class="font-600">Etudiants en recherche de stages <span class="text-primary pull-right"><?= $this->statistique_model->chefFiliere()[0] * 100 ?> %</span></p>
					<div class="progress m-b-30">
					  <div class="progress-bar progress-bar-primary progress-animated wow animated animated" role="progressbar" aria-valuenow="<?= $this->statistique_model->chefFiliere()[0] * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $this->statistique_model->chefFiliere()[0] * 100 ?>%; visibility: visible; animation-name: animationProgress;">
					  </div><!-- /.progress-bar .progress-bar-danger -->
					</div><!-- /.progress .no-rounded -->
					
					<p class="font-600">Etudiants en cours de stage<span class="text-pink pull-right"><?= $this->statistique_model->chefFiliere()[1] * 100 ?> %</span></p>
					<div class="progress m-b-30">
					  <div class="progress-bar progress-bar-pink progress-animated wow animated animated" role="progressbar" aria-valuenow="<?= $this->statistique_model->chefFiliere()[1] * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $this->statistique_model->chefFiliere()[1] * 100 ?>%; visibility: visible; animation-name: animationProgress;">
					  </div><!-- /.progress-bar .progress-bar-pink -->
					</div><!-- /.progress .no-rounded -->
					
					<p class="font-600">Etudiants ayant fini leur stage <span class="text-info pull-right"><?= $this->statistique_model->chefFiliere()[2] * 100 ?> %</span></p>
					<div class="progress m-b-30">
					  <div class="progress-bar progress-bar-info progress-animated wow animated animated" role="progressbar" aria-valuenow="<?= $this->statistique_model->chefFiliere()[2] * 100 ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $this->statistique_model->chefFiliere()[2] * 100 ?>%; visibility: visible; animation-name: animationProgress;">
					  </div><!-- /.progress-bar .progress-bar-info -->
					</div><!-- /.progress .no-rounded -->
				</div>
				<!-- /.progress .no-rounded -->
			</div>
		</div>
	</div>
</div>