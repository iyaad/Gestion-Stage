<?php


class Tuteur_model extends CI_Model {
	
	public function createChefFiliere($userData, $data)
	{
		$userId = $this->user_model->createUser($userData);
		$data['tuteurId'] = $userId;
		return $this->db->insert('Tuteur', $data);
	}

	public function getChefFiliere($criteria = []){
		$this->db->where($criteria);
		return $this->db->get('Tuteur')->row();
	}
	public function getTuteurs($criteria = [])
	{
		$this->db->where($criteria);
		return $this->db->get('Tuteur')->result();
	}

	public function getTuteur($criteria = [])
	{	
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
	public function createTuteurExt($userData,$data)
	{	
		$userId = $this->user_model->createUser($userData);
		$data['tuteurId'] = $userId;
		return $this->db->insert('TuteurExt', $data);
		
	}
	public function createTuteur($userData,$data)
	{	
		$userId = $this->user_model->createUser($userData);
		$data['tuteurId'] = $userId;
		return $this->db->insert('Tuteur', $data);
		
	}

	public function createJury($data){
		return $this->db->insert('Jury',$data);
	}

	public function getJurys($criteria){
		$this->db->where($criteria);
		return $this->db->get('Jury')->result();
	}

	public function getJury($criteria){
		$this->db->where($criteria);
		return $this->db->get('Jury')->row();
	}
}