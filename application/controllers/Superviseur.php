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
		$this->load->model('filiere_model');

	}

	public function index(){
		$ent_non_verif = $this->entreprise_model->getTempEntreprise();
		$data['filieres'] = $this->filiere_model->getFilieres();
		$data['ent_non_verif'] = $ent_non_verif;
		$data['title'] = 'Accueil Superviseur';
		$this->render('superviseur/acceuil',$data);
	}

	public function valider_entreprise($id)
	{
		$e = $this->entreprise_model->getEntreprise(['entrepriseId' => $id])[0];
		$rand = $this->random->generateString(10);
		$data = array(
			'username' => $e->email,
			'password' => $this->hash->password($rand),
			'email' => $e->email,
			'numTel' => $e->numTel,
			'adresse' => $e->adresse,
			'role' => 'entreprise',
			'createdAt' => gmdate('Y-m-d H:i:s'),
			'updatedAt' => gmdate('Y-m-d H:i:s'),
		);
		if ($this->entreprise_model->validerEntreprise($id, $data)) {
			$this->email_model->emailEntreprise($data['username'], $rand);
		} else {
			// Alert error
			echo 'error';
		}
	}
}