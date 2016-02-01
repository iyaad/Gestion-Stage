<?php

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
		if (isEtudiant()) {
			$id = currentId();
			if ($this->etudiant_model->preSoutenance($id)) {
				return [$this->notification(
					'Date de soutenance!',
					'Cliquez pour choisir la date',
					'exclamation-triangle',
					base_url('etudiant/finaliserSoutenance')
				)];
			} else if (isEtudiantEnStage()) {

			}
			return [];
		} else {
			return [];
		}
	}
}