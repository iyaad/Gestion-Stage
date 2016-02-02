<?php

class Filiere_model extends CI_Model {

	public function getFilieres()
	{
		return $this->db->get('Filiere')->result();
	}

	public function getFiliere($criteria)
	{
		$this->db->where($criteria);
		return $this->db->get('Filiere')->row();
	}

	public function getEtudiants($filiere){
		return $this->etudiant_model->getEtudiants(['filiere'=>$filiere]);

	}
	public function createFiliere($data)
	{
		return $this->db->insert('Filiere', $data);
	}

}