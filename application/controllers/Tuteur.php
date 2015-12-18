<?php

class Tuteur extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->library('form_validation');
	}

	public function importer()
	{
		$this->form_validation->set_rules('liste', 'Liste des Etudiants', 'required|trim');

		if ($this->form_validation->run()) {
			$config['upload_path'] = FCPATH.'uploads/';
			$config['file_name'] = 'liste.csv';
			$config['allowed_types'] = 'csv';
			$this->load->library('upload', $config);
			// If upload failed display error
			if ($this->upload->do_upload()) {
				$file_data = $this->upload->data();
				$file_path = FCPATH.'uploads/'.$file_data['file_name'];
				echo $file_path;
				return;
			} else {
				$data['error'] = $this->upload->display_errors();
			}
		}
		$data['title'] = 'Importer depuis CSV';
		$this->render('tuteur/importer', $data);
	}
}