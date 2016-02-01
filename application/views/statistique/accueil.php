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
								<div class="col-md-6 col-lg-3 ">
	                                <div class="widget-bg-color-icon card-box">
	                                    <div class="bg-icon bg-icon-purple pull-left">
	                                        <i class="md md-equalizer text-purple"></i>
	                                    </div>
	                                    <div class="text-right">
	                                        <h3 class="text-dark"><b class="counter"><?= number_format($etudiantsEnStage*100,2);  ?></b>%</h3>
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
	                                        <h3 class="text-dark"><b class="counter"><?= number_format($etudiantsEnRechercheStage*100,2); ?></b>%</h3>
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
	                                        <h3 class="text-dark"><b class="counter"><?= number_format($etudiantsEnSoutenance*100,2) ?></b>%</h3>
	                                        <p class="text-muted">Etudiant en Soutenance </p>
	                                    </div>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </div>
	                        </div>
						</div>
						<div class="tab-pane" id="tuteur">
							<div class="col-lg-4">
                        		<div class="card-box">
                        			<h4 class="text-dark header-title m-t-0 m-b-30">Daily Sales</h4>

                        			<div class="widget-chart text-center">
                                        <div id="sparkline3"><canvas width="165" height="165" style="display: inline-block; width: 165px; height: 165px; vertical-align: top;"></canvas></div>
	                                	<ul class="list-inline m-t-15">
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Target</h5>
	                                			<h4 class="m-b-0">$1000</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last week</h5>
	                                			<h4 class="m-b-0">$523</h4>
	                                		</li>
	                                		<li>
	                                			<h5 class="text-muted m-t-20">Last Month</h5>
	                                			<h4 class="m-b-0">$965</h4>
	                                		</li>
	                                	</ul>
                                	</div>
                        		</div>

                            </div>

                            </div>
							<div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                        <i class="md md-equalizer text-purple"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">0.16</b>%</h3>
                                        <p class="text-muted">Conversion</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left">
                                        <i class="md md-remove-red-eye text-success"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">64,570</b></h3>
                                        <p class="text-muted">Today's Visits</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>