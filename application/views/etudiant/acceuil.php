<div class="content-page">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center m-b-30">
					<h4 class="page-title">Sujets Disponibles</h4>
				</div>	
			</div>
			<?php foreach (array_chunk($sujets, 3) as $row): ?>
			<div class="row">
				<?php foreach ($row as $sujet): ?>
				<div class="col-lg-4">
					<div class="panel panel-border panel-custom">
						<div class="panel-heading">
							<div class="picture text-center container-fluid m-b-10">
								<div class="picture-overlay col-sm-offset-3 col-sm-6">
									<img src="<?= $this->entreprise_model->getAvatarUrl($sujet->entrepriseId) ?>" class="img-responsive" alt="profile-image" width="100" >
									<div class="profile-info-name">
										<h4 class="m-b-5"><b><?= "$sujet->nom" ?></b></h4>
									</div>
								</div>								
							</div>
						</div>
						<div class="panel-body">
							<div class="about-info-p">
								<strong>Titre</strong>
								<br>
								<p class="text-muted"><?= $sujet->titre?></p>
							</div>
							<a href="<?= base_url().'sujet/'.$sujet->sujetId ?>">
								<button type="button" class="btn btn-info btn-rounded waves-effect waves-light">
                                	<span class="btn-label"><i class="fa fa-exclamation"></i></span>Plus d'Infos
                            	</button>
							</a>	
						</div>
					</div>
				</div>
				<?php endforeach ?>	
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
