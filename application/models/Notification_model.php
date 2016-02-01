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
		if (isEtudiantEnStage()) {
			$id = currentId();
			return [$this->notification(
				'Test',
				'Ceci est un test',
				'home',
				base_url()
			)];
		} else {
			return [];
		}
	}
}