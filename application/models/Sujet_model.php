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

	public function getSujet($criteria = [])
	{
		return $this->getSujets($criteria)[0];
	}

	public function infoSujets($criteria = [])
	{
		$this->db->select('s.*, e.entrepriseId, e.nom');
		$this->db->from('Sujet s');
		$this->db->join('Entreprise e','e.entrepriseId = s.entrepriseId');
		foreach ($criteria as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->get()->result();
	}

	public function infoSujet($criteria = [])
	{
		return $this->infoSujets($criteria)[0];
	}
}