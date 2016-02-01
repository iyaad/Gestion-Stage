<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="col-md-6 col-sm-offset-3 ">
				<div class="card-box m-t-20 text-center">
					<h2 class="text-center  m-b-10 ">
						Coordonnées du tuteur
					</h2>
					<div class="p-20">
						<div class="about-info-p">
							<strong>Nom</strong>
							<br>
							<p class="text-muted"><?= $tuteur->nom . ' ' . $tuteur->prenom ?></p>
						</div>
						<div class="about-info-p">
							<strong>Département</strong>
							<br>
							<p class="text-muted"><?= $tuteur->departement ?></p>
						</div>
						<div class="about-info-p">
							<strong>Email</strong>
							<br>
							<p class="text-muted"><?= $this->user_model->getUser(['userId'=>$tuteur->tuteurId ])->email ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
