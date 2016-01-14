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

	public function aPostule($sujet,$etudiant){
		$data = array(
			'sujetId' => $sujet,
			'etudiantId' => $etudiant
		);
		$this->db->where($data);
		$res = $this->db->get('Postulat')->result();
		return count($res) > 0;
	}

	public function estAccepte($s,$e){
		$data = array(
			'sujetId' => $s,
			'etudiantId' => $e,
			'etat' => 'C'
		);
		$this->db->where($data);
		$res = $this->db->get('Postulat')->result();
		return count($res) > 0;
	}

	public function estConfirme($s,$e){
		$data = array(
			'sujetId' => $s,
			'etudiantId' => $e,
			'etat' => 'B'
		);
		$this->db->where($data);
		$res = $this->db->get('Postulat')->result();
		return count($res) > 0;

	}

	public function updateSujet($criteria, $data) {
		$this->db->where($criteria);
		return $this->db->update('Sujet', $data);
	}
	public function postulats($criteria=[])
	{
		$this->db->select('p.sujetid , p.etat, e.*');
		$this->db->from('Postulat p');
		$this->db->join('Etudiant e','e.etudiantId = p.etudiantId');
		$this->db->where($criteria);
		return $this->db->get()->result();

	}

	public function updatePostulat($criteria,$data){
		$this->db->where($criteria);
		return $this->db->update('Postulat',$data);
	}

	public function createStage($data){
		return $this->db->insert('Stage', $data);
	}

	
}