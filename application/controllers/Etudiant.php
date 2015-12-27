<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		
		$this->load->model('etudiant_model');
	}

	public function edit_profile($cne)
	{
		$this->load->library('hash');
		$this->form_validation->set_rules('password', 'Login', 'required|trim');
		$this->form_validation->set_rules('new_password', 'Mot de passe', 'required|trim');
		$this->form_validation->set_rules('adresse', 'Nouveau Mot de passe', 'trim');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		$etudiant = $this->etudiant_model->getEtudiant(['cne' => $cne]);
		$data['title'] = 'Profil de '.$etudiant->nom.' '.$etudiant->prenom;
		$data['etudiant'] = $etudiant;
		

		if ($this->form_validation->run() == false ){

			$this->render('etudiant/infos', $data);

		} else {
			$user =array('password' =>$this->input->post('new_password') ,
						 'adresse' =>$this->input->post('adresse'),
						 'cne'=>$etudiant->cne,
						 );
			$this->etudiant_model->majEtudiant($user);
			return redirect ($cne);
		}

	}

	public function profile($cne)
	{
		$etudiant = $this->etudiant_model->getEtudiant(['cne' => $cne]);
		$data['title'] = 'Profil de '.$etudiant->nom.' '.$etudiant->prenom;
		$data['etudiant'] = $etudiant;
		$this->render('etudiant/profile', $data);
	}


}