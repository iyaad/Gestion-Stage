<div class="card-box" >
	<div class="bg-picture text-center">
		<div class="bg-picture-overlay"></div>
		<div class="profile-info-name">
			<img src="<?= asset_url('images/avatar-1.jpg')?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
			<h4 class="m-b-5"><b><?= "$etudiant->nom $etudiant->prenom" ?></b></h4>
			<p class="text-muted"><i class="fa fa-map-marker"></i> Tanger, Maroc</p>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card-box m-t-20">
			<h4 class="m-t-0 header-title"><b>Informations Personnelles</b></h4>
			<div class="p-20">
				<div class="about-info-p">
					<strong>Nom Complet</strong>
					<br>
					<p class="text-muted"><?= $etudiant->nom.''.$etudiant->prenom?></p>
				</div>
				<div class="about-info-p">
					<strong>CNE</strong>
					<br>
					<p class="text-muted"><?= $etudiant->cne?></p>
				</div>
				<div class="about-info-p">
					<strong>Filiere</strong>
					<br>
					<p class="text-muted"><?= $etudiant->filiere?></p>
				</div>
				<div class="about-info-p m-b-0">
					<strong>Niveau</strong>
					<br>
					<p class="text-muted"><?= $etudiant->niveau?></p>
				</div>
				<div class="about-info-p m-b-0">
					<strong>Date de Naissance</strong>
					<br>
					<p class="text-muted"><?= $etudiant->dateNaissance?></p>
				</div>
				<div class="about-info-p m-b-0">
					<strong>Adresse</strong>
					<br>
					<p class="text-muted"><?= $etudiant->adresse?></p>
				</div>
			</div>
		</div>
	</div>	
</div>
