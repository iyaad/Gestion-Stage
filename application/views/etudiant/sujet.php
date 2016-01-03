<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="card-box m-t-20">
						<h2 class="text-center">Informations sur le sujet</h2>
						<div class="p-20">
							<div class="about-info-p">
								<strong>Titre</strong>
								<br>
								<p class="text-muted"><?= $sujet->titre ?></p>
							</div>
							<div class="about-info-p">
								<strong>Description</strong>
								<br>
								<p class="text-muted"><?= $sujet->description ?></p>
							</div>
							<div class="about-info-p">
								<strong>Niveau</strong>
								<br>
								<p class="text-muted"><?= $sujet->filiere.''.$sujet->niveau ?></p>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card-box m-t-20">
						<h2 class="text-center">Informations sur l'entreprise</h2>
						<div class="p-20">
							<div class="about-info-p">
								<strong>Nom</strong>
								<br>
								<p class="text-muted"><?= $sujet->nom ?></p>
							</div>
							<div class="about-info-p">
								<strong>Description</strong>
								<br>
								<p class="text-muted"><?= $sujet->desc ?></p>
							</div>
							<div class="about-info-p">
								<strong>Localisation</strong>
								<br>
								<p class="text-muted"><?= $sujet->ville.'/'.$sujet->pays ?></p>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>