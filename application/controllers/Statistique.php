<?php
class Statistique extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('hash');
		$this->load->library('email');
		$this->load->library('random');
		$this->load->model('entreprise_model');
		$this->load->model('sujet_model');
		$this->load->model('etudiant_model');
		$this->load->model('filiere_model');
		$this->load->model('user_model');
		$this->load->model('tuteur_model');
		$this->load->model('email_model');
		$this->load->model('statistique_model');

	}

	public function index() {
		$data['title'] = 'Statistiques' ;
		$data['etudiantsEnStage'] = $this->statistique_model->EtudiantEnStage();
		$data['etudiantsEnRechercheStage'] = $this->statistique_model->EtudiantEnRechercheStage();
		$data['etudiantsEnSoutenance'] = $this->statistique_model->EtudiantEnSoutenance();
		return $this->render('statistique/accueil',$data);
	}
}
?>