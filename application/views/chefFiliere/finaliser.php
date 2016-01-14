<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="card-box col-sm-12">	
					<div class="panel-heading"> 
						<h3 class="text-center"> Demandes de Stage à Finaliser </h3>
					</div>
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<th>CNE</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Sujet</th>
								<th>Entreprise</th>
								<th>Finaliser</th>
							</tr>
							<?php foreach ($postulats as $e):
								$sujet = $this->sujet_model->getSujet(['sujetId' => $e->sujetid]) ;
								$entreprise = $this->entreprise_model->getEntreprise(['entrepriseId' => $sujet->entrepriseId]); 
								?>
							<tr>
								<td><a href="<?= base_url($e->cne) ?>"><?= $e->cne ?></a> </td>
								<td><?= $e->nom ?></td>
								<td><?= $e->prenom ?></td>
								<td><a href="<?= base_url('sujet/'.$e->sujetid) ?>"><?= $sujet->titre ?></a> </td> 
								<td><a href="<?= base_url('entreprise/'.$sujet->entrepriseId) ?>"><?= $entreprise->nom ?></td>
								<td>
									<a href="<?= base_url('tuteur/finaliserStage/'.$e->etudiantId.'/'.$e->sujetid) ?>" class="btn btn-success waves-effect waves-light">
										<span class="btn-label"><i class="fa fa-check"></i></span> Finaliser
									</a>
									<a href="<?= base_url('sujet/refusePostulat/'.$e->sujetid.'/'.$e->etudiantId) ?>" class="btn btn-icon btn-danger waves-effect waves-light">
										<i class="fa fa-remove"></i>
									</a>
								</td>
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
			</div>