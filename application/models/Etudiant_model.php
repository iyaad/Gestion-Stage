<?php

use Carbon\Carbon;

class Etudiant_model extends CI_Model {

	public function createEtudiant($Data) {
		$data = array(
			'nom' => $Data['nom'],
			'prenom' => $Data['prenom'],
			'filiere' => $Data['filiere'],
			'niveau' =>  $Data['niveau'],
			'cne' =>  $Data['cne'],
			'dateNaissance' => Carbon::createFromFormat('d-m-Y', $Data['dateNaissance']),
			'createdAt' => gmdate('Y-m-d H:i:s'),
			'updatedAt' => gmdate('Y-m-d H:i:s'),
		);
		return $this->db->insert("Etudiant" , $data);
	}
}