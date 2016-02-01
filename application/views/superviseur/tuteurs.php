<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-lg-12 "> 
					<ul class="nav nav-tabs"> 
						<li class="active"> 
							<a href="#home" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Tuteurs</span> 
							</a> 
						</li> 
						<li class=""> 
							<a href="#profile" data-toggle="tab" aria-expanded="true">
								<span class="visible-xs"><i class="fa fa-user"></i></span>
								<span class="hidden-xs">Ajouter un tuteur</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<h3 class="text-center">Tuteurs</h3>
							<table class="table " >
								<tr>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Département</th>
								</tr>
								<?php  foreach ($tuteurs as $tuteur): ?>
								<tr>
									<td><?= $tuteur->nom ?></td>
									<td><?= $tuteur->prenom ?></td>
									<td><?= $tuteur->departement ?></td>
									
								</tr>
								<?php endforeach; ?>
							</table>
						</div>
						<div class="tab-pane" id="profile">
							<?php $this->load->view('superviseur/ajouter_tuteur') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>