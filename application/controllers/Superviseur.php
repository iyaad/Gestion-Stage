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
		$this->load->model('tuteur_model');
	}

	public function index(){
		$data['filieres'] = $this->filiere_model->getFilieres();
		$data['ent_non_verif'] = $this->entreprise_model->getTempEntreprise();
		$data['title'] = 'Accueil Superviseur';
		$this->render('superviseur/acceuil',$data);
	}

	public function ajouter_chef_filiere()
	{
		$this->form_validation->set_rules('departement', 'Département', 'required|trim');
		$this->form_validation->set_rules('filiere', 'Filiere', 'required|trim');
		$this->form_validation->set_rules('nom', 'Nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('numtel', 'Téléphone', 'required|trim');

		if (!$this->form_validation->run()) {
			$this->index();
		} else {
			$rand = $this->random->generateString(10);
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$username = url_title("$nom $prenom", '-', true);
			$userData = array(
				'username' => $username,
				'password' => $this->hash->password($rand),
				'email' => $this->input->post('email'), 
				'numTel' => $this->input->post('numtel'),
				'role' => 'chef filiere',
				'adresse' => '',
				'createdAt' => gmdate('Y-m-d H:i:s'),
				'updatedAt' => gmdate('Y-m-d H:i:s'),
			);
			$data = array(
				'nom' => $nom,
				'prenom' => $prenom,
				'departement' => $this->input->post('departement'),
				'filiere' => $this->input->post('filiere'),
				'chefId' => NULL,
			);
			$this->tuteur_model->createChefFiliere($userData, $data);
			if ($this->email_model->emailChefFiliere($email, $username, $rand)) {
				// Alert success
				return redirect('superviseur');
			} else {
				$this->index();
			}
		}
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
			// Alert success
			return redirect('superviseur');
		} else {
			// Alert error
			echo 'error';
		}
	}
}