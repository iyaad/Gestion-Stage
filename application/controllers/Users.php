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
		$this->form_validation->set_rules('username', 'Login', 'required|trim|callback_check_login');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim');
		$this->form_validation->set_message('required', 'Le champs %s est obligatoire');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->render('login', $data);
		} else {
			echo 'Validé';
		}
	}

	public function check_login($username)
	{
		$user = $this->user_model->getUserByUsername($username);
		if (!$user) {
			$this->form_validation->set_message('check_login', '%s inexistant');
			return false;
		}
		$password = $this->input->post('password');
		if (!$this->hash->check_password($password, $user->password)) {
			$this->form_validation->set_message('check_login', 'Mot de passe incorrect');
			return false;
		}
		return true;
	}

}