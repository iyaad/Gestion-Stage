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
							<i class="md md-equalizer text-purple"></i>
						</div>
						<div class="text-right">
							<h3 class="text-dark"><b class="counter"><?= $ent_insc ?></b></h3>
							<p class="text-muted">Entreprises Inscrites</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget-bg-color-icon card-box">
						<div class="bg-icon bg-icon-purple pull-left">
							<i class="md md-equalizer text-purple"></i>
						</div>
						<div class="text-right">
							<h3 class="text-dark"><b class="counter"><?= $this->statistique_model->nbEtudiant() ?></b></h3>
							<p class="text-muted">Etudiants </p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget-bg-color-icon card-box">
						<div class="bg-icon bg-icon-purple pull-left">
							<i class="md md-equalizer text-purple"></i>
						</div>
						<div class="text-right">
							<h3 class="text-dark"><b class="counter"><?= $this->statistique_model->nbTuteur() ?></b></h3>
							<p class="text-muted">Tuteurs Inscrits</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget-bg-color-icon card-box">
						<div class="bg-icon bg-icon-purple pull-left">
							<i class="md md-equalizer text-purple"></i>
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
				<?php if(isChefFiliere()): ?>
					<div class="card-box col-md-4">
                                            
                    <p class="font-600">Etudiant en recherche de Stage <span class="text-primary pull-right"<?php dd($this->statistique_model->chefFiliere()[0])?>%</span></p>
                    <div class="progress m-b-30">
                      <div class="progress-bar progress-bar-primary progress-animated wow animated animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: visible; animation-name: animationProgress;">
                      </div><!-- /.progress-bar .progress-bar-danger -->
                    </div><!-- /.progress .no-rounded -->
                    
                    <p class="font-600">iBooks <span class="text-pink pull-right">50%</span></p>
                    <div class="progress m-b-30">
                      <div class="progress-bar progress-bar-pink progress-animated wow animated animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; visibility: visible; animation-name: animationProgress;">
                      </div><!-- /.progress-bar .progress-bar-pink -->
                    </div><!-- /.progress .no-rounded -->
                    
                    <p class="font-600">iPhone 5s <span class="text-info pull-right">70%</span></p>
                    <div class="progress m-b-30">
                      <div class="progress-bar progress-bar-info progress-animated wow animated animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%; visibility: visible; animation-name: animationProgress;">
                      </div><!-- /.progress-bar .progress-bar-info -->
                    </div><!-- /.progress .no-rounded -->
                    
                    <p class="font-600">iPhone 6 <span class="text-warning pull-right">65%</span></p>
                    <div class="progress m-b-30">
                      <div class="progress-bar progress-bar-warning progress-animated wow animated animated" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%; visibility: visible; animation-name: animationProgress;">
                      </div><!-- /.progress-bar .progress-bar-warning -->
                    </div><!-- /.progress .no-rounded -->
                    
                    <p class="font-600">iPhone 6s <span class="text-success pull-right">40%</span></p>
                    <div class="progress m-b-30">
                      <div class="progress-bar progress-bar-success progress-animated wow animated animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%; visibility: visible; animation-name: animationProgress;">
                      </div><!-- /.progress-bar .progress-bar-success -->
                    </div>
                    </div>
                    <!-- /.progress .no-rounded -->
                <?php endif ; ?>
			</div>
		</div>
	</div>
</div>