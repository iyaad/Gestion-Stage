<div id="login" class="container">
	<div class="form-container col-sm-4 col-sm-offset-4" >
		<?= form_open("Users/login") ?> 
			<div class="form-group">
				<label for="username">Login</label>
				<?= form_error('username') ?>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Mot de Passe</label>
				<?= form_error('password') ?>
				<input type="password" name="password" class="form-control">
			</div>
			<div >
		        <button type="submit" class="btn btn-info waves-effect waves-light">Se Connecter</button>
		        <a class="pull-right" href="<?= base_url('Users/register') ?>">Creer un Ccompte</a>
		    </div>
		</form>
	</div>
</div>
