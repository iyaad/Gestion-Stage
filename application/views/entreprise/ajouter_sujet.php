<h3 class="text-center">Ajouter un sujet </h3>

<?= form_open('Entreprise/Ajouter_sujet', 'class="form-horizontal col-sm-6 col-sm-offset-3"') ?>
	<div class="form-group <?= form_error('titre') ? 'has-error' : '' ?>">
		<?= form_error('titre') ?>
		<input class="form-control" type="text" placeholder="Titre" name="titre" value="<?= set_value('titre') ?>" autofocus>
	</div>	
	<div class="form-group <?= form_error('description') ? 'has-error' : '' ?>">
		<?= form_error('description') ?>
		<textarea  placeholder="Description" name="description" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<select name="filiere" class="form-control">
			<option value="">Choisissez une filiere</option>
			<?php foreach ($filieres as $f): ?>
			<option value="<?= $f->code ?>"><?= $f->titre ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<select name="niveau" class="form-control">
			<option value="">Choisissez un niveau</option>
			<option value="1">1ère Année</option>
			<option value="2">2ème Année</option>
			<option value="3">3ème Année</option>
		</select>
	</div>
	<button class="btn btn-primary m-t-10" type="submit">Ajouter</button>
</form>
<div class="clearfix"></div>

	



