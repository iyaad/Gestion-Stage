<?php

class Email_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('etudiant_model');
		$this->load->model('user_model');
	}

	public function emailChefFiliere($email, $username, $password)
	{
		$data['username'] = $username;
		$data['password'] = $password;
		$this->email->from('stages@ensat.ac.ma', 'Superviseur');
		$this->email->to($email);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/new_account', $data, true));
		return (bool) $this->email->send();
	}
		public function emailTuteurExt($email,$password)
	{
		$data['username'] = $email;
		$data['password'] = $password;
		$this->email->from('stages@ensat.ac.ma', 'Superviseur');
		$this->email->to($email);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/new_account', $data, true));
		return (bool) $this->email->send();
	}

	public function emailEntreprise($username, $password)
	{
		$data['username'] = $username;
		$data['password'] = $password;
		$this->email->from('stages@ensat.ac.ma', 'Superviseur');
		$this->email->to($username);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/new_account', $data, true));
		return (bool) $this->email->send();
	}

	public function emailEtudiant($user)
	{
		$user = $this->etudiant_model->getEtudiant(['etudiantId' => $user->userId]);
		$data['username'] = $user->cne;
		$data['password'] = $user->cne;
		$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
		$this->email->to($user->email);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/new_account', $data, true));
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
	public function confir($email)
	{
		$data['username'] = $username;
		$data['password'] = $password;
		$this->email->from('stages@ensat.ac.ma', 'Superviseur');
		$this->email->to($username);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/new_account', $data, true));
		return (bool) $this->email->send();
	}

	public function emailAcc($s,$entreprise,$email){

		$data['sujetId'] = $s;
		$data['entreprise'] = $entreprise;
		$this->email->from('stages@ensat.ac.ma', 'Superviseur');
		$this->email->to($email);
		$this->email->subject('demande de confirmation de postulat');
		$this->email->message($this->load->view('email/poustulat_accepte', $data, true));
		return (bool) $this->email->send();
	}

	public function emailConfirm($s,$entreprise,$etudiant){

		$data['sujetId'] = $s;
		$data['entreprise'] = $entreprise;
		$data['etudiant'] = $etudiant;
		$this->email->from('stages@ensat.ac.ma', 'Superviseur');
		$this->email->to($etudiant->email);
		$this->email->subject('demande de confirmation de postulat');
		$this->email->message($this->load->view('email/poustulat_confirmer', $data, true));
		return (bool) $this->email->send();
	}

}
