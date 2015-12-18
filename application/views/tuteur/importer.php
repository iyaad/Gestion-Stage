<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center"> Importer etudiants <strong class="text-custom"></strong> </h3>
		</div> 
		<div class="panel-body">
			<?= form_open_multipart("tuteur/importer") ?>
				<div class="form-group ">
					
		 					<input type="file" name="file">
					
				</div>
				<div class="form-group text-center m-t-40">
					<div>
						<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Importer</button>
					</div>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
</div>

