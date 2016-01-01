<?php


class Sujet_model extends CI_Model {
	
	public function createSujet($data)
	{
		return $this->db->insert('Sujet', $data);
	}

	public function getSujets($criteria = []){
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->get('Sujet')->result();
	}
	
}