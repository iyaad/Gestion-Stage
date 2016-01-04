<?php


class Sujet_model extends CI_Model {
	
	public function createSujet($data)
	{
		return $this->db->insert('Sujet', $data);
	}

	public function getSujets($criteria = []){
		$this->db->where($criteria);
		return $this->db->get('Sujet')->result();
	}

	public function getSujet($criteria = [])
	{
		$this->db->where($criteria);
		return $this->db->get('Sujet')->row();
	}

	public function infoSujets($criteria = [])
	{
		$this->db->select('s.*, e.entrepriseId, e.nom');
		$this->db->from('Sujet s');
		$this->db->join('Entreprise e','e.entrepriseId = s.entrepriseId');
		$this->db->where($criteria);
		return $this->db->get()->result();
	}

	public function infoSujet($criteria = [])
	{
		$this->db->select('s.*, e.entrepriseId, e.nom');
		$this->db->from('Sujet s');
		$this->db->join('Entreprise e','e.entrepriseId = s.entrepriseId');
		$this->db->where($criteria);
		return $this->db->get()->row();
	}

	public function updateSujet($criteria, $data) {
		$this->db->where($criteria);
		return $this->db->update('Sujet', $data);
	}
}