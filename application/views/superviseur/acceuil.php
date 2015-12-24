<div class="content-page">
	<div class="content">
		<div class="container">
			<div class="col-lg-6">
				<h4 class="m-t-0 header-title"><b>Basic example</b></h4>
				<p class="text-muted font-13">
					Liste des entreprise non valises :
				</p>
				
				<div class="p-20">
					<table class="table m-0">
						
						<thead>
							<tr>
								<th>Nom</th>
								<th>Adresse</th>
								<th>Email</th>
								<th>Tel</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ent_non_verif as $e ): ?>
								<tr>
									<td><? = $e['nom']?></td>
									<td><? = $e['adresse'].' '.$e['ville'].' '.$e['adresse'].?></td>
									<td><? = $e['email']?></td>
									<td><? = $e['numTel']?></td> 
								</tr>


							
							<?php  endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

