<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Statistiques</h4>
					<p class="text-muted page-title-alt">Voici des statistiques générales sur nos utilisateurs.</p>
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
							<i class="md md-school text-custom"></i>
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
							<i class="md md-local-library text-success"></i>
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
							<i class="md md-people-outline text-info"></i>
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
				<div class="card-box col-sm-4 col-sm-offset-1">
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
				<div class="col-sm-4 col-sm-offset-2">
					<div class="card-box">
						<h4 class="text-dark header-title m-t-0 m-b-30">Sujets de stages</h4>

						<div class="widget-chart text-center">
							<div style="display:inline;width:150px;height:150px;">
								<input class="knob" data-width="150" data-height="150" data-linecap="round" data-fgcolor="#fb6d9d" value="<?= $this->statistique_model->sujets()[0] ?>" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".15" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(251, 109, 157); padding: 0px; -webkit-appearance: none; background: none;">
							</div>
							<h5 class="text-muted m-t-20">Total des postulations</h5>
							<h2 class="font-600"><?= $this->statistique_model->sujets()[1] ?></h2>
							<ul class="list-inline m-t-15">
								<li>
									<h5 class="text-muted m-t-20">Postulations / Sujet</h5>
									<h4 class="m-b-0"><?= $this->statistique_model->sujets()[2] * 100 ?> %</h4>
								</li>
								<li>
									<h5 class="text-muted m-t-20">Stagières</h5>
									<h4 class="m-b-0"><?= $this->statistique_model->sujets()[3] ?></h4>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
