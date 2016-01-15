<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="col-md-6 col-sm-offset-3 ">
				<div class="card-box m-t-20">
					<h2 class="text-center  m-b-10 ">
						Informations sur le sujet
						<?php dd($sujet);
							if (currentSession()['id'] == $sujet->entrepriseId): ?>
						<a href="<?= base_url("sujet/edit/$sujet->sujetId") ?>" class="m-l-10"><i class="fa fa-pencil"></i></a>
						<?php endif ?>
					</h2>
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
						<div class="about-info-p">
							<strong>Date de début</strong>
							<br>
							<p class="text-muted"><?= nl2br($sujet->dateDebut) ?></p>
						</div>
						<div class="about-info-p">
							<strong>Période</strong>
							<br>
							<p class="text-muted"><?= nl2br($sujet->periode).' semaines' ?></p>
						</div>
						<div class="about-info-p">
							<strong>Prérequis</strong>
							<br>
							<p class="text-muted"><?= nl2br($sujet->prerequis) ?></p>
						</div>
						<?php if(isEtudiant() && !$this->sujet_model->aPostule($sujet->sujetId, currentSession()['id'])): ?>
						<a href="<?= base_url('sujet/postuler/'.$sujet->sujetId) ?>" class="btn btn-success waves-effect waves-light pull-right">Postuler</a>
						<div class="clearfix"></div>
						<?php elseif (isEtudiant() && $this->sujet_model->aPostule($sujet->sujetId, currentId(), 'W')): ?>
						<div class="alert alert-warning"><strong>État:</strong> En attente de la confirmation de l'entreprise</div>
						<?php elseif(isEtudiant() && $this->sujet_model->estAccepte($sujet->sujetId, currentId())): ?>
						<a href="<?= base_url('sujet/confirmePostulat/'.$sujet->sujetId.'/'.currentId()).'/'.$sujet->entrepriseId ?>" class="btn btn-success waves-effect waves-light pull-right">Confirmer</a>
						<div class="clearfix"></div>
						<?php elseif (isEtudiant() && $this->sujet_model->aPostule($sujet->sujetId, currentId(), 'B')): ?>
						<div class="alert alert-warning"><strong>État:</strong> En attente de la finalisation auprès du chef de la filière.</div>
						<?php endif ?>
					</div>
				</div>
				<?php if(isEntreprise() && $sujet->entrepriseId==currentSession()['id'] )  : ?>
				<div class="card-box m-t-20">
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">
									Nom postulant
									<span class="footable-sort-indicator"></span>
								</th>
								<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">
									État
									<span class="footable-sort-indicator"></span>
								</th>
							</tr>
							<?php foreach ($postulats as $e): ?>
							<tr>
								<td><a href="base_url('$e->cne)"><?= "$e->nom $e->prenom" ?></a></td>
								<td>
									<a href="<?= base_url('sujet/acceptePostulat/'.$e->sujetid.'/'.$e->etudiantId.'/'.currentSession()['id']) ?>" class="btn btn-success waves-effect waves-light pull">
										<span class="btn-label"><i class="fa fa-check"></i></span> Accepter
									</a>
									<a href="<?= base_url('sujet/refusePostulat/'.$e->sujetid.'/'.$e->etudiantId) ?>" class="btn btn-icon btn-danger waves-effect waves-light">
										<i class="fa fa-remove"></i>
								</td>								
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
				<?php endif ?>
			</div>			
		</div>
	</div>
</div>