<div class="account-pages">
	<div class="wrapper-page">
		<div class=" card-box">
			<div class="panel-heading"> 
				<h3 class="text-center"> Se connecter à <strong class="text-custom">"STAGE"</strong> </h3>
			</div> 
			<div class="panel-body">
					<div class="form-horizontal m-t-20" >
					<?= form_open("Users/login") ?>
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="text" required="" placeholder="Pseudonyme" name="username">
							<?= form_error('username') ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" type="password" required="" placeholder="Mot de passe" name="password">
							<?= form_error('password') ?>
						</div>
					</div>


					
					<div class="form-group text-center m-t-40">
						<div class="col-xs-12">
							<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Connexion</button>
						</div>
					</div>

					<div class="form-group m-t-30 m-b-0">
						<div class="col-sm-12">
							<a href="#" class="text-dark"><i class="fa fa-lock m-r-5"></i>Mot de passe oublié ?</a>
						</div>
					</div>
				</form>
				</div>

	</div>
</div>
	<div class="row">
	 <div class="col-sm-12 text-center">
	<p> <a href="<?= base_url('users/register') ?>" class="text-primary m-l-5"><b>Creer un Compte</b></a></p>
					
	</div>