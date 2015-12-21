<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('hash');
		$this->load->model('etudiant_model');
	}

	public function profil($id)
	{
		$etudiant = $this->etudiant_model->getEtudiant($id);
		dd($etudiant);
	}
}