<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('hash');
		$this->load->model('etudiant_model');
	}

	public function edit_profile($cne)
	{
		$etudiant = $this->etudiant_model->getEtudiant(['cne' => $cne]);
		$data['title'] = 'Profil de '.$etudiant->nom.' '.$etudiant->prenom;
		$data['etudiant'] = $etudiant;
		$this->render('etudiant/infos', $data);
	}

	public function profile($cne)
	{
		$etudiant = $this->etudiant_model->getEtudiant(['cne' => $cne]);
		$data['title'] = 'Profil de '.$etudiant->nom.' '.$etudiant->prenom;
		$data['etudiant'] = $etudiant;
		$this->render('etudiant/profile', $data);
	}
}