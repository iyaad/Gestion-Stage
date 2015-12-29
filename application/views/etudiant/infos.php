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
						<?= form_error('adresse') ?>
                        <input type="text" class="form-control" name="adresse" value="<?= $etudiant->adresse ?>">
                    </div>
				</div>
				<div class="form-group <?= form_error('new_password') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Nouveau mot de passe (facultatif)</label>
					<div class="col-md-8">
						<?= form_error('new_password') ?>
                        <input type="password" class="form-control"  name="new_password">
                    </div>
				</div>
				<div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Votre photo <br><span class="text-muted">(format .jpg max: 1 Mo)</span></label>
					<div class="col-md-8">
						<?= form_error('photo') ?>
                        <input type="file" class="form-control" name="photo">
                    </div>
				</div>
				<div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Mot de passe actuel</label>
					<div class="col-md-8">
						<?= form_error('password') ?>
                        <input type="password" class="form-control"  name="password">
                    </div>
				</div>

				<div class="form-group text-center m-t-40">
					<button type="submit" class="btn btn-purple waves-effect waves-light">Mettre a jour</button>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
</div>