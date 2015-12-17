<?php

class User_model extends CI_Model {

	public function getUser($id){
		$query = $this->db->get_where('User', array('userId' => $id);
		return $query->row();
	}
	
}

?>