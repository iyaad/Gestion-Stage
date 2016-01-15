<div class=" col-sm-offset-3 card-box col-sm-6">
	<div class="panel-heading"> 
		<h3 class="text-center">Envoyer un message</h3>
	</div>
	<div class="panel-body">

<?= form_open('workspace/envoyerMessage/'.$id, 'class="form-horizontal "') ?>
	<div class="form-group <?= form_error('destinataire') ? 'has-error' : '' ?>">
		<div class="col-md-9">
			<select name="destinataire" class="form-control">
				<option value="">Choisissez un destinataire</option>
				<?php if(isEtudiant()) : ?>
				<option value="<?= $destinataire->tuteurId ?>" <?= set_select('destinataire', $destinataire->tuteurId) ?>><?=$destinataire->nomTuteur.' '.$destinataire->prenomTuteur ?></option>
				<option value="<?= $destinataire->tuteurExtId ?>" <?= set_select('destinataire', $destinataire->tuteurExtId) ?>><?=$destinataire->nomTuteurExt.' '.$destinataire->prenomTuteurExt ?></option>
				<?php endif ?>
				<?php if(isTuteur()) : ?>
				<option value="<?= $destinataire->etudiantId ?>" <?= set_select('destinataire', $destinataire->etudiantId) ?>><?=$destinataire->nomEtudiant.' '.$destinataire->prenomEtudiant ?></option>
				<option value="<?= $destinataire->tuteurExtId ?>" <?= set_select('destinataire', $destinataire->tuteurExtId) ?>><?=$destinataire->nomTuteurExt.' '.$destinataire->prenomTuteurExt ?></option>
				<?php endif ?>
				<?php if(isTuteurExt()) : ?>
				<option value="<?= $destinataire->etudiantId ?>" <?= set_select('destinataire', $destinataire->etudiantId) ?>><?=$destinataire->nomEtudiant.' '.$destinataire->prenomEtudiant ?></option>
				<option value="<?= $destinataire->tuteurId ?>" <?= set_select('destinataire', $destinataire->tuteurId) ?>><?=$destinataire->nomTuteur.' '.$destinataire->prenomTuteur ?></option>
				<?php endif ?>
			</select>
			<?= form_error('destinataire') ?>
		</div>
	</div>
	
	<div class="form-group <?= form_error('message') ? 'has-error' : '' ?>">
		<?= form_error('message') ?>
		<textarea  placeholder="Message" name="message" class="form-control"></textarea>
	</div>
	
	<button class="btn btn-primary m-t-10" type="submit">Envoyer message</button>
</form>
<div class="clearfix"></div>
</div>
</div>