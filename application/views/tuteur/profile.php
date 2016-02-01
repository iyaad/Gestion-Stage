<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="col-md-6 col-sm-offset-3 ">
				<div class="card-box m-t-20 text-center">
					<div class="picture text-center container-fluid m-b-20">
						<div class="bg-picture-overlay">
							<img src="<?= $this->etudiant_model->getAvatarUrl($tuteur->tuteurId) ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
						</div>
						<div class="profile-info-name">
							<h4 class="m-b-5"><b><?= "$tuteur->nom $tuteur->prenom" ?></b></h4>
							
						</div>
					</div>
					<h2 class="text-center  m-b-10 ">
						Coordonnées du tuteur
					</h2>
					<div class="p-20">
						<div class="about-info-p">
							<strong>Nom</strong>
							<br>
							<p class="text-muted"><?= $tuteur->nom . ' ' . $tuteur->prenom ?></p>
						</div>
						<div class="about-info-p">
							<strong>Département</strong>
							<br>
							<p class="text-muted"><?= $tuteur->departement ?></p>
						</div>
						<div class="about-info-p">
							<strong>Email</strong>
							<br>
							<p class="text-muted"><?= $this->user_model->getUser(['userId'=>$tuteur->tuteurId ])->email ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
