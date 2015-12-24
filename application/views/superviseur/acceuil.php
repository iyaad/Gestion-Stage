<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="card-box col-sm-12">	
					<div class="panel-heading"> 
						<h3 class="text-center"> Entreprises non vérifiées </h3>
					</div>
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<th>Nom</th>
								<th>Adresse</th>
								<th>Email</th>
								<th>Téléphone</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
							<?php foreach ($ent_non_verif as $e ): ?>
							<tr>
								<td><?= $e->nom ?></td>
								<td><?= "$e->adresse<br>$e->ville, $e->pays" ?></td>
								<td><?= $e->email ?></td>
								<td><?= $e->numTel ?></td> 
								<td><?= $e->description ?></td>
								<td>
									<a href="<?= base_url('superviseur/valider_entreprise/'.$e->entrepriseId) ?>" class="btn btn-success waves-effect waves-light">
										<span class="btn-label"><i class="fa fa-check"></i></span> Valider
									</a>
								</td>
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card-box col-sm-6">
					<div class="panel-heading"> 
						<h3 class="text-center">Ajouter un Chef de Filiere</h3>
					</div>
					<div class="panel-body">
						<?= form_open('superviseur/ajouter_chef_filiere', 'class="form-horizontal"') ?>
							<div class="form-group ">
								<label class="col-md-2 control-label" for="filiere">Filiere</label>
								<div class="col-md-10">
									<select name="filiere" class="form-control">
										<option value="">Choisissez une filiere</option>
										<?php foreach ($filieres as $f): ?>
										<option value="<?= $f->code ?>"><?= $f->titre ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group ">
								<label class="col-md-2 control-label" for="nom">Nom</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="nom">
								</div>
							</div>
							<div class="form-group ">
								<label class="col-md-2 control-label" for="prenom">Prénom</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="prenom">
								</div>
							</div>
							<div class="form-group ">
								<label class="col-md-2 control-label" for="email">Email</label>
								<div class="col-md-10">
									<input type="email" class="form-control" name="email">
								</div>
							</div>
							<button class="btn btn-primary pull-right m-t-10" type="submit">Ajouter</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

