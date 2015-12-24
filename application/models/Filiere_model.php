<?php

class Filiere_model extends CI_Model {

	public function getFilieres()
	{
		return $this->db->get('Filiere')->result();
	}
}