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

	public function sujetEstSature($sid) {
		$nbPlaces = $this->db->query('select nbPlaces from Sujet where sujetId = ?', array($sid))->row()->nbPlaces;
		$nbPostulants = $this->db->query("select count(*) as nb from Postulat where sujetId = ? and etat = 'C'", array($sid))->row()->nb;
		return $nbPostulants >= $nbPlaces;
	}

	public function aPostule($sujet,$etudiant,$etat=null){
		$data = array(
			'sujetId' => $sujet,
			'etudiantId' => $etudiant,
		);
		if ($etat != null) 
			$data['etat'] = $etat;
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

	public function sujetIndisponible($e, $s){
		$nb = $this->db->query("select count(*) as nb from Postulat where etudiantId = ? and sujetId = ? and (etat = 'B' or etat = 'A')", array($e,$s))->row()->nb;
		return $nb == 0;
	}

	public function estConfirme($s,$e){
		$data = array(
			'sujetId' => $s,
			'etudiantId' => $e,
			'etat' => 'B',
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

	public function getStage($criteria=[]){
		$this->db->select('s.* , e.nom as nomEtudiant , e.prenom as prenomEtudiant , e.cne , t.nom as nomTuteur ,
							t.prenom as prenomTuteur ,t1.nom as nomTuteurExt ,t1.prenom as prenomTuteurExt,su.titre');
		$this->db->from('Stage s');
		$this->db->join('Etudiant e','e.etudiantId = s.etudiantId');
		$this->db->join('Tuteur t','t.tuteurId = s.tuteurId');
		$this->db->join('TuteurExt t1','t1.tuteurId = s.tuteurExtId');
		$this->db->join('Sujet su','su.sujetId = s.sujetId');

		$this->db->where($criteria);
		return $this->db->get()->row();
	}
	public function getStages($criteria=[]){
		$this->db->select('s.* , e.nom as nomEtudiant , e.prenom as prenomEtudiant , e.cne , t.nom as nomTuteur ,
							t.prenom as prenomTuteur ,t1.nom as nomTuteurExt ,t1.prenom as prenomTuteurExt,su.titre');
		$this->db->from('Stage s');
		$this->db->join('Etudiant e','e.etudiantId = s.etudiantId');
		$this->db->join('Tuteur t','t.tuteurId = s.tuteurId');
		$this->db->join('TuteurExt t1','t1.tuteurId = s.tuteurExtId');
		$this->db->join('Sujet su','su.sujetId = s.sujetId');

		$this->db->where($criteria);
		return $this->db->get()->result();
	}


	public function enStage($criteria){
		
		$res = $this->getStage($criteria);
		return count($res) > 0;

	}

	
}