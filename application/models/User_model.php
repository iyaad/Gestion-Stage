<?php

class User_model extends CI_Model {

	public function getUser($id) {
		$query = $this->db->query('select * from user where userId='.$id);
		return $query->row();
	}
}