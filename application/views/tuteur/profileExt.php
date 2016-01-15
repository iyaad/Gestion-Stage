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
							<strong>Nom Complet</strong>
							<br>
							<p class="text-muted"><?= $tuteur->nom . ' ' . $tuteur->prenom ?></p>
						</div>
						<div class="about-info-p">
							<strong>Entreprise</strong>
							<br>
							<p class="text-muted"><?= $this->user_model->resolveName($tuteur->entrepriseId) ?></p>
						</div>
						<div class="about-info-p">
							<strong>Email</strong>
							<br>
							<p class="text-muted"><?= $user->email ?></p>
						</div>
						<div class="about-info-p">
							<strong>Téléphone</strong>
							<br>
							<p class="text-muted"><?= $user->numTel ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
