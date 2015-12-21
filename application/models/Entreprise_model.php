<?php

class Entreprise_model extends CI_Model {

	public function createEntreprise($Data) {
		
		$this->db->insert('entreprise',$Data);		
	}

}