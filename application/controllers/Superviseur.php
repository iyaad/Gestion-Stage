<?php

class Superviseur extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('hash');
		$this->load->library('random');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('entreprise_model');

	}

	public function index(){
		$ent_non_verif = $this->entreprise_model->getTempEntreprise();
		$data['ent_non_verif'] = $ent_non_verif;
		$data['title'] = 'Accueil Superviseur';
		$this->render('superviseur/acceuil',$data);
	} 
}