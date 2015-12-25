<div class="card-box col-sm-6">
	<div class="panel-heading"> 
		<h3 class="text-center">Ajouter un Chef de Filiere</h3>
	</div>
	<div class="panel-body">
		<?= form_open('superviseur/ajouter_chef_filiere', 'class="form-horizontal"') ?>
			<div class="form-group ">
				<label class="col-md-3 control-label" for="departement">Département</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="departement">
				</div>
			</div>
			<div class="form-group ">
				<label class="col-md-3 control-label" for="filiere">Filiere</label>
				<div class="col-md-9">
					<select name="filiere" class="form-control">
						<option value="">Choisissez une filiere</option>
						<?php foreach ($filieres as $f): ?>
						<option value="<?= $f->code ?>"><?= $f->titre ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-md-3 control-label" for="nom">Nom</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="nom">
					<?= form_error('nom', '<div class="error">', '</div>') ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-md-3 control-label" for="prenom">Prénom</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="prenom">
				</div>
			</div>
			<div class="form-group ">
				<label class="col-md-3 control-label" for="email">Email</label>
				<div class="col-md-9">
					<input type="email" class="form-control" name="email">
				</div>
			</div>
			<div class="form-group ">
				<label class="col-md-3 control-label" for="numtel">Téléphone</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="numtel">
				</div>
			</div>
			<button class="btn btn-primary pull-right m-t-10" type="submit">Ajouter</button>
		</form>
	</div>
</div>