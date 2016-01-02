<div class="content-page">
	<div class="content">
		<div class="wrapper-page">
			<div class="card-box">
				<div class="panel-heading"> 
					<h3 class="text-center">Modifier vos informations</h3>
				</div> 
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group ">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-8">
								<p class="form-control-static"><?= $entreprise->nom ?></p>     
							</div>
						</div>
						<div class="form-group ">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-8">
								<p class="form-control-static"><?= $entreprise->email?></p>
							</div>
						</div>
					</form>
					
					<?= form_open_multipart(base_url('entreprise/'.$entreprise->entrepriseId.'/edit'),'class="form-horizontal"') ?>
						<div class="form-group <?= form_error('numTel') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Téléphone</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="numTel" value="<?= $entreprise->numTel ?>">
								<?= form_error('numTel') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('adresse') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Adresse</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="adresse" value="<?= $entreprise->adresse ?>">
								<?= form_error('adresse') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('ville') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Ville</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="ville" value="<?= $entreprise->ville ?>">
								<?= form_error('ville') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('pays') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Pays</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="pays" value="<?= $entreprise->pays ?>">
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
						<div class="form-group <?= form_error('logo') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Votre logo<br><span class="text-muted">(format .jpg ou .png max: 1 Mo)</span></label>
							<div class="col-md-8">
								<input type="file" class="form-control" name="logo">
								<?= form_error('logo') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Mot de passe actuel</label>
							<div class="col-md-8">
								<input type="password" class="form-control"  name="password">
								<?= form_error('password') ?>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<button type="submit" class="btn btn-purple waves-effect waves-light">Mettre a jour</button>
						</div>
					</form>
				</div>
			</div><!-- /.card-box -->
		</div>
	</div>
</div>