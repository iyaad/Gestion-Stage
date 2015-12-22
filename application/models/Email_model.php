<?php

class Email_model extends CI_Model {
	

	public function emailEtudiant($user) 
	{
		$cne = $this->db->get_where('Etudiant', ['etudiantId' => $user->userId])->result()[0]->cne;
		$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
		$this->email->to("salimi.imad@gmail.com");
		$this->email->subject('Compte pour la plateforme gestion-stages');
		$this->email->message('Vous êtes inscris sur gestion-stages avec les paramètres suivants:<br>Login : '.$user->username.'<br>Mot de passe : '.$cne);
		$this->email->send();
	}
	
	public function recoverPassword($login)
	{
		$user = $this->db->get_where('user',['username'=>$login])->result()[0];
		$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
		$this->email->to("salimi.imad@gmail.com");
		$this->email->subject('recuperation du mot de passe');
		$this->email->message('Vous êtes inscris sur gestion-stages avec les paramètres suivants:<br>Login : '.$user->username.'<br>Mot de passe : '.$user->password);
		return (bool) $this->email->send();
	}

}