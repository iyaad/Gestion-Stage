<div class="card-box col-sm-5">
	<div class="panel-heading"> 
		<h3 class="text-center">Ajouter un Chef de Filiere</h3>
	</div>
	<div class="panel-body">
		<?= form_open('superviseur/ajouter_chef_filiere', 'class="form-horizontal"') ?>
			<div class="form-group <?= form_error('departement') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="departement">Département</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="departement">
					<?= form_error('departement') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('filiere') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="filiere">Filiere</label>
				<div class="col-md-9">
					<select name="filiere" class="form-control">
						<option value="">Choisissez une filiere</option>
						<?php foreach ($filieres as $f): ?>
						<option value="<?= $f->filiereId ?>" <?= set_select('filiere', $f->code) ?>><?= $f->titre ?></option>
						<?php endforeach ?>
					</select>
					<?= form_error('filiere') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('nom') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="nom">Nom</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nom">
					<?= form_error('nom') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('prenom') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="prenom">Prénom</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="prenom">
					<?= form_error('prenom') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('email') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="email">Email</label>
				<div class="col-md-9">
					<input type="email" class="form-control" name="email">
					<?= form_error('email') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('numtel') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="numtel">Téléphone</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="numtel">
					<?= form_error('numtel') ?>
				</div>
			</div>
			<button class="btn btn-primary pull-right m-t-10" type="submit">Ajouter</button>
		</form>
	</div>
</div>