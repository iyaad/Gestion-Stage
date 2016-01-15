<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="card-box col-sm-12">	
					<div class="panel-heading"> 
						<h3 class="text-center">Élèves de la filière <?= $chef->filiere ?></h3>
					</div>
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<td></td>
								<th>CNE</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Niveau</th>
							</tr>
							<?php foreach ($etudiants as $e): ?>
							<tr>
								<td><img src="<?= $this->etudiant_model->getAvatarUrl($e->cne) ?>" alt="" class="img-circle thumb-sm"></td>
								<td >
									<a href="<?= base_url($e->cne) ?>"><?= $e->cne ?></a>
								</td>
								<td><?= $e->nom ?></td>
								<td><?= $e->prenom ?></td>
								<td><?= $e->filiere.''.$e->niveau ?></td> 
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card-box">
					<div class="panel-heading"> 
						<h3 class="text-center"> Importer etudiants <strong class="text-custom"></strong> </h3>
					</div> 
					<div class="panel-body">
						<div class="col-sm-6 col-sm-offset-3">
							<?= form_open_multipart("tuteur/importer") ?>
								<div class="form-group ">
									<label for="liste">Fichier .csv à importer</label>
									<input type="file" name="liste">
								</div>
								<p><?= isset($error) ? $error : '' ?></p>
								<p class="text-muted">Signature:<br> cne,nom,prenom,filiere,niveau,dateNaissance,email,numTel,adresse</p>
								<div class="form-group text-center m-t-40 col-sm-6 col-sm-offset-3">
									<button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Importer</button>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.card-box -->
			</div>
		</div>
	</div>
</div>