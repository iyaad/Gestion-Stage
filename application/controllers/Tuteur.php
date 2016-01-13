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
		$this->load->model('user_model');
		$this->load->model('tuteur_model');
		$this->load->model('filiere_model');
		$this->load->library('random');
		$this->load->library('hash');
	}

	public function importer()
	{
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
		$this->render('tuteur/importer', $data);
	}

	public function index(){
		if(currentSession()['role'] == 'chef filiere'){
			$this->accueilChefFiliere();
		}
		else if(currentSession()['role'] == 'chef filiere'){

		}
		
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
		if(currentSession()['role'] != 'chef filiere'){
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
				//$this->email_model->emailTuteurExt($this->input->post('email'),$rand);
			redirect('tuteur/tuteurs');
		}
	}

}