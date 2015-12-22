<div class="wrapper-page">
	<div class="card-box">
		<h4><?= $message ?></h4>
		<div class="panel-heading"> 

			<h3 class="text-center">Mot de passe oublie </h3>
		</div> 
		<div class="panel-body">
			<?= form_open("passwordRecovery", 'class="form-horizontal m-t-20"') ?>
				<div class="form-group <?= form_error('login') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('login') ?>
						<input class="form-control" type="text" placeholder="Entrez votre login" name="login" value="<?= set_value('login') ?>" autofocus>
					</div>
				</div>
				<div class="form-group text-center m-t-40">
					<div>
						<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Connexion</button>
					</div>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
    </div>
</div>
