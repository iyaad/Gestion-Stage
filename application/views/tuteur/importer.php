<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="card-box col-sm-6">
				<div class="panel-heading"> 
					<h3 class="text-center"> Importer etudiants <strong class="text-custom"></strong> </h3>
				</div> 
				<div class="panel-body">
					<?= form_open_multipart("tuteur/importer") ?>
						<div class="form-group ">
							<label for="liste">Fichier .csv à importer</label>
							<input type="file" name="liste">
						</div>
						<p><?= isset($error) ? $error : '' ?></p>
						<div class="form-group text-center m-t-40">
							<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Importer</button>
						</div>
					</form>
				</div>
			</div><!-- /.card-box -->
		</div>
	</div>
</div>

