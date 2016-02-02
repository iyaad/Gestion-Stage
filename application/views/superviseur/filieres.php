<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-lg-12 "> 
					<ul class="nav nav-tabs"> 
						<li class="active"> 
							<a href="#ajouter" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Ajouter une filière</span> 
							</a> 
						</li> 
						<li class=""> 
							<a href="#filiere" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Filières</span> 
							</a> 
						</li> 
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="ajouter">
							<?php $this->load->view('superviseur/ajouter_filiere') ?>
						</div>
						<div class="tab-pane " id="filiere">
							<h3 class="text-center">Liste des filières</h3>
							<table class="table " >
								<tr>
									<th>Code</th>
									<th>Filière</th>
									<th>Chef de filière actuel</th>									
								</tr>
								<?php foreach ($filieres as $filiere): ?> 
								<tr>
									<td class="col-sm-2"><?= $filiere->code ?></td>
									<td class="col-sm-2"><?= $filiere->titre ?></td>
									<td class="col-sm-2"><?= $this->user_model->resolveName($this->tuteur_model->getTuteur(['chefId' => $filiere->filiereId ])->tuteurId) ?></td>
								</tr>
								<?php endforeach ; ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>