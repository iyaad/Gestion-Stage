<h3 class="text-center">Ajouter une Filiere</h3>
	
		<?= form_open('superviseur/ajouter_filiere', 'class="form-horizontal"') ?>
			<div class="form-group <?= form_error('titre') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="titre">Titre</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="titre">
					<?= form_error('titre') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('code') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="code">Code</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="code">
					<?= form_error('code') ?>
				</div>
			</div>
			<button class="btn btn-primary pull-right m-t-10" type="submit">Ajouter</button>
			<div class="clearfix"></div>
		</form>