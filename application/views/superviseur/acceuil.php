<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="card-box col-sm-12">	
					<div class="panel-heading"> 
						<h2 class="text-center"><i class="fa fa-briefcase m-r-15"></i> Entreprises non vérifiées </h2>
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
							<?php foreach ($ent_non_verif as $e): ?>
							<tr>
								<td><?= $e->nom ?></td>
								<td><?= "$e->adresse<br>$e->ville, $e->pays" ?></td>
								<td><?= $e->email ?></td>
								<td><?= $e->numTel ?></td> 
								<td><?= $e->description ?></td>
								<td>
									<a href="<?= base_url('superviseur/valider_entreprise/'.$e->entrepriseId) ?>" class="btn btn-success btn-icon waves-effect waves-light col-sm-6 btn-xs">
										<i class="fa fa-check"></i>
									</a>
									<a href="<?= base_url('superviseur/delete/'.$e->entrepriseId) ?>" class="btn btn-icon btn-danger waves-effect waves-light col-sm-6 btn-xs">
										<i class="fa fa-remove"></i>
									</a>
								</td>
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card-box col-sm-12">
					<div class="panel-heading"> 
						<h2 class="text-center"><i class="fa fa-graduation-cap m-r-15"></i>Soutenances</h2>
					</div>
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<th>Etudiant</th>
								<th>Date</th>
								<th>Membre 1</th>
								<th>Membre 2</th>
								<th>Membre 3</th>
							</tr>
							<?php foreach ($soutenances as $s): ?>
							<tr>
								<?php $stage = $this->sujet_model->getStage(['stageId' => $s->stageId]);
								$jury = $this->tuteur_model->getJury(['juryId' => $s->juryId]); ?>
								<td><?= $this->user_model->resolveName($stage->etudiantId) ?></td>
								<td><?= date('d-m-Y', strtotime($s->dateSoutenance)) ?></td>
								<td><?= $this->user_model->resolveName($jury->tuteur1Id) ?></td>
								<td><?= $this->user_model->resolveName($jury->tuteur2Id) ?></td> 
								<td><?= $this->user_model->resolveName($jury->tuteur3Id) ?></td>
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

