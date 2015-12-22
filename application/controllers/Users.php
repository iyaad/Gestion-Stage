<?php

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('user_model');
		$this->load->model('email_model');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Login', 'required|trim|callback_check_username');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim|callback_check_password');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');

		if ($this->form_validation->run() == false) {
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
		}
	}

	public function logout()
	{
		$this->sessions->unset_userdata('login');
		session_destroy();
	}

	public function check_username($username)
	{
		$this->form_validation->set_message('check_username', '%s inexistant');
		return (bool) $this->user_model->getUserByUsername($username);
	}
	public function check_password($password)
	{
		$this->load->library('hash');
		$user = $this->user_model->getUserByUsername($this->input->post('username'));
		$this->form_validation->set_message('check_password', 'Mot de passe incorrect');
		return $this->hash->check_password($password, $user->password);
	}
	public function passwordRecovery()
	{	$this->form_validation->set_rules('login', 'Login', 'required|trim|callback_check_username');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		if ($this->form_validation->run() == false) {
		$data['title'] = 'Recuperer le mot de passe';
		$data['message']='';
		$this->render('passwordRecovery', $data);
		}
		else{
			if( $this->email_model->recoverPassword($this->input->post('login')) ){
			
			$data['message']='email envoye';
		}else{
			$data['message']='erreur du serveur SMTP';
		}
			$data['title'] = 'Recuperer le mot de passe';
			$this->render('passwordRecovery', $data);

		}
	}
	public function test()
	{
		$this->load->library('hash');
		$data = array(
			'username' => 'Super' ,
			'email' => 'test@exemple.com',
			'password' => $this->hash->password('123'),
			'numTel' => '0615151515',
			'adresse' => 'boukha' ,
			'createdAt' => date("Y-m-d H:i:s"),
			'updatedAt' => date("Y-m-d H:i:s"),
		);
		$this->db->insert("User",$data);
	}

}