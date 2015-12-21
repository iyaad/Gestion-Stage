<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center"> Finaliser votre inscription <strong class="text-custom"></strong> </h3>
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
				

			
			<?= form_open("Etudiant/",'class="form-horizontal"') ?>
				<div class="form-group ">
					<label class="col-sm-4 control-label">Mot de passe actuel</label>
					<div class="col-md-8">
						<?= form_error('password') ?>
                        <input type="password" class="form-control"  name="password">
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-sm-4 control-label">Nouveau mot de passe</label>
					<div class="col-md-8">
						<?= form_error('new_password') ?>
                        <input type="password" class="form-control"  name="new_password">
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-sm-4 control-label">Adresse</label>
					<div class="col-md-8">
						<?= form_error('adresse') ?>
                        <input type="text" class="form-control" name="adresse">
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-sm-4 control-label">Votre photo</label>
					<div class="col-md-8">
						<?= form_error('photo') ?>
                        <input type="file" class="form-control" name="photo">
                    </div>
				</div>

				



				<p><?= isset($error) ? $error : '' ?></p>
				<div class="form-group text-center m-t-40">
					<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Importer</button>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
</div>