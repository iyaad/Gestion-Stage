<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-lg-12 "> 
					<ul class="nav nav-tabs"> 
						<li class="active"> 
							<a href="#etudiant" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Etudiants</span> 
							</a> 
						</li> 
						<li class=""> 
							<a href="#tuteur" data-toggle="tab" aria-expanded="true">
								<span class="visible-xs"><i class="fa fa-user"></i></span>
								<span class="hidden-xs">Tuteurs</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="etudiant">
							<h3 class="text-center">Etudiants</h3>
							<div class="row">
								<div class="col-md-6 col-lg-3">
	                                <div class="widget-bg-color-icon card-box">
	                                    <div class="bg-icon bg-icon-purple pull-left">
	                                        <i class="md md-equalizer text-purple"></i>
	                                    </div>
	                                    <div class="text-right">
	                                        <h3 class="text-dark"><b class="counter"><?= $etudiantsEnStage*100 ?></b>%</h3>
	                                        <p class="text-muted">Etudiant en Stage </p>
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </div>
	                            <div class="col-md-6 col-lg-3">
	                                <div class="widget-bg-color-icon card-box">
	                                    <div class="bg-icon bg-icon-purple pull-left">
	                                        <i class="md md-equalizer text-purple"></i>
	                                    </div>
	                                    <div class="text-right">
	                                        <h3 class="text-dark"><b class="counter"><?= $etudiantsEnRechercheStage*100 ?></b>%</h3>
	                                        <p class="text-muted">Etudiant en Recherche de Stage </p>
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </div>
	                            <div class="col-md-6 col-lg-3">
	                                <div class="widget-bg-color-icon card-box">
	                                    <div class="bg-icon bg-icon-purple pull-left">
	                                        <i class="md md-equalizer text-purple"></i>
	                                    </div>
	                                    <div class="text-right">
	                                        <h3 class="text-dark"><b class="counter"><?= $etudiantsEnSoutenance*100 ?></b>%</h3>
	                                        <p class="text-muted">Etudiant en Soutenance </p>
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </div>
	                        </div>
						</div>
						<div class="tab-pane" id="tuteur">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>