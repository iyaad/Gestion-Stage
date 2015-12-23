<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center">Nouveau mot de passe </h3>
		</div> 
		<div class="panel-body">
			<?= form_open("reset-password?email=$email&identifier=".urlencode($identifier), 'class="form-horizontal m-t-20"') ?>
				<div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('password') ?>
						<input class="form-control" type="password" placeholder="Entrez votre mot de passe" name="password" value="<?= set_value('password') ?>" autofocus>
					</div>
				</div>
					<div>
						<?= form_error('conf_password') ?>
						<input class="form-control" type="password" placeholder="confirmez le mot de passe" name="conf_password" value="<?= set_value('conf_password') ?>" autofocus>
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
	