<?php

class Entreprise extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('entreprise_model');
	}

	public function signup()
	{	$this->form_validation->set_rules('nom_entreprise','Nom de l\'entreprise','required');
		$this->form_validation->set_rules('pays','Pays','required');
		$this->form_validation->set_rules('adresse','Adresse','required');
		$this->form_validation->set_rules('ville','Ville','required');
		$this->form_validation->set_rules('numtel','numero de telephone','required|exact_length[10]');
		$this->form_validation->set_rules('email','email','trim|required|valid_email');
		$this->form_validation->set_rules('description','description','trim|required');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		$this->form_validation->set_message('valid_mail', 'email non valide');
		if ($this->form_validation->run() == false) {
		$data['title'] = 'Inscription entreprises';
		$this->render('signup',$data);
		} else {
			$data = array(
					'nom'=>$this->input->post('nom_entreprise'),
					'pays'=>$this->input->post('pays'),
					'adresse'=>$this->input->post('adresse'),
					'ville'=>$this->input->post('ville'),
					'fax'=>$this->input->post('fax'),
					'numTel'=>$this->input->post('numtel'),
					'email'=>$this->input->post('email'),
					'description'=>$this->input->post('description'),
				);
			$this->entreprise_model->createEntreprise($data);
			echo 'Validé';
		}
	}

}