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
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim|callback_check_password');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');

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
	public function check_password($password)
	{
		$this->load->library('hash');
		$user = $this->user_model->getUserByUsername($this->input->post('username'));
		$this->form_validation->set_message('check_password', 'Mot de passe incorrect');
		return $this->hash->check_password($password, $user->password);
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