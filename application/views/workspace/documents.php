<h3>Fichiers partagés</h3>
<?php foreach (glob(FCPATH."uploads/workspace/".$id."_*") as $filename): 
$file = substr(basename($filename), 3);
?>
	<?= $file . ' ('. date('d/m/Y H:i', strtotime($this->message_model->getMessage(['filename' => $file])->date)) .') - ' . anchor('workspace/download_file/'.urlencode(basename($filename)), 'Télécharger') ?>
<?php endforeach ?>