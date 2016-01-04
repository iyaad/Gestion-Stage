<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-lg-12 "> 
					<ul class="nav nav-tabs"> 
						<li class="active"> 
							<a href="#home" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Sujets</span> 
							</a> 
						</li> 
						<li class=""> 
							<a href="#profile" data-toggle="tab" aria-expanded="true">
								<span class="visible-xs"><i class="fa fa-user"></i></span>
								<span class="hidden-xs">Ajouter un sujet</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<h3 class="text-center">Sujets</h3>
							<table class="table " >
								<tr>
									<th>Titre</th>
									<th>Description</th>
									<th>Filiere</th>
									<th>Niveau</th>
								</tr>
								<?php foreach ($sujets as $s): ?>
								<tr>
									<td><?= anchor("sujet/$s->sujetId", $s->titre) ?></td>
									<td><?= $s->description ?></td>
									<td><?= $s->filiere ?></td>
									<td><?= $s->niveau ?></td> 
								</tr>
								<?php endforeach; ?>
							</table>
						</div>
						<div class="tab-pane" id="profile">
							<?php $this->load->view('entreprise/ajouter_sujet') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>