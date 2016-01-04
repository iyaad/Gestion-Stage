<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			
				<div class="col-md-6 col-sm-offset-3 ">
					<div class="card-box m-t-20">
						<h2 class="text-center  m-b-10 ">Informations sur le sujet</h2>
						<div class="p-20">
							<div class="picture text-center container-fluid m-b-10">
								<div class="picture-overlay col-sm-offset-4 col-sm-4">
									<img src="<?= $this->entreprise_model->getAvatarUrl($sujet->entrepriseId) ?>" class="img-responsive" alt="profile-image" width="100" >
									<div class="profile-info-name">
										<h4 class="m-b-5"><b><?= "$sujet->nom" ?></b></h4>
									</div>
								</div>								
							</div>
							<div class="about-info-p">
								<strong>Titre</strong>
								<br>
								<p class="text-muted"><?= $sujet->titre ?></p>
							</div>
							<div class="about-info-p">
								<strong>Description</strong>
								<br>
								<p class="text-muted"><?= $sujet->description ?></p>
							</div>
							<div class="about-info-p">
								<strong>Niveau</strong>
								<br>
								<p class="text-muted"><?= $sujet->filiere.''.$sujet->niveau ?></p>
							</div>
							<?php if(isEtudiant() && !$this->sujet_model->aPostule($sujet->sujetId,currentSession()['id'])): ?>
								<a href="<?= base_url('etudiant/postuler/'.$sujet->sujetId) ?>" class="btn btn-success waves-effect waves-light pull-right">
									<span class="btn-label"><i class="fa fa-check"></i></span> Postuler
								</a>
								<div class="clearfix"></div>
							<?php endif ?>
							
						</div>
					</div>
				</div>				
			
		</div>
	</div>
</div>