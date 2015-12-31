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
								<th>CNE</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Niveau</th>
							</tr>
							<?php foreach ($etudiants as $e ): ?>
							<tr>
								<td style>
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
		</div>
	</div>
</div>