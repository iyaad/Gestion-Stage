<?php


class Tuteur_model extends CI_Model {
	

	public function sendEmail(){
		$query = $this->db->get('User');

		foreach ($query->result() as $row) {

			$this->email->from('stages@ensat.ac.ma', 'Chef de filiere');
			$this->email->to($row->email);
			$this->email->subject('Compte pour la plateforme gestion-stages');
			$this->email->message('Vous êtes inscrit(e) sur gestion-stages avec les paramètres suivants:<br>Login : '.$row->username.',<br>Mot de passe : '.$row->password);

			$this->email->send();
		}
	}

}