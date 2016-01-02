<?php

class Entreprise_model extends CI_Model {

	public function createEntreprise($Data) {
		return $this->db->insert('Entreprise',$Data);		
	}

	public function getAvatarUrl($email, $options = [])
	{
		$entreprise = $this->getEntreprise(['email' => $email]);
		$path = FCPATH."uploads/logos/$email.jpg";
		if (file_exists($path)) {
			return base_url("uploads/logos/$email.jpg");
		}
		$size = isset($options['size']) ? $options['size'] : 100;
		return 'http://www.gravatar.com/avatar/'.md5($email).'?s='.$size.'&d=identicon';
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

	public function updateEntreprise($id, $data)
	{
		$this->db->where('entrepriseId', $id);
		$this->db->update('Entreprise', $data);
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