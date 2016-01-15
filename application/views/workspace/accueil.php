
<div class="content-page">
	<div class="content">
		<div class="wraper container-fluid">
			<ul class="nav nav-tabs"> 
				<li class="active"> 
					<a href="#received" data-toggle="tab" aria-expanded="false"> 
						<span class="visible-xs"><i class="fa fa-message"></i></span> 
						<span class="hidden-xs">Messages Reçus</span> 
					</a> 
				</li> 
				<li class=""> 
					<a href="#sent" data-toggle="tab" aria-expanded="true">
						<span class="visible-xs"><i class="fa fa-pencil"></i></span>
						<span class="hidden-xs">Messages Envoyés</span>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="received">
					<?php $this->load->view('workspace/messages', ['messages' => $messages_recus , 'V' => 'DE']); ?>
				</div>
				<div class="tab-pane" id="sent">
					<?php $this->load->view('workspace/messages', ['messages' => $messages_envoyes , 'V' => 'A']); ?>
				</div>
			</div>
					
			<div class="row">
				<?php $this->load->view('workspace/envoyerMessage', ['id' => $id]); ?>
			</div>
		</div>
	</div>
</div>
