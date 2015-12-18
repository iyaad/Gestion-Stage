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
		$this->form_validation->set_rules('liste', 'Liste des Etudiants', 'required|trim|callback_check_file');

		if ($this->form_validation->run()) {
			echo 'uploaded';
		} else {
			$data['title'] = 'Importer depuis CSV';
			$this->render('tuteur/importer', $data);
		}
	}

	public function check_file()
	{
		$config['upload_path'] = FCPATH.'uploads/';
		$config['file_name'] = 'liste';
		$config['allowed_types'] = 'pdf';
		$this->load->library('upload', $config);
		// If upload failed display error
		if ($this->upload->do_upload('liste')) {
			// $file_data = $this->upload->data();
			// $file_path = FCPATH.'uploads/'.$file_data['file_name'];
			// echo $file_path;
			return true;
		} else {
			$this->form_validation->set_message('check_file', strip_tags($this->upload->display_errors()));
			return false;
		}
	}
}