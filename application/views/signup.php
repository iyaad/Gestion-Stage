<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center">Inscription  </h3>
		</div> 
		<div class="panel-body">
			<?= form_open("signup", 'class="form-horizontal m-t-20"') ?>
				<div class="form-group <?= form_error('nom_entreprise') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('nom_entreprise') ?>
						<input value="<?= set_value('nom_entreprise') ?>" class="form-control" type="text" placeholder="Nom de l'entreprise" name="nom_entreprise" value="<?= set_value('nom_entreprise') ?>" autofocus>
					</div>
				</div>

				<div class="form-group <?= form_error('pays') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('pays') ?>
						<input value="<?= set_value('pays') ?>" class="form-control" type="text" placeholder="Pays" name="pays">
					</div>
				</div>
				<div class="form-group <?= form_error('ville') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('ville') ?>
						<input value="<?= set_value('ville') ?>" class="form-control" type="text" placeholder="Ville" name="ville">
					</div>
				</div>
				<div class="form-group <?= form_error('adresse') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('adresse') ?>
						<input value="<?= set_value('adresse') ?>" class="form-control" type="text" placeholder="Adresse" name="adresse">
					</div>
				</div>
				<div class="form-group <?= form_error('email') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('email') ?>
						<input value="<?= set_value('email') ?>" class="form-control" type="text" placeholder="Email" name="email">
					</div>
				</div>
				<div class="form-group <?= form_error('fax') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('fax') ?>
						<input value="<?= set_value('fax') ?>" class="form-control" type="text" placeholder="Fax (facultatif)" name="fax">
					</div>
				</div>
				<div class="form-group <?= form_error('numtel') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('numtel') ?>
						<input value="<?= set_value('numtel') ?>" class="form-control" type="text" placeholder="Numero de téléphone (ex: +212530124578)" name="numtel">
					</div>
				</div>				
				<div class="form-group <?= form_error('description') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('description') ?>
						<textarea  placeholder="Description de l'entreprise" value="<?= set_value('description') ?>"
						 name="description" data-parsley-id="90" class="form-control"></textarea>
					</div>
				</div>
				
				<div class="form-group text-center m-t-40">
					<div>
						<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">S'inscrire</button>
					</div>
				</div>


			</form>
		</div>
	</div><!-- /.card-box -->
</div>