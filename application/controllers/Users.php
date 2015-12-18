<?php

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Login', 'required|trim|callback_check_username');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim');
		$this->form_validation->set_message('required', 'Le champs %s est obligatoire');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->render('login', $data);
		} else {
			echo 'Validé';
		}
	}

	public function check_username($username)
	{
		$this->form_validation->set_message('check_username', '%s inexistant');
		return (bool) $this->user_model->getUserByUsername($username);
	}

}