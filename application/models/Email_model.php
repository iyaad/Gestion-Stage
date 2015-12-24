<?php

class Email_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('etudiant_model');
		$this->load->model('user_model');
	}

	public function emailEntreprise($username, $password)
	{
		$data['username'] = $username;
		$data['password'] = $password;
		$this->email->from('stages@ensat.ac.ma', 'Superviseur');
		$this->email->to($username);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/new_entreprise', $data, true));
		return (bool) $this->email->send();
	}

	public function emailEtudiant($user)
	{
		$user = $this->etudiant_model->getEtudiant(['etudiantId' => $user->userId]);
		$data['user'] = $user;
		$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
		$this->email->to($user->email);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/new_etudiant', $data, true));
		return (bool) $this->email->send();
	}
	
	public function recoverPassword($email, $identifier)
	{
		$data = array(
			'email' => $email,
			'identifier' => $identifier,
		);
		$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
		$this->email->to($email);
		$this->email->subject('Récuperez votre mot de passe');
		$this->email->message($this->load->view('email/recover_password', $data, true));
		return (bool) $this->email->send();
	}

}
