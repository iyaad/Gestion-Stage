<?php

class Superviseur extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('hash');
		$this->load->library('random');
		if (!isSuperviseur()) return redirect('home');
	}

	public function index(){
		$data['filieres'] = $this->filiere_model->getFilieres();
		$data['chefs'] = $this->tuteur_model->getTuteurs(['chefId' => null]);
		$data['ent_non_verif'] = $this->entreprise_model->getTempEntreprise();
		$data['tuteurs'] = $this->tuteur_model->getTuteurs([]);
		$data['title'] = 'Accueil Superviseur';
		$this->render('superviseur/acceuil',$data);
	}

	public function ajouter_chef_filiere()
	{
		$this->form_validation->set_rules('departement', 'Département', 'required|trim');
		$this->form_validation->set_rules('filiere', 'Filiere', 'required|trim');
		$this->form_validation->set_rules('nom', 'Nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('numtel', 'Téléphone', 'required|trim');
		$this->form_validation->set_message('required', 'Le champs %s est requis');

		if (!$this->form_validation->run()) {
			$this->index();
		} else {
			$rand = $this->random->generateString(10);
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$username = url_title("$nom $prenom", '-', true);
			$userData = array(
				'username' => $username,
				'password' => $this->hash->password($rand),
				'email' => $this->input->post('email'), 
				'numTel' => $this->input->post('numtel'),
				'role' => 'chef filiere',
				'adresse' => '',
				'createdAt' => gmdate('Y-m-d H:i:s'),
				'updatedAt' => gmdate('Y-m-d H:i:s'),
			);
			$data = array(
				'nom' => $nom,
				'prenom' => $prenom,
				'departement' => $this->input->post('departement'), 
				'chefId' => $this->input->post('filiere'),
			);
			$this->tuteur_model->createChefFiliere($userData, $data);
			if ($this->email_model->emailChefFiliere($userData['email'], $username, $rand)) {
				// Alert success
				return redirect('superviseur/tuteurs');
			} else {
				$this->index();
			}
		}
	}

	public function valider_entreprise($id)
	{
		$e = $this->entreprise_model->getEntreprise(['entrepriseId' => $id]);
		$rand = $this->random->generateString(10);
		$data = array(
			'username' => $e->email,
			'password' => $this->hash->password($rand),
			'email' => $e->email,
			'numTel' => $e->numTel,
			'adresse' => $e->adresse,
			'role' => 'entreprise',
			'createdAt' => gmdate('Y-m-d H:i:s'),
			'updatedAt' => gmdate('Y-m-d H:i:s'),
		);
		if ($this->entreprise_model->validerEntreprise($id, $data)) {
			$this->email_model->emailEntreprise($data['username'], $rand);
			// Alert success
			return redirect('superviseur');
		} else {
			// Alert error
			echo 'error';
		}
	}
	
	public function delete($id)
	{
		$e = $this->entreprise_model->getEntreprise(['entrepriseId' => $id]);
		$this->db->delete('entreprise',['entrepriseId' => $id]);
		return redirect('superviseur');
	}

	public function tuteurs(){
		if(!isSuperviseur()) {
			return redirect('home');
		}
		$data['filieres'] = $this->filiere_model->getFilieres();
		$data['tuteurs'] = $this->tuteur_model->getTuteurs(['chefId' =>null]);
		$data['chefs'] = $this->tuteur_model->getTuteurs(['chefId !=' =>null]);
		$data['title'] = 'Tuteurs';
		$this->render('superviseur/tuteurs', $data);

	}

	public function ajouter_tuteur(){
		if (!isSuperviseur())
			return show_404();
		$this->form_validation->set_rules('nom', 'nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'prenom', 'required|trim');
		$this->form_validation->set_rules('departement', 'Département', 'required|trim');
		$this->form_validation->set_rules('numtel', 'telephone', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		$this->form_validation->set_message('valid_email', 'Email invalide');
		
		if (!$this->form_validation->run()) {
			$this->tuteurs();
		} else {
			$rand = $this->random->generateString(10);
			$data = array(
				'nom' => $this->input->post('nom'),
				'prenom' =>$this->input->post('prenom'),
				'chefId' => NULL,
				'departement' => $this->input->post('departement'),

			);
			$userData = array(
				'username' =>$this->input->post('email'),
				'password' => $this->hash->password($rand),
				'email' =>$this->input->post('email'),
				'numTel' => $this->input->post('numtel'),
				'role' => 'tuteur',
				'adresse' => '',
				'createdAt' => gmdate('Y-m-d H:i:s'),
				'updatedAt' => gmdate('Y-m-d H:i:s'),
			);
			$this->tuteur_model->createTuteur($userData,$data);
				$this->email_model->emailTuteurExt($this->input->post('email'),$rand);
			redirect('Superviseur/tuteurs');
		}
	}

	public function ajouter_jury() {
		$this->form_validation->set_rules('tuteur1', "1er Jury",'required|trim');
		$this->form_validation->set_rules('tuteur2', "2eme Jury",'required|trim');
		$this->form_validation->set_rules('tuteur3', "3eme Jury",'required|trim');

		if (!$this->form_validation->run()) {
			$this->index();
		} else {
			$data = array(
				'tuteur1Id' => $this->input->post('tuteur1'),
				'tuteur2Id' => $this->input->post('tuteur2'),
				'tuteur3Id' => $this->input->post('tuteur3'),
			);
			$this->tuteur_model->createJury($data);
			return redirect('jury');
		}
	}

	public function jury(){
		if(!isSuperviseur()){
			return redirect('home');
		}
		$data['title'] = 'Jury' ;
		$data['jurys'] = $this->tuteur_model->getJurys([]);
		$data['tuteurs'] = $this->tuteur_model->getTuteurs([]);
		return $this->render('superviseur/jury',$data);
	}
}