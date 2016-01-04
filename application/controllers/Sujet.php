<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sujet extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('entreprise_model');
		$this->load->model('filiere_model');
		$this->load->model('sujet_model');
	}

	public function index($id)
	{
		$data['sujet'] = $this->sujet_model->infoSujet(['sujetId' => $id]);
		$data['title'] = $data['sujet']->titre;
		$this->render('sujet/infos', $data);
	}
}