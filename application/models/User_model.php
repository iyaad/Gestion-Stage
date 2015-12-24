<?php

class User_model extends CI_Model {

	public function getUser($criteria) {
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		$query = $this->db->get('User');
		return $query->row();
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
		$this->db->where('userId', $id);
		return $this->db->update('User', $password);
	}

}

