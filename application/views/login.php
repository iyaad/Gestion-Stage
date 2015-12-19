<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center"> Se connecter à <strong class="text-custom">"STAGE"</strong> </h3>
		</div> 
		<div class="panel-body">
			<?= form_open("login", 'class="form-horizontal m-t-20"') ?>
				<div class="form-group <?= form_error('username') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('username') ?>
						<input class="form-control" type="text" placeholder="Login" name="username" value="<?= set_value('username') ?>" autofocus>
					</div>
				</div>

				<div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
					<div>
						<?= form_error('password') ?>
						<input class="form-control" type="password" placeholder="Mot de passe" name="password">
					</div>
				</div>
				
				<div class="form-group text-center m-t-40">
					<div>
						<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Connexion</button>
					</div>
				</div>

				<div class="form-group m-t-30 m-b-0">
					<div>
						<a href="#" class="text-dark"><i class="fa fa-lock m-r-5"></i>Mot de passe oublié ?</a>
					</div>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
</div>
