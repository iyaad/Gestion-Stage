<?php  foreach (array_chunk($messages, 3)as $row): ?>
<div class="row">
	<?php  foreach ($row as $m): ?>
	<div class="col-lg-4">
		<div class="portlet">
			<div class="portlet-heading bg-success">
				<h3 class="portlet-title">

					<?= $V ?> : <?= $this->user_model->resolveName($m->expediteur) ?>
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
					<?= $m->message ?>
				</div>
			</div>
		</div>
	</div>			
	<?php endforeach ?>
</div>							
<?php endforeach ?>