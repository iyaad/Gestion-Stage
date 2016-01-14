<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-lg-12 "> 
					<ul class="nav nav-tabs"> 
						<li class="active"> 
							<a href="#home" data-toggle="tab" aria-expanded="false"> 
								<span class="visible-xs"><i class="fa fa-home"></i></span> 
								<span class="hidden-xs">Message</span> 
							</a> 
						</li> 
						<li class=""> 
							<a href="#profile" data-toggle="tab" aria-expanded="true">
								<span class="visible-xs"><i class="fa fa-user"></i></span>
								<span class="hidden-xs">Envoyer un message</span>
							</a>
						</li>
						<li class=""> 
							<a href="#profile" data-toggle="tab" aria-expanded="true">
								<span class="visible-xs"><i class="fa fa-user"></i></span>
								<span class="hidden-xs">Calendrier</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							
						</div>
						<div class="tab-pane" id="profile">
							
							<?php $this->load->view('workspace/envoyerMessage'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>