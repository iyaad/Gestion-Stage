<?php

class Tuteur extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('etudiant_model');
		$this->load->model('email_model');
		$this->load->model('user_model');
		$this->load->model('tuteur_model');
		$this->load->model('filiere_model');
	}

	public function importer()
	{
		// If the form was submitted
		if (!empty($_FILES['liste']['name'])) {
			$config['upload_path'] = FCPATH.'uploads/';
			$config['file_name'] = 'liste';
			$config['allowed_types'] = 'csv';
			$config['overwrite'] = true;
			$this->load->library('upload', $config);
			// If upload failed display error
			if ($this->upload->do_upload('liste')) {
				$file_data = $this->upload->data();
				$file_path = FCPATH.'uploads/'.$file_data['file_name'];
				if ($csv_array = $this->csvimport->get_array($file_path, '', true)) {
					foreach ($csv_array as $etudiant) {
						$userId = $this->etudiant_model->createEtudiant($etudiant);
						$user = $this->user_model->getUser(['userId' => $userId]);
						$this->email_model->emailEtudiant($user);
					}
				}
				// Delete the csv file from the server
				unlink(FCPATH.'uploads/'.$file_data['file_name']);
			} else {
				$data['error'] = $this->upload->display_errors();
			}
		}
		$data['title'] = 'Importer depuis CSV';
		$this->render('tuteur/importer', $data);
	}

	public function index(){
		if(currentSession()['role'] != 'chef filiere'){
			return redirect('home');
		}
		$id = currentSession()['id'];
		$data['chef'] = $this->tuteur_model->getChefFiliere(['tuteurId'=>$id])[0];
		$filiere = $data['chef']->filiere;
		$data['etudiants'] = $this->filiere_model->getEtudiants($filiere);
		$data['title'] = 'Accueil Chef de filiere';
		$this->render('chefFiliere/accueil',$data);
	}

}