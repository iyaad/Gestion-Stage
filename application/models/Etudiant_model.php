<?php

use Carbon\Carbon;

class Etudiant_model extends CI_Model {

	public function createEtudiant($Data) {
		$this->load->library('hash');
		$user = array(
			'username' => $Data['cne'],
			'password' => $this->hash->password($Data['cne']),
			'email' => $Data['email'],
			'numTel' => $Data['numTel'],
			'adresse' => "tanger",
			'createdAt' => gmdate('Y-m-d H:i:s'),
			'updatedAt' => gmdate('Y-m-d H:i:s'),
		);
		$this->db->insert('User',$user);
		$userId = $this->db->insert_id();

		$data = array(
			'etudiantId' => $userId,
			'nom' => $Data['nom'],
			'prenom' => $Data['prenom'],
			'filiere' => $Data['filiere'],
			'niveau' =>  $Data['niveau'],
			'cne' =>  $Data['cne'],
			'dateNaissance' => Carbon::createFromFormat('d-m-Y', $Data['dateNaissance']),
			'createdAt' => gmdate('Y-m-d H:i:s'),
			'updatedAt' => gmdate('Y-m-d H:i:s'),
		);
		$this->db->insert("Etudiant" , $data);
		return $userId;
	}

}