<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sujet extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('hash');
		$this->load->model('entreprise_model');
		$this->load->model('filiere_model');
		$this->load->model('sujet_model');
		$this->load->model('user_model');
	}

	public function index($id)
	{
		$criteria =  array(
			'p.sujetId' => $id,
			'p.etat'=>'W',
			 );
		$data['sujet'] = $this->sujet_model->infoSujet(['sujetId' => $id]);
		$data['postulats']=$this->sujet_model->postulats($criteria);
		$data['title'] = $data['sujet']->titre;
		$this->render('sujet/infos', $data);
	}

	public function edit($id)
	{
		$sujet = $this->sujet_model->infoSujet(['sujetId' => $id]);
		if (currentSession()['id'] != $sujet->entrepriseId)
			return show_404();
		$this->form_validation->set_rules('titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[255]');
		$this->form_validation->set_rules('prerequis', 'Prérequis', 'required|trim|max_length[500]');
		$this->form_validation->set_rules('password', 'Mot de passe',
			array('required',
				array('check_password', array($this->user_model, 'check_password'))
			)
		);
		if ($this->form_validation->run() == false) {
			$data['sujet'] = $sujet;
			$data['title'] = 'Modifier un sujet';
			$this->render('sujet/edit', $data);
		} else {
			$data = array(
				'titre' => $this->input->post('titre'),
				'description' => $this->input->post('description'),
				'prerequis' => $this->input->post('prerequis'),
			);
			$this->sujet_model->updateSujet(['sujetId' => $id], $data);
			return redirect("sujet/$id");
		}
	}
}