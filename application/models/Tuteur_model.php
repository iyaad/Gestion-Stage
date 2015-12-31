<?php


class Tuteur_model extends CI_Model {
	
	public function createChefFiliere($userData, $data)
	{
		$userId = $this->user_model->createUser($userData);
		$data['tuteurId'] = $userId;
		return $this->db->insert('Tuteur', $data);
	}

	public function getChefFiliere($criteria){
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->get('Tuteur')->result();

	}
}