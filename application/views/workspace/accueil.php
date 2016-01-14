
<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<h3 class="text-center">Messages</h3>
			<?php  foreach (array_chunk($messages, 3)as $row): ?>
			<div class="row">
				<?php  foreach ($row as $m): ?>
				<div class="col-lg-4">
                    <div class="portlet">
                        <div class="portlet-heading bg-success">
                            <h3 class="portlet-title">

                                De : <?= $this->user_model->resolveName($m->expediteur) ?>
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-success" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="portlet-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum. 
                            </div>
                        </div>
                    </div>
                </div>			
				<?php endforeach ?>
			</div>							
			<?php endforeach ?>
			
			<div class="row">
	
				<?php $this->load->view('workspace/envoyerMessage'); ?>
			</div>
		</div>
	</div>
</div>
