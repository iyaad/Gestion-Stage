<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center"> Finaliser votre inscription <strong class="text-custom"></strong> </h3>
		</div> 
		<div class="panel-body">
			<div>
				<div class="form-group ">
					<label for="nom">Nom complet</label>
					<input type="text" value="<?= $etudiant->nom.' '.$etudiant->prenom?>">
				</div>

			</div>
			<?= form_open_multipart("Etudiant/") ?>
				<div class="form-group ">
					<label for="adresse">Adresse</label>
					<input type="text" name="adresse">
				</div>
				<div class="form-group ">
					<label for="pwd">Nouveau mot de passe</label>
					<input type="password" name="pwd">
				</div>
				<div class="form-group ">
					<label for="img">Image a importer</label>
					<input type="file" name="img">
				</div>



				<p><?= isset($error) ? $error : '' ?></p>
				<div class="form-group text-center m-t-40">
					<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Importer</button>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
</div>