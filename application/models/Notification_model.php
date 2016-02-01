<?php
use Carbon\Carbon;
class Notification_model extends CI_Model {


	public function notification($title, $desc, $icon, $url)
	{
		$res = new stdClass();
		$res->title = $title;
		$res->desc = $desc;
		$res->icon = $icon;
		$res->url = $url;
		return $res;
	}

	public function dailyNotifs()
	{
		$notifs = [];
		if (isEtudiant()) {
			$id = currentId();
			if ($this->etudiant_model->preSoutenance($id)) {
				$notifs[] = $this->notification(
					'Date de soutenance!',
					'Cliquez pour choisir la date',
					'exclamation-triangle',
					'#'
				);
			} else if (isEtudiantEnStage()) {
				$messages = $this->message_model->getMessages(['destinataire' => currentId()]);
				$todays = [];
				foreach($messages as $m) {
				}
				if (count($messages) > 0) {
					$suffix = count($messages) == 1 ? 'nouveau message' : 'nouveaux messages';
					$notifs[] = $this->notification(
						'Nouveau Message!',
						'Vous avez ' .count($messages).' '. $suffix,
						'envelope',
						base_url('worskpace/accueil/'.$id)
					);
				}
			}
		}
		return $notifs;
	}
}