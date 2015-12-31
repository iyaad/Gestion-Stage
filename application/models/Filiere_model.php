<?php

class Filiere_model extends CI_Model {

	public function getFilieres()
	{
		return $this->db->get('Filiere')->result();
	}

	public function getEtudiants($filiere){
		return $this->etudiant_model->getEtudiants(['filiere'=>$filiere]);

	}
}