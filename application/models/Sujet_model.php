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
<<<<<<< HEAD
<<<<<<< HEAD

	public function aPostule($sujet,$etudiant){

		$data = array(
			'sujetId' => $sujet,
			'etudiantId' => $etudiant
			);
		$this->db->where($data);
		$res = $this->db->get('Postulat')->result();
		return count($res) > 0 ;
=======
	public function nbreSujets($id)
	{
		$this->load->model('etudiant_model');
		$etudiant = $this->etudiant_model->getEtudiant(array('etudiantId'=>$id));
		$this->db->select('e.*');
		$this->db->from('etudiant e');
		$this->db->where('niveau',$etudiant->filiere);
		$this->db->where('filiere',$etudiant->niveau);
		return $this->db->count_all_results();
>>>>>>> 6a7467d0035cc0bad55a5acf6189744d83f3b5ec
=======

	public function updateSujet($criteria, $data) {
		$this->db->where($criteria);
		return $this->db->update('Sujet', $data);
>>>>>>> bd31f1ae789fbc452171a6c2d25d7e2f25fb9028
	}
}