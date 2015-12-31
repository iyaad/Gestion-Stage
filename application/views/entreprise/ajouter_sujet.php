

<h3 class="text-center">Ajouter un sujet </h3>

<?= form_open('Entreprise/Ajouter_sujet', 'class="form-horizontal"') ?>
	<div class="form-group <?= form_error('titre') ? 'has-error' : '' ?>">
			<div>
				<?= form_error('titre') ?>
				<input class="form-control" type="text" placeholder="Titre" name="titre" value="<?= set_value('titre') ?>" autofocus>
			</div>
	</div>	
	<div class="form-group <?= form_error('description') ? 'has-error' : '' ?>">
		<div>
			<?= form_error('description') ?>
			<textarea  placeholder="Description"
			 name="description" data-parsley-id="90" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group ">
		<label class=" control-label" for="filiere">Filiere</label>
		<div class="col-md-6">
			<select name="filiere" class="form-control">
				<option value="">Choisissez une filiere</option>
				<?php foreach ($filieres as $f): ?>
				<option value="<?= $f->code ?>"><?= $f->titre ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label class=" control-label" for="niveau">Niveau</label>
		<div class="col-md-6">
			<select name="niveau" class="form-control">
				<option value="">Choisissez une niveau</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				
			</select>
		</div>
	</div>



	<button class="btn btn-primary  m-t-10" type="submit">Ajouter</button>
</form>

	



