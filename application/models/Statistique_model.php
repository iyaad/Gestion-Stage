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



	public function Etudiant(){
		return count($this->db->get('Etudiant')->result());
	}

	public function Tuteur(){
		return count($this->db->get('Tuteur')->result());
	}

	public function Entreprise(){
		return count($this->db->get('Entreprise')->result());
	}


}