<?php

class User_model extends CI_Model {

<<<<<<< HEAD
	public function getUser($id){
		$query = $this->db->get_where('User', array('userId' => $id);
		return $query->row();
	}
	
}

?>
=======
	public function getUser($id) {
		$query = $this->db->query('select * from user where userId='.$id);
		return $query->row();
	}
}
>>>>>>> 0de0422591343c9a3d5e2397a744c5a7636a7b23
