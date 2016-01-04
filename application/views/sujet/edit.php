<div class="content-page">
	<div class="content">
		<div class="container-fluid">
			<div class="card-box">
				<div class="panel-heading"> 
					<h3 class="text-center">Modifier le sujet</h3>
				</div> 
				<div class="panel-body">					
					<?= form_open(base_url('sujet/edit/'.$sujet->sujetId), 'class="form-horizontal"') ?>
						<div class="form-group <?= form_error('titre') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Titre</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="titre" value="<?= $sujet->titre ?>">
								<?= form_error('titre') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('description') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Description</label>
							<div class="col-md-8">
								<textarea class="form-control" name="description"><?= $sujet->description ?></textarea>
								<?= form_error('description') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('prerequis') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Prérequis</label>
							<div class="col-md-8">
								<textarea class="form-control" name="prerequis"><?= $sujet->prerequis ?></textarea>
								<?= form_error('prerequis') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
							<label class="col-sm-4 control-label">Mot de passe</label>
							<div class="col-md-8">
								<input type="password" class="form-control"  name="password">
								<?= form_error('password') ?>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<button type="submit" class="btn btn-purple waves-effect waves-light">Mettre a jour</button>
						</div>
					</form>
				</div>
			</div><!-- /.card-box -->
		</div>
	</div>
</div>