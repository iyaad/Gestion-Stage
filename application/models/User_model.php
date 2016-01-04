<?php

class User_model extends CI_Model {

	public function getUsers($criteria) {
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		$query = $this->db->get('User');
		return $query->result();
	}

	public function getUser($criteria)
	{
		return $this->getUsers($criteria)[0];
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
}

