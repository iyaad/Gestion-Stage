<h3 class="text-center">Ajouter un tuteur </h3>

<?= form_open('superviseur/ajouter_tuteur', 'class="form-horizontal col-sm-6 col-sm-offset-3"') ?>
	<div class="form-group <?= form_error('nom') ? 'has-error' : '' ?>">
		<?= form_error('nom') ?>
		<input class="form-control" type="text" placeholder="Nom" name="nom" value="<?= set_value('nom') ?>" autofocus>
	</div>	
	<div class="form-group <?= form_error('prenom') ? 'has-error' : '' ?>">
		<?= form_error('prenom') ?>
		<input class="form-control" type="text" placeholder="Prenom" name="prenom" value="<?= set_value('prenom') ?>" autofocus>
	</div>
	<div class="form-group <?= form_error('departement') ? 'has-error' : '' ?>">
		<?= form_error('departement') ?>
		<input class="form-control" type="text" placeholder="Département" name="departement" value="<?= set_value('departement') ?>" autofocus>
	</div>
	<div class="form-group <?= form_error('numtel') ? 'has-error' : '' ?>">
		<?= form_error('numtel') ?>
		<input class="form-control" type="text" placeholder="Telephone" name="numtel" value="<?= set_value('numtel') ?>" autofocus>
	</div>
	<div class="form-group <?= form_error('email') ? 'has-error' : '' ?>">
		<?= form_error('email') ?>
		<input class="form-control" type="text" placeholder="Email" name="email" value="<?= set_value('email') ?>" autofocus>
	</div>
	
	<button class="btn btn-primary m-t-10" type="submit">Ajouter</button>
</form>
<div class="clearfix"></div>