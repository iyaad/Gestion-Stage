<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="card-box col-sm-12">	
					<div class="panel-heading"> 
						<h3 class="text-center"> Sujets Disponibles en ce momment </h3>
					</div>
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<th>Titre</th>
								<th>Nom Entreprise</th>
								<th>Pays</th>
								<th>ville</th>
								<th>Postuler</th>
							</tr>
							<?php foreach ($sujets as $sujet ): ?>
							<tr>
								<td><?= $sujet->titre ?></td>
								<td><?= $sujet->nom ?></td>
								<td><?= $sujet->pays ?></td> 
								<td><?= $sujet->ville ?></td>
								<td>
									<a href="<?= base_url('etudiant/voirSujet/'.$sujet->sujetId) ?>" class="btn btn-success waves-effect waves-light">
										<span class="btn-label"><i class="fa fa-info"></i></span> Plus d'infos
									</a>
								</td>
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
