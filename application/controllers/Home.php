<?php

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('etudiant_model');
	}

	public function index()
	{
		if (isEtudiant()) {
			$cne = $this->etudiant_model->getEtudiant(['etudiantId' => currentSession()['id']])->cne;
			return redirect($cne);
		} else if (isEntreprise()) {
			return redirect('entreprise');
		} else if (isSuperviseur()) {
			return redirect('superviseur');
		} else if (isChefFiliere()) {
			return redirect('tuteur');
		} else if (isTuteur() || isTuteurExt()) {
			return redirect('workspace/tuteur');
		}
	}

}