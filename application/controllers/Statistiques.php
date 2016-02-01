<?php
class Statistiques extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('hash');
		$this->load->library('email');
		$this->load->library('random');
		if (!loggedIn()) return redirect('home');
	}

	public function index() {
		$data['title'] = 'Statistiques';
		$data['ent_insc'] = $this->statistique_model->nbEntreprises();
		return $this->render('statistique/accueil',$data);
	}
}
?>