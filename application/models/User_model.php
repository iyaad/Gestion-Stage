<?php

class User_model extends CI_Model {

	public function getUsers($criteria) {
		$this->db->where($criteria);
		$query = $this->db->get('User');
		return $query->result();
	}

	public function getUser($criteria)
	{
		$this->db->where($criteria);
		return $this->db->get('User')->row();
	}

	public function getUserByUsername($username) {
		return $this->getUser(['username' => $username]);
	}

	public function createUser($data) {
		$this->db->insert('User', $data);
		return $this->db->insert_id();
	}

	public function updateUser($criteria, $data) {
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->update('User', $data);
	}

	public function updatePassword($id, $password) {
		return $this->updateUser(['userId' => $id], ['password' => $password]);
	}

	// Form validation callbacks
	public function check_password($password)
	{
		$user = $this->user_model->getUser(['userId' => currentSession()['id']]);
		$this->form_validation->set_message('check_password', 'Mot de passe incorrect');
		return $this->hash->check_password($password, $user->password);
	}

	public function resolveName($id){

		$role = $this->getUser(['userId' => $id])->role;
		$name = '';
		switch ($role) {
			case 'etudiant':
				$name = $this->etudiant_model->getEtudiant(['etudiantId' => $id]);
				$name = $name->nom.' '.$name->prenom;
				break;	
			case 'tuteur':
				$name = $this->tuteur_model->getTuteur(['tuteurId' => $id]);
				$name = $name->nom.' '.$name->prenom;
				break;
			case 'tuteur ext':
				$name = $this->tuteur_model->getTuteurExt(['tuteurId' => $id]);
				$name = $name->nom.' '.$name->prenom;
				break;
			case 'entreprise':
				$name = $this->entreprise_model->getEntreprise(['entrepriseId' => $id]);
				$name = $name->nom;
				break;
			default:
				# code...
				break;
		}
		return $name;
	}
}

