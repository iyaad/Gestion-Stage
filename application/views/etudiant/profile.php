<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="card-box m-t-20">
						<div class="picture text-center container-fluid m-b-20">
							<div class="bg-picture-overlay">
								<img src="<?= $this->etudiant_model->getAvatarUrl($etudiant->cne) ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
							</div>
							<div class="profile-info-name">
								<h4 class="m-b-5"><b><?= "$etudiant->nom $etudiant->prenom" ?></b></h4>
								<p class="text-muted"><i class="fa fa-map-marker"></i> <?= "$etudiant->ville, $etudiant->pays" ?></p>
							</div>
						</div>
						<h4 class="m-t-0 header-title">
							<b>Informations Personnelles</b>
							<?php if (currentSession()['id'] == $etudiant->etudiantId): ?>
							<a href="<?= base_url("$etudiant->cne/edit") ?>"><i class="fa fa-pencil m-l-10"></i></a>
							<?php endif ?>
						</h4>
						<div class="p-20">
							
							<div class="about-info-p">
								<strong>CNE</strong>
								<br>
								<p class="text-muted"><?= $etudiant->cne?></p>
							</div>
							<div class="about-info-p m-b-0">
								<strong>Niveau</strong>
								<br>
								<p class="text-muted"><?= "$etudiant->filiere $etudiant->niveau" ?></p>
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
						<?php if (file_exists("./uploads/cv/$etudiant->cne.pdf")): ?>
						<div class="panel-heading">
							<h4>Curriculum Vitae</h4>
						</div>
						<div class="panel-body">
							<object data="<?= base_url("uploads/cv/$etudiant->cne.pdf") ?>" type="application/pdf" width="100%" height="504"></object>
						</div>
						<?php else: ?>
						<div class="panel-heading">
							<h4>Uploader votre CV</h4>
						</div>
						<div class="panel-body">
							<?= form_open_multipart("etudiant/uploadCV/$etudiant->cne") ?>
								<div class="form-group ">
									<label for="cv">Fichier .pdf à importer</label>
									<input type="file" name="cv">
								</div>
								<div class="form-group text-center m-t-40 col-sm-4">
									<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Upload</button>
								</div>
							</form>
						</div>
						<?php endif ?>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

