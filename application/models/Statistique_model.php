<?php

class Statistique_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('entreprise_model');
		$this->load->model('sujet_model');
		$this->load->model('etudiant_model');
		$this->load->model('filiere_model');
		$this->load->model('user_model');
		$this->load->model('tuteur_model');
		$this->load->model('email_model');

	}

	public function EtudiantEnStage(){
		$etudiants = count($this->db->get('Etudiant')->result());
		$query = $this->db->query("SELECT DISTINCT etudiantId FROM Stage;");
		$EtudiantEnStage = $query->result();
		return count($EtudiantEnStage)/($etudiants);
	}

	public function EtudiantEnRechercheStage(){
		$etudiants = count($this->db->get('Etudiant')->result());
		$query = $this->db->query("SELECT DISTINCT etudiantId FROM Postulat WHERE etat = 'W';");
		$EtudiantEnRechercheStage = $query->result();
		return count($EtudiantEnRechercheStage)/($etudiants);
	}

	public function EtudiantEnSoutenance(){
		$etudiants = count($this->db->get('Etudiant')->result());
		$query = $this->db->query("SELECT stageId FROM Soutenance;");
		$EtudiantEnSoutenance = $query->result();
		return count($EtudiantEnSoutenance)/($etudiants);
	}



}