<div id="login" class="container">
	<?= form_open("Users/login", 'class="col-sm-4 col-sm-offset-4"') ?> 
		<div class="form-group">
			<label for="username">Login</label>
			<input type="text" name="username" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Mot de Passe</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div >
	        <button type="submit" class="btn btn-info waves-effect waves-light">Se Connecter</button>
	        <a class="pull-right" href="<?= base_url('Users/register') ?>">Creer un Ccompte</a>
	    </div>
	</form>
</div>
