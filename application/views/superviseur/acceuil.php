<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="card-box col-sm-6">	
					<div class="panel-heading"> 
						<h3 class="text-center"> Entreprises non vérifiées </h3>
					</div>
					<div class="panel-body">
						<table class="table m-0" >
							<tr>
								<th>Nom</th>
								<th>Adresse</th>
								<th>Email</th>
								<th>Tel</th>
							</tr>
							<?php foreach ($ent_non_verif as $e ): ?>
							<tr>
								<td><?= $e->nom ?></td>
								<td><?= "$e->adresse<br>$e->ville, $e->pays" ?></td>
								<td><?= $e->email ?></td>
								<td><?= $e->numTel ?></td> 
							</tr>
							<?php  endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

