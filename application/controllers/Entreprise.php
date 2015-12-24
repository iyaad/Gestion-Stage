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
	{
		$this->form_validation->set_rules('nom_entreprise', "Nom Entreprise",'required|trim');
		$this->form_validation->set_rules('pays','Pays','required');
		$this->form_validation->set_rules('adresse','Adresse','required|trim');
		$this->form_validation->set_rules('ville','Ville','required');
		$this->form_validation->set_rules('numtel','Numero de Telephone','required|trim');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('description','Description','trim|required');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		$this->form_validation->set_message('valid_mail', 'Email invalide');
		if ($this->form_validation->run() == false) {
			$data['NOTOPBAR'] = true;
			$data['NOSIDEBAR'] = true;
			$data['title'] = 'Inscription entreprises';
			$this->render('signup',$data);
		} else {
			$data = array(
				'nom'=>$this->input->post('nom_entreprise'),
				'pays'=>$this->input->post('pays'),
				'ville'=>$this->input->post('ville'),
				'adresse'=>$this->input->post('adresse'),
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