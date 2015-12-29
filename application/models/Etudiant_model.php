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

	public function getAvatarUrl($cne, $options = [])
	{
		$etudiant = $this->getEtudiant(['cne' => $cne]);
		$path = FCPATH."uploads/photos/$cne.jpg";
		if (file_exists($path)) {
			return base_url("uploads/photos/$cne.jpg");
		}
		$email = $etudiant->email;
		$size = isset($options['size']) ? $options['size'] : 100;
		return 'http://www.gravatar.com/avatar/'.md5($email).'?s='.$size.'&d=identicon';
	}


	public function getEtudiant($criteria)
	{
		$this->db->select('e.*, u.email, u.numTel, u.adresse , u.role');
		$this->db->from('Etudiant e');
		$this->db->join('User u', 'u.userId = e.etudiantId');
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->get()->row();
	}

	public function updateEtudiant($id, $data)
	{
		$this->db->where('userId', $id);
		$this->db->update('User', $data);
	}
}