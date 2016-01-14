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

	public function accueil(){
		if( !isEtudiantEnStage()){
			return redirect('home');
		}
		$data['title'] = 'Espace de Travail';
		$data['tuteurs'] = $this->sujet_model->getStage(['s.etudiantId'=>currentSession()['id']]);
		$this->render('workspace/accueil',$data);

	}
	public function envoyerMessage()
	{
		$this->form_validation->set_rules('tuteur', "Tuteur",'required|trim');
		$this->form_validation->set_rules('message',"Message",'required');

		/* if ($this->form_validation->run() == false){
			$data['title'] = 'Envoyer un message';
			$data['tuteurs'] = $this->sujet_model->getStage(['s.etudiantId'=>currentSession()['id']]);
			$this->render('workspace/envoyerMessage', $data);
		}*/

		if($this->form_validation->run() == false)
			return redirect('accueil');



	}
	
}