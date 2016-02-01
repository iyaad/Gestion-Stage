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



	public function nbEtudiant(){
		return count($this->db->get('Etudiant')->result());
	}

	public function nbTuteur(){
		return count($this->db->get('Tuteur')->result());
	}

	public function nbTuteurExt(){
		return count($this->db->get('TuteurExt')->result());
	}
	public function chefFiliere(){
		$id=currentId();
		$filiereId = $this->tuteur_model->getTuteur(['tuteurId' => $id])->chefId;
		$filiere = $this->filiere_model->getFiliere(['filiereId' => $filiereId ])->code ;

		$etudiant = $this->etudiant_model->getEtudiants(['filiere' =>$filiere]);

		$etudiantEnRecherche = $this->sujet_model->postulats(['p.etat' => 'W' , 'e.filiere'=>$filiere]);
		$etudiantEnRecherche =count($etudiant);
		return [$etudiantEnRecherche];
	}


	


	public function nbEntreprises()
	{
		$this->db->from('User');
		$this->db->where('role', 'entreprise');
		return $this->db->count_all_results();
	}


}