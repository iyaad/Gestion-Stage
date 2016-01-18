<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-offset-3">
					<div class="card-box m-t-20">
						<div class="picture text-center container-fluid m-b-20">
							<div class="bg-picture-overlay">
								<img src="<?= $this->entreprise_model->getAvatarUrl($entreprise->entrepriseId) ?>" class="img-thumbnail img-responsive" width="120" alt="profile-image">
							</div>
							<div class="profile-info-name">
								<h4 class="m-b-5"><b><?= "$entreprise->nom" ?></b></h4>
								<p class="text-muted"><i class="fa fa-map-marker"></i> <?= "$entreprise->ville, $entreprise->pays" ?></p>
							</div>
						</div>
						<h4 class="m-t-0 header-title">
							<b>Coordonnées</b>
							<?php if (currentSession()['id'] == $entreprise->entrepriseId): ?>
							<a href="<?= base_url("entreprise/$entreprise->entrepriseId/edit") ?>"><i class="fa fa-pencil m-l-10"></i></a>
							<?php endif ?>
						</h4>
						<div class="p-20">
							<div class="about-info-p">
								<strong>Email</strong>
								<br>
								<p class="text-muted"><?= $entreprise->email ?></p>
							</div>
							<div class="about-info-p">
								<strong>Téléphone</strong>
								<br>
								<p class="text-muted"><?= $entreprise->numTel?></p>
							</div>
							<?php if (!empty($entreprise->fax)): ?>
							<div class="about-info-p m-b-0">
								<strong>Fax</strong>
								<br>
								<p class="text-muted"><?= $entreprise->fax?></p>
							</div>
							<?php endif ?>
							<div class="about-info-p">
								<strong>Adresse</strong>
								<br>
								<p class="text-muted"><?= $entreprise->adresse?></p>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>