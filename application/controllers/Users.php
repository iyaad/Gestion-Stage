<?php

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('hash');
		$this->load->library('random');
		$this->load->model('user_model');
		$this->load->model('email_model');
	}

	public function login()
	{
		if (loggedIn())
			return redirect('home');
		$this->form_validation->set_rules('username', 'Login', 'required|trim|callback_check_username');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim|callback_check_password');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');

		if ($this->form_validation->run() == false) {
			$data['NOTOPBAR'] = true;
			$data['NOSIDEBAR'] = true;
			$data['title'] = 'Login';
			$this->render('login', $data);
		} else {
			// Start the session and redirect
			$user = $this->user_model->getUserByUsername($this->input->post('username'));
			$sess_array = array(
				'id' => $user->userId,
				'role' => $user->role,
			);
			$this->session->set_userdata('login', $sess_array);
			return redirect('home');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login');
		session_destroy();
		return redirect('home');
	}

	public function recover_password()
	{
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|callback_check_email');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		
		if ($this->form_validation->run() == false) {
			$data['NOTOPBAR'] = true;
			$data['NOSIDEBAR'] = true;
			$data['title'] = 'Recuperer votre mot de passe';
			$this->render('auth/recover_password', $data);
		} else {
			$email = $this->input->post('email');
			$identifier = $this->random->generateString(128);
			$hashed = $this->hash->create_hash($identifier);
			$this->user_model->updateUser(['email' => $email], ['recoverHash' => $hashed]);
			if ($this->email_model->recoverPassword($email, $identifier)) {
				// Alert success
			} else {
				// Alert error
			}
		}
	}

	public function reset_password()
	{
		$email = $this->input->get('email');
		$identifier = $this->input->get('identifier');
		if (empty($email) || empty($identifier))
			show_404();
		$user = $this->user_model->getUser(['email' => $email]);
		$hashed = $this->hash->create_hash($identifier);
		if (!$this->hash->check_hash($user->recoverHash, $hashed))
			dd('wrong hash');

		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('password_conf', 'Confirmation mot de passe', 'matches[password]');
		$this->form_validation->set_message('matches', 'Le champ %s doit être le même que Mot de passe');

		if (!$this->form_validation->run()) {
			$data['NOTOPBAR'] = true;
			$data['NOSIDEBAR'] = true;
			$data['email'] = $email;
			$data['identifier'] = $identifier;
			$data['title'] = 'Réinitialisez votre mot de passe';
			$this->render('auth/reset_password', $data);
		} else {
			$password = $this->hash->password($this->input->post('password'));
			$this->user_model->updateUser(['email' => $email], ['recoverHash' => null, 'password' => $password]);
			// TODO: Alert success
			return redirect('login');
		}
	}

	// Form validation callbacks
	public function check_username($username)
	{
		$this->form_validation->set_message('check_username', '%s inexistant');
		return (bool) $this->user_model->getUserByUsername($username);
	}

	public function check_email($email)
	{
		$this->form_validation->set_message('check_email', 'Utilisateur inexistant');
		return (bool) $this->user_model->getUser(['email' => $email]);
	}

	public function check_password($password)
	{
		$this->load->library('hash');
		$user = $this->user_model->getUserByUsername($this->input->post('username'));
		$this->form_validation->set_message('check_password', '');
		if (!$user) return false;
		$this->form_validation->set_message('check_password', 'Mot de passe incorrect');
		return $this->hash->check_password($password, $user->password);
	}

	public function test()
	{
		
	}

}
