<?php


class Tuteur_model extends CI_Model {
	
	public function createChefFiliere($userData, $data)
	{
		$userId = $this->user_model->createUser($userData);
		$data['tuteurId'] = $userId;
		return $this->db->insert('Tuteur', $data);
	}

	public function getChefFiliere($criteria){
		$this->db->where($criteria);
		return $this->db->get('Tuteur')->row();
	}

	public function getTuteursExt($criteria)
	{
		$this->db->where($criteria);
		return $this->db->get('TuteurExt')->result();
	}

	public function getTuteurExt($criteria)
	{	
		$this->db->where($criteria);
		return $this->db->get('TuteurExt')->row();
	}
	public function createTuteur($data)
	{
		$user = array(
			'nom' => $Data['nom'],
			'prenom' => $Data['prenom'],
			'entrepriseId' => $Data['entrepriseId'],
			'email' => $Data['email'],
		);
		$this->db->insert('TuteurExt',$user);
	}
}