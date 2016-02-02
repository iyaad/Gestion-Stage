<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-lg-12 "> 
					<ul class="nav nav-tabs"> 
						<li class="active"> 
							<a href="#ajouter" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Ajouter un Jury</span> 
							</a> 
						</li> 
						<li class=""> 
							<a href="#jury" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Jurys</span> 
							</a> 
						</li>
						<li class=""> 
							<a href="#jurySout" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Affecter les jurys</span> 
							</a> 
						</li> 
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="ajouter">
							<?php $this->load->view('superviseur/ajouter_jury') ?>
						</div>
						<div class="tab-pane " id="jury">
							<h3 class="text-center">Liste des jurys</h3>
							<table class="table " >
								<tr>
									<th>Jury ID</th>
									<th>Membre 1</th>
									<th>Membre 2</th>
									<th>Membre 3</th>
								</tr>
								<?php foreach ($jurys as $jury): ?> 
								<tr>
									<td class="col-sm-2"><?= $jury->juryId ?></td>
									<td class="col-sm-3"><?= anchor("tuteur/profile/".$jury->tuteur1Id,$this->user_model->resolveName($jury->tuteur1Id)) ?></td>
									<td class="col-sm-3"><?= anchor("tuteur/profile/".$jury->tuteur2Id,$this->user_model->resolveName($jury->tuteur2Id)) ?></td>
									<td class="col-sm-3"><?= anchor("tuteur/profile/".$jury->tuteur3Id,$this->user_model->resolveName($jury->tuteur3Id)) ?></td>
								</tr>	
								<?php endforeach ; ?>
							</table>
						</div>
						<div class="tab-pane" id="jurySout">
							<table class="table table-striped">
								<tr>
									<th>Soutenance ID</th>
									<th>Etudiant</th>
									<th>Sujet</th>
									<th>Date Soutenance</th>
									<th>Jurys</th>
									<th>Action</th>
								</tr>
								<?php foreach ($soutenances as $s): ?>
								<tr>
									<td><?= $s->soutenanceId ?></td>
									<?php $stageId = $s->stageId;
									$stage = $this->sujet_model->getStage(['stageId' => $stageId]); ?>
									<td><?= $this->user_model->resolveName($stage->etudiantId) ?></td>
									<td><?= $stage->titre ?></td>
									<td><?= $s->dateSoutenance ?></td>
									<td>
										<?= form_open('superviseur/affecter_jury/'.$s->soutenanceId, 'id="sout"') ?>
											<div class="form-group">
												<select name="jury" class="form-control">
												<?php foreach ($jurys as $j): ?>
													<option value="<?= $j->juryId ?>"><?= $j->juryId ?></option>
												<?php endforeach ?>
												</select>
											</div>
										</form>
									</td>
									<td><button class="btn btn-success btn-sm waves-light" form="sout" type="submit">Affecter</button></td>
								</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>