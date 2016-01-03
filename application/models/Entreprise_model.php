<?php

class Entreprise_model extends CI_Model {

	public function createEntreprise($Data) {
		return $this->db->insert('Entreprise',$Data);		
	}

	public function getAvatarUrl($id, $options = [])
	{
		$entreprise = $this->getEntreprise(['entrepriseId' => $id]);
		$path1 = FCPATH."uploads/logos/$id.jpg";
		$path2 = FCPATH."uploads/logos/$id.png";
		if (file_exists($path1)) {
			return base_url("uploads/logos/$id.jpg");
		} else if (file_exists($path2)) {
			return base_url("uploads/logos/$id.png");
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