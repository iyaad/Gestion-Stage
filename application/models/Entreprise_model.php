<?php

class Entreprise_model extends CI_Model {

	public function createEntreprise($Data) {
		return $this->db->insert('Entreprise',$Data);		
	}

	public function getEntreprise($criteria)
	{
		return $this->getEntreprises($criteria)[0];
	}

	public function getEntreprises($criteria)
	{
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->get('Entreprise')->result();
	}

	public function getTempEntreprise(){
		return $this->getEntreprise(['verifie' => false]);
	}

	public function validerEntreprise($id, $userData)
	{
		$userId = $this->user_model->createUser($userData);
		$this->db->where('entrepriseId', $id);
		$data['entrepriseId'] = $userId;
		$data['verifie'] = true;
		return $this->db->update('Entreprise', $data);
	}

}