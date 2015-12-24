<?php

class Entreprise_model extends CI_Model {

	public function createEntreprise($Data) {
		
		$this->db->insert('entreprise',$Data);		
	}

	public function getTempEntreprise(){
		$this->db->where('verifie',false);
		return $this->db->get('Entreprise')->result();
		
	}

	

}