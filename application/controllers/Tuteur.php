<?php

class Tuteur extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->library('form_validation');
		$this->load->library('email');
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
		$data['title'] = 'Importer des Etudiants';
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
		$data['filiere'] = $this->filiere_model->getFiliere(['filiereId' => $data['chef']->chefId]) ;
		$data['etudiants'] = $this->filiere_model->getEtudiants($data['filiere']->code);
		$data['title'] = 'Accueil Chef de filiere';
		$this->render('chefFiliere/accueil',$data);
	}

	

	public function finaliser() {
		$data['title'] = 'Finaliser les demandes de stages';
		$id = currentId();
		$data['chef'] = $this->tuteur_model->getChefFiliere(['tuteurId'=>$id]);
		$filiere= $this->filiere_model->getFiliere(['filiereId' => $data['chef']->chefId])->code ;
		$data['postulats'] = $this->sujet_model->postulats(['e.filiere' => $filiere , 'etat' => 'B']);
		$this->render('chefFiliere/finaliser',$data);
	}

	public function finaliserStage($e,$s){
		$sujet = $this->sujet_model->getSujet(['sujetId' => $s]) ;
		$this->form_validation->set_rules('tuteur', "Tuteur",'required|trim');
		$this->form_validation->set_rules('lettre', "Lettre d'apreciation" , 'callback_check_lettre');

		if ($this->form_validation->run() == false) {
			$data['tuteurs'] = $this->tuteur_model->getTuteurs();
			$data['title'] = 'Finaliser le stage';
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
		$config['allowed_types'] = 'docx|doc|pdf';
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
		$name = $this->user_model->resolveName($id);
		$data['title'] = 'Profil de '.$name;
		$role = $this->user_model->getUser(['userId' => $id])->role;
		if($role == 'tuteur' || $role == 'chef filiere'){
			$data['tuteur'] = $this->tuteur_model->getTuteur(['tuteurId' => $id]);
			$this->render('tuteur/profile', $data);
		} else if ($role == 'tuteur ext') {
			$data['tuteur'] = $this->tuteur_model->getTuteurExt(['tuteurId' => $id]);
			$data['user'] = $this->user_model->getUser(['userId'=>$id ]);
 			$this->render('tuteur/profileExt', $data);
		} else {
			return redirect('home');
		}
	}
		

}