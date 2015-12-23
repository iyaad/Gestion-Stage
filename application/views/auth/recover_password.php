<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center">Mot de passe oublie </h3>
		</div> 
		<div class="panel-body">
			<?= form_open("recover-password", 'class="form-horizontal m-t-20"') ?>
				<div class="form-group <?= form_error('email') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('email') ?>
						<input class="form-control" type="email" placeholder="Entrez votre email" name="email" value="<?= set_value('email') ?>" autofocus>
					</div>
				</div>
				<div class="form-group text-center m-t-40">
					<div>
						<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Valider</button>
					</div>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
    </div>
</div>
