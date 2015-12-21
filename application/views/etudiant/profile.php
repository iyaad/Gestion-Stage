<div class="card-box">
		<div class="bg-picture text-center">
            <div class="bg-picture-overlay"></div>
            <div class="profile-info-name">
                <img src="<?= asset_url('images/avatar-1.jpg')?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                <h4 class="m-b-5"><b><?= $etudiant->nom?></b></h4>
                <p class="text-muted"><i class="fa fa-map-marker"></i> Tanger, Maroc</p>
            </div>
        </div>
		<div class="panel-heading"> 
			<h3 class="text-center"> <?= $etudiant->nom.' '.$etudiant->prenom?> <strong class="text-custom"></strong> </h3>
		</div> 
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group ">
					<label class="col-md-4 control-label">Nom complet</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->nom.' '.$etudiant->prenom?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">CNE</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->cne?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">Filiere</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->filiere?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">Niveau</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->niveau?></p>     
                    </div>
				</div>
				<div class="form-group ">
					<label class="col-md-4 control-label">Date de Naissance</label>
					<div class="col-md-8">
						<p class="form-control-static"><?= $etudiant->dateNaissance?></p>     
                    </div>
				</div>
			</form>
		</div>
</div>
