<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center">Modifier vos informations</h3>
		</div> 
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group ">
					<label class="col-md-4 control-label">Nom complet</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->nom.' '.$etudiant->prenom?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">CNE</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->cne?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">Filiere</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->filiere?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">Niveau</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->niveau?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">Date de Naissance</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->dateNaissance?></p>     
                    </div>
				</div>
			</form>
				

			
			<?= form_open_multipart(base_url($etudiant->cne.'/edit'),'class="form-horizontal"') ?>
				<div class="form-group <?= form_error('adresse') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Adresse</label>
					<div class="col-md-8">
                        <input type="text" class="form-control" name="adresse" value="<?= $etudiant->adresse ?>">
						<?= form_error('adresse') ?>
                    </div>
				</div>
				<div class="form-group <?= form_error('ville') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Ville</label>
					<div class="col-md-8">
                        <input type="text" class="form-control" name="ville" value="<?= $etudiant->ville ?>">
						<?= form_error('ville') ?>
                    </div>
				</div>
				<div class="form-group <?= form_error('pays') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Pays</label>
					<div class="col-md-8">
                        <input type="text" class="form-control" name="pays" value="<?= $etudiant->pays ?>">
						<?= form_error('pays') ?>
                    </div>
				</div>
				<div class="form-group <?= form_error('new_password') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Nouveau mot de passe (facultatif)</label>
					<div class="col-md-8">
                        <input type="password" class="form-control"  name="new_password">
						<?= form_error('new_password') ?>
                    </div>
				</div>
				<div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
					<label class="col-sm-4">Votre photo <br><span class="text-muted">(format .jpg max: 1 Mo)</span></label>
					<input type="file" class="filestyle" data-size="sm" name="photo" id="filestyle-5" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">
					<div class="bootstrap-filestyle input-group">
						<input type="text" class="form-control input-sm" placeholder="" disabled="">
                    	<span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-5" class="btn btn-default btn-sm"><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choisir fichier</span></label></span>
                    </div>
					<?= form_error('photo') ?>
				</div>
				<div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Mot de passe actuel</label>
					<div class="col-md-8">
                        <input type="password" class="form-control"  name="password">
						<?= form_error('password') ?>
                    </div>
				</div>

				<div class="form-group text-center m-t-40">
					<button type="submit" class="btn btn-primary waves-effect waves-light">Mettre à jour</button>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
</div>