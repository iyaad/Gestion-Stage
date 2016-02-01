<?php

use Carbon\Carbon;

class Etudiant_model extends CI_Model {

	public function createEtudiant($Data) {
		$this->load->library('hash');
		$user = array(
			'username' => $Data['cne'],
			'password' => $this->hash->password($Data['cne']),
			'role' => 'etudiant',
			'email' => $Data['email'],
			'numTel' => $Data['numTel'],
			'adresse' => $Data['adresse'],
			'createdAt' => gmdate('Y-m-d H:i:s'),
			'updatedAt' => gmdate('Y-m-d H:i:s'),
		);
		$this->db->insert('User',$user);
		$userId = $this->db->insert_id();

		$data = array(
			'etudiantId' => $userId,
			'cne' =>  $Data['cne'],
			'nom' => $Data['nom'],
			'prenom' => $Data['prenom'],
			'filiere' => $Data['filiere'],
			'niveau' =>  $Data['niveau'],
			'dateNaissance' => Carbon::createFromFormat('d-m-Y', $Data['dateNaissance']),
			'ville' => $Data['ville'],
			'pays' => $Data['pays'],
			'createdAt' => gmdate('Y-m-d H:i:s'),
			'updatedAt' => gmdate('Y-m-d H:i:s'),
		);
		$this->db->insert("Etudiant" , $data);
		return $userId;
	}

	public function getAvatarUrl($cne, $options = [])
	{
		$etudiant = $this->getEtudiant(['cne' => $cne]);
		$path = FCPATH."uploads/photos/$cne.jpg";
		if (file_exists($path)) {
			return base_url("uploads/photos/$cne.jpg");
		}
		return $this->user_model->getAvatarUrl($etudiant->email);
	}

	public function getEtudiants($criteria)
	{
		$this->db->select('e.*, u.email, u.numTel, u.adresse , u.role');
		$this->db->from('Etudiant e');
		$this->db->join('User u', 'u.userId = e.etudiantId');
		$this->db->where($criteria);
		return $this->db->get()->result();
	}

	public function getEtudiant($criteria)
	{
		$this->db->select('e.*, u.email, u.numTel, u.adresse , u.role');
		$this->db->from('Etudiant e');
		$this->db->join('User u', 'u.userId = e.etudiantId');
		$this->db->where($criteria);
		return $this->db->get()->row();
	}

	public function updateEtudiant($criteria, $data)
	{
		$this->db->where($criteria);
		$this->db->update('Etudiant', $data);
	}
}