<h3 class="text-center">Ajouter un tuteur </h3>

<?= form_open('Workspace/envoyerMessage', 'class="form-horizontal col-sm-6 col-sm-offset-3"') ?>
	<div class="form-group <?= form_error('tuteur') ? 'has-error' : '' ?>">
		<label class="col-md-3 control-label" for="tuteur">Tuteur</label>
		<div class="col-md-9">
			<select name="tuteur" class="form-control">
				<option value="">Choisissez un tuteur</option>
				<option value="<?= $tuteurs->tuteurId ?>" <?= set_select('tuteur', $tuteurs->tuteurId) ?>><?=$tuteurs->nomTuteur.' '.$tuteurs->prenomTuteur ?></option>
				<option value="<?= $tuteurs->tuteurExtId ?>" <?= set_select('tuteur', $tuteurs->tuteurExtId) ?>><?=$tuteurs->nomTuteurExt.' '.$tuteurs->prenomTuteurExt ?></option>

			</select>
			<?= form_error('tuteur') ?>
		</div>
	</div>
	
	<div class="form-group <?= form_error('message') ? 'has-error' : '' ?>">
		<?= form_error('message') ?>
		<textarea  placeholder="Message" name="message" class="form-control"></textarea>
	</div>
	
	<button class="btn btn-primary m-t-10" type="submit">Envoyer message</button>
</form>
<div class="clearfix"></div>