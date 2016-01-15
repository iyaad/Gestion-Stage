<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="card-box col-sm-12">	
					<div class="panel-heading"> 
						<h3 class="text-center">Stagières sous votre responsabilité</h3>
					</div>
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<th></th>
								<th>CNE</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Sujet de stage</th>
								<th>Action</th>
							</tr>
							<?php foreach ($etudiants as $e): ?>
							<tr>
								<td><img src="<?= $this->etudiant_model->getAvatarUrl($e->cne) ?>" class="img-circle thumb-sm"></td>
								<td><?= $e->cne ?></td>
								<td><?= $e->nomEtudiant ?></td>
								<td><?= $e->prenomEtudiant ?></td>
								<td><?= $e->titre ?></td>							
								<td>
									<a href="<?= base_url('workspace/accueil/'.$e->etudiantId) ?>"> 
										<button class="btn btn-default waves-effect waves-light" type="button">
											Espace de travail
											<span class="btn-label btn-label-right"><i class="fa fa-file-text-o"></i></span>
										</button>
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

