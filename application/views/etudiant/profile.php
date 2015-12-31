<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="col-sm-12" >
				<div class="bg-picture text-center container-fluid">
					<div class="bg-picture-overlay"></div>
					<div class="profile-info-name">
						<img src="<?= $this->etudiant_model->getAvatarUrl($etudiant->cne) ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
						<h4 class="m-b-5"><b><?= "$etudiant->nom $etudiant->prenom" ?></b></h4>
						<p class="text-muted"><i class="fa fa-map-marker"></i> Tanger, Maroc</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="card-box m-t-20">
						<h4 class="m-t-0 header-title">
							<b>Informations Personnelles</b>
							<?php if (currentSession()['id'] == $etudiant->etudiantId): ?>
							<a href="<?= base_url("$etudiant->cne/edit") ?>"><i class="fa fa-pencil m-l-10"></i></a>
							<?php endif ?>
						</h4>
						<div class="p-20">
							<div class="about-info-p">
								<strong>Nom Complet</strong>
								<br>
								<p class="text-muted"><?= $etudiant->nom.' '.$etudiant->prenom?></p>
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
							<div class="about-info-p">
								<strong>Email</strong>
								<br>
								<p class="text-muted"><?= $etudiant->email?></p>
							</div>
							<div class="about-info-p m-b-0">
								<strong>Adresse</strong>
								<br>
								<p class="text-muted"><?= $etudiant->adresse?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card-box m-t-20">
						<object data="<?= base_url('uploads/CV/'.$etudiant->cne.'.pdf') ?>" type="application/pdf" width="100%" height="483">
 
							<p>It appears you don't have a PDF plugin for this browser.
							No biggie... you can <a href="pdf/aRios.pdf">click here to
							download the PDF file.</a></p>
						  
						</object>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

