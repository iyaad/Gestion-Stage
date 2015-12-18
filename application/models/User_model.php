<?php

class User_model extends CI_Model {


	public function getUser($id){
		$query = $this->db->get_where('User', array('userId' => $id);
		return $query->row();
	}
	public function createUser($data){
		return $this->db->insert('User',$data);


	}
	public function updateUser($id,$data){
		$this->db->where('userId',$id);
		return $this->db->update('User',$data);
	}

}

