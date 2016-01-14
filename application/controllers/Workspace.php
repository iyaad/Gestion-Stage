<?php

class Workspace extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('etudiant_model');
		$this->load->model('email_model');
		$this->load->model('sujet_model');
		$this->load->model('entreprise_model');
		$this->load->model('user_model');
		$this->load->model('tuteur_model');
		$this->load->model('filiere_model');
		$this->load->library('random');
		$this->load->library('hash');
	}

	public function acceuil(){
		if( !isEnStage()){
			return redirect('home');
		}
		$data['title'] = 'Espace de Travail';
		$this->render('workspace/acceuil',$data);

	}
	
}