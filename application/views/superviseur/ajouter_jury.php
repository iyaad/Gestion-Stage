<div class="card-box col-sm-6">
	<div class="panel-heading"> 
		<h3 class="text-center">Ajouter Jury</h3>
	</div>
	<div class="panel-body">
		<?= form_open('superviseur/ajouter_jury', 'class="form-horizontal"') ?>
			<div class="form-group <?= form_error('tuteur1') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="tuteur1">1er Jury</label>
				<div class="col-md-9">
					<select name="tuteur1" class="form-control">
						<option value="">Choisissez un jury</option>
						<?php foreach ($tuteurs as $tuteur): ?>
						<option value="<?= $tuteur->tuteurId ?>" <?= set_select('tuteur1', $tuteur->tuteurId) ?>><?= $tuteur->nom.' '.$tuteur->prenom ?></option>
						<?php endforeach ?>
					</select>
					<?= form_error('tuteur1') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('tuteur2') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="tuteur2">2ème Jury</label>
				<div class="col-md-9">
					<select name="tuteur2" class="form-control">
						<option value="">Choisissez un jury</option>
						<?php foreach ($tuteurs as $tuteur): ?>
						<option value="<?= $tuteur->tuteurId ?>" <?= set_select('tuteur2', $tuteur->tuteurId) ?>><?= $tuteur->nom.' '.$tuteur->prenom ?></option>
						<?php endforeach ?>
					</select>
					<?= form_error('tuteur2') ?>
				</div>
			</div>
			<div class="form-group <?= form_error('tuteur3') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="tuteur3">3eme Jury</label>
				<div class="col-md-9">
					<select name="tuteur3" class="form-control">
						<option value="">Choisissez un jury</option>
						<?php foreach ($tuteurs as $tuteur): ?>
						<option value="<?= $tuteur->tuteurId ?>" <?= set_select('tuteur3', $tuteur->tuteurId) ?>><?= $tuteur->nom.' '.$tuteur->prenom ?></option>
						<?php endforeach ?>
					</select>
					<?= form_error('tuteur3') ?>
				</div>
			</div>
			
			<button class="btn btn-primary pull-right m-t-10" type="submit">Ajouter</button>
		</form>
	</div>
</div>