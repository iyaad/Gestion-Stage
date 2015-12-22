<?php

class Email_model extends CI_Model {
	

	public function emailEtudiant($user) 
	{
		$user = $this->db->get_where('Etudiant', ['etudiantId' => $user->userId])->result()[0];
		$data['user'] = $user ;
		$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
		$this->email->to($user->email);
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message($this->load->view('email/newAccount'),$data);
		$this->email->send();
	}
	public function recoverPassword($login)
	{
		$user = $this->db->get_where('user',['username'=>$login])->result()[0];
		$data['user'] = $user ;
		$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
		$this->email->to($user->email);
		$this->email->subject('recuperation du mot de passe');
		$this->email->message($this->load->view('email/passwordRecover'),$data);
		return (bool) $this->email->send();
	}

}