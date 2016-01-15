<?php

class Tuteur extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('etudiant_model');
		$this->load->model('email_model');
		$this->load->model('sujet_model');
		$this->load->model('entreprise_model');
		$this->load->model('user_model');
		$this->load->model('tuteur_model');
		$this->load->model('filiere_model');
		$this->load->library('random');
		$this->load->library('hash');
	}

	public function importer()
	{
		if (!isChefFiliere())
			show_404();
		// If the form was submitted
		if (!empty($_FILES['liste']['name'])) {
			$config['upload_path'] = FCPATH.'uploads/';
			$config['file_name'] = 'liste';
			$config['allowed_types'] = 'csv';
			$config['overwrite'] = true;
			$this->load->library('upload', $config);
			// If upload failed display error
			if ($this->upload->do_upload('liste')) {
				$file_data = $this->upload->data();
				$file_path = FCPATH.'uploads/'.$file_data['file_name'];
				if ($csv_array = $this->csvimport->get_array($file_path, '', true)) {
					foreach ($csv_array as $etudiant) {
						$userId = $this->etudiant_model->createEtudiant($etudiant);
						$user = $this->user_model->getUser(['userId' => $userId]);
						$this->email_model->emailEtudiant($user);
					}
				}
				// Delete the csv file from the server
				unlink(FCPATH.'uploads/'.$file_data['file_name']);
			} else {
				$data['error'] = $this->upload->display_errors();
			}
		}
		$data['title'] = 'Importer depuis CSV';
		$this->accueilChefFiliere();
	}

	public function index(){
		if(!isChefFiliere()){
			return show_404();
		}	
		$this->accueilChefFiliere();
	}

	public function accueilChefFiliere(){
		$id = currentSession()['id'];
		$data['chef'] = $this->tuteur_model->getChefFiliere(['tuteurId'=>$id]);
		$filiere = $data['chef']->filiere;
		$data['etudiants'] = $this->filiere_model->getEtudiants($filiere);
		$data['title'] = 'Accueil Chef de filiere';
		$this->render('chefFiliere/accueil',$data);
	}

	public function tuteurs(){
		if(!isChefFiliere()){
			return redirect('home');
		}

		$chef = $this->tuteur_model->getChefFiliere(['tuteurId'=>currentSession()['id']]);

		$data['tuteurs'] = $this->tuteur_model->getTuteurs(['filiere' => $chef->filiere , 'chefId !=' =>null]);
		$data['title'] = 'Tuteurs';
		$this->render('chefFiliere/tuteurs', $data);

	}

	public function ajouter_tuteur(){
		if (!isChefFiliere())
			return show_404();
		$this->form_validation->set_rules('nom', 'nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'prenom', 'required|trim');
		$this->form_validation->set_rules('departement', 'Département', 'required|trim');
		$this->form_validation->set_rules('numtel', 'telephone', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		$this->form_validation->set_message('valid_email', 'Email invalide');
		
		if (!$this->form_validation->run()) {
			$this->tuteur();
		} else {
			$rand = $this->random->generateString(10);
			$chef = $this->tuteur_model->getChefFiliere(['tuteurId'=>currentSession()['id']]);
			
			$data = array(
				'nom' => $this->input->post('nom'),
				'prenom' =>$this->input->post('prenom'),
				'chefId' => currentSession()['id'],
				'filiere' => $chef->filiere,
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
			redirect('tuteur/tuteurs');
		}
	}

	public function finaliser(){

		$data['title'] = 'Finaliser les demandes de stages';
		$filiere =  $this->tuteur_model->getChefFiliere(['tuteurId' => currentSession()['id']])->filiere;
		$data['postulats'] = $this->sujet_model->postulats(['e.filiere' => $filiere , 'etat' => 'B' ]);
		$this->render('chefFiliere/finaliser',$data);
	}

	public function finaliserStage($e,$s){
		$sujet = $this->sujet_model->getSujet(['sujetId' => $s]) ;
		$this->form_validation->set_rules('tuteur', "Tuteur",'required|trim');
		$this->form_validation->set_rules('lettre', "Lettre d'apreciation" , 'callback_check_lettre');

		if ($this->form_validation->run() == false) {
			$data['tuteurs'] = $this->tuteur_model->getTuteurs(['chefId' => currentSession()['id']]);
			$data['title'] = 'Finaliser';
			$data['e'] = $e;
			$data['s'] = $s;
			$this->render('chefFiliere/finaliser_stage', $data);
		} else {
			$data = array(
				'etudiantId' => $e,
				'sujetId' => $s,
				'tuteurId' => $this->input->post('tuteur') ,
				'tuteurExtId' => $sujet->tuteurId,
				'dateDebut' => $sujet->dateDebut,
				'periode' => $sujet->periode,
			);
			$this->sujet_model->createStage($data);
			$data = array(
				'sujetId' => $s,
				'etudiantId' => $e,
				'etat' => 'A',
			);
			$this->sujet_model->updatePostulat(array(
				'sujetId' =>  $s,
				'etudiantId' => $e,
				), $data);
			return redirect('tuteur/finaliser');
		}

	}

	public function check_lettre()
	{
		
		
		$etudiant = $this->etudiant_model->getEtudiant(['etudiantId' => $this->input->post('etudiantId')]);
		$config['upload_path'] = FCPATH.'uploads/lettres';
		$config['file_name'] = $etudiant->cne;
		$config['max_size'] = 1024;
		$config['allowed_types'] = 'docx|pdf';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		// If upload failed display error
		if ($this->upload->do_upload('lettre')) {
			return true;
		} else {
			$this->form_validation->set_message('check_lettre', strip_tags($this->upload->display_errors()));
			return false;
		}
	}

	public function profile($id){

		$data['title'] = ' Profile ';
		if(isTuteur() || isChefFiliere()){
			$data['tuteur'] = $this->tuteur_model->getTuteur(['tuteurId' => $id]);
			$this->render('tuteur/profile', $data);
		}

		if(isTuteurExt()){
			$data['tuteur'] = $this->tuteur_model->getTuteurExt(['tuteurId' => $id]);
			$data['user'] = $this->user_model->getUser(['userId'=>$id ]);
 			$this->render('tuteur/profileExt', $data);
		}
	}
		

}