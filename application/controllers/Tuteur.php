<?php

class Tuteur extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('etudiant_model');
		$this->load->model('tuteur_model');
		$this->load->model('user_model');
	}

	public function importer()
	{
		// If the form was submitted
		if (isset($_FILES['liste'])) {
			$config['upload_path'] = FCPATH.'uploads/';
			$config['file_name'] = 'liste';
			$config['allowed_types'] = 'csv';
			$this->load->library('upload', $config);
			// If upload failed display error
			if ($this->upload->do_upload('liste')) {
				$file_data = $this->upload->data();
				$file_path = FCPATH.'uploads/'.$file_data['file_name'];
				if ($csv_array = $this->csvimport->get_array($file_path)) {
					foreach ($csv_array as $etudiant) {
						$userId = $this->etudiant_model->createEtudiant($etudiant);
						$user = $this->user_model->getUser($userId);
						$this->tuteur_model->emailEtudiant($user);
					}
				}
			} else {
				$data['error'] = $this->upload->display_errors();
			}
		}
		$data['title'] = 'Importer depuis CSV';
		$this->render('tuteur/importer', $data);
	}

}