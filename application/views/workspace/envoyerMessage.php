<div class=" col-sm-offset-3 card-box col-sm-6">
	<div class="panel-heading"> 
		<h3 class="text-center">Envoyer un message</h3>
	</div>
	<div class="panel-body">

<?= form_open_multipart('workspace/envoyerMessage/'.$id, 'class="form-horizontal "') ?>
	<input type="hidden" name="stageId" value="<?= $id ?>">
	<div class="form-group">
		<input type="text" name="titre" placeholder="Titre" class="form-control">
	</div>
	<div class="form-group <?= form_error('destinataire') ? 'has-error' : '' ?>">
		<?= form_error('destinataire') ?>
		<div class="">
			<select name="destinataire" class="form-control">
				<option value="">Choisissez un destinataire</option>
				<?php if(isEtudiant()) : ?>
				<option value="<?= $destinataire->tuteurId ?>" <?= set_select('destinataire', $destinataire->tuteurId) ?>><?=$destinataire->nomTuteur.' '.$destinataire->prenomTuteur ?></option>
				<option value="<?= $destinataire->tuteurExtId ?>" <?= set_select('destinataire', $destinataire->tuteurExtId) ?>><?=$destinataire->nomTuteurExt.' '.$destinataire->prenomTuteurExt ?></option>
				<?php elseif(isTuteur()) : ?>
				<option value="<?= $destinataire->etudiantId ?>" <?= set_select('destinataire', $destinataire->etudiantId) ?>><?=$destinataire->nomEtudiant.' '.$destinataire->prenomEtudiant ?></option>
				<option value="<?= $destinataire->tuteurExtId ?>" <?= set_select('destinataire', $destinataire->tuteurExtId) ?>><?=$destinataire->nomTuteurExt.' '.$destinataire->prenomTuteurExt ?></option>
				<?php elseif(isTuteurExt()) : ?>
				<option value="<?= $destinataire->etudiantId ?>" <?= set_select('destinataire', $destinataire->etudiantId) ?>><?=$destinataire->nomEtudiant.' '.$destinataire->prenomEtudiant ?></option>
				<option value="<?= $destinataire->tuteurId ?>" <?= set_select('destinataire', $destinataire->tuteurId) ?>><?=$destinataire->nomTuteur.' '.$destinataire->prenomTuteur ?></option>
				<?php endif ?>
			</select>
		</div>
	</div>
	
	<div class="form-group <?= form_error('message') ? 'has-error' : '' ?>">
		<?= form_error('message') ?>
		<textarea  placeholder="Message" name="message" class="form-control"></textarea>
	</div>

	<div class="form-group <?= form_error('fichier') ? 'has-error' : '' ?>">
		<?= form_error('fichier') ?>
		<input type="file" class="filestyle" data-size="sm" name="fichier" id="filestyle-5" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">
		<div class="bootstrap-filestyle input-group">
			<input type="text" class="form-control input-sm" placeholder="Pièce jointe (max: 5 Mo)" disabled="">
			<span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-5" class="btn btn-default btn-sm"><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choisir fichier</span></label></span>
		</div>
	</div>
	
	<button class="btn btn-primary m-t-10" type="submit">Envoyer message</button>
</form>
<div class="clearfix"></div>
</div>
</div>