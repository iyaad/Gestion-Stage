<?php

class Entreprise_model extends CI_Model {

	public function createEntreprise($Data) {
		return $this->db->insert('Entreprise',$Data);		
	}

	public function getTempEntreprise(){
		$this->db->where('verifie',false);
		return $this->db->get('Entreprise')->result();
		
	}

	

}