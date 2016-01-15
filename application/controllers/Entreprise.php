<?php
use Carbon\Carbon ;

class Entreprise extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('hash');
		$this->load->library('email');
		$this->load->library('random');
		$this->load->model('entreprise_model');
		$this->load->model('sujet_model');
		$this->load->model('etudiant_model');
		$this->load->model('filiere_model');
		$this->load->model('user_model');
		$this->load->model('tuteur_model');
		$this->load->model('email_model');

	}

	public function signup()
	{
		$this->form_validation->set_rules('nom_entreprise', "Nom Entreprise",'required|trim');
		$this->form_validation->set_rules('pays','Pays','required');
		$this->form_validation->set_rules('adresse','Adresse','required|trim');
		$this->form_validation->set_rules('ville','Ville','required');
		$this->form_validation->set_rules('numtel','Numero de Telephone','required|trim');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[Entreprise.email]');
		$this->form_validation->set_rules('description','Description','trim|required');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		$this->form_validation->set_message('valid_mail', 'Email invalide');
		$this->form_validation->set_message('is_unique', 'Une entreprise est déjà enregistrée avec cet email');
		if ($this->form_validation->run() == false) {
			$data['NOSIDEBAR'] = true;
			$data['title'] = 'Inscription entreprises';
			$this->render('signup',$data);
		} else {
			$data = array(
				'nom'=>$this->input->post('nom_entreprise'),
				'pays'=>$this->input->post('pays'),
				'ville'=>$this->input->post('ville'),
				'adresse'=>$this->input->post('adresse'),
				'fax'=>$this->input->post('fax'),
				'numTel'=>$this->input->post('numtel'),
				'email'=>$this->input->post('email'),
				'description'=>$this->input->post('description'),
			);
			$this->entreprise_model->createEntreprise($data);
			// Alert success
			return redirect('home');
		}
	}

	public function index()
	{
		if(currentSession()['role'] != 'entreprise'){
			return redirect('home');
		}
		$data['filieres'] = $this->filiere_model->getFilieres();
		$data['sujets'] = $this->sujet_model->getSujets(['entrepriseId' => currentSession()['id']]);
		$data['tuteurs'] = $this->tuteur_model->getTuteursExt(['entrepriseId' => currentId()]);
		$data['title'] = 'Accueil Entreprise';
		$this->render('entreprise/accueil', $data);
	}

	public function ajouter_sujet()
	{
		if (!isEntreprise())
			return show_404();
		$this->form_validation->set_rules('titre', 'Titre', 'required|trim|is_unique[Sujet.titre]');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[255]');
		$this->form_validation->set_rules('prerequis', 'Description', 'required|trim|max_length[500]');
		$this->form_validation->set_rules('filiere', 'Filiere', 'required|trim');
		$this->form_validation->set_rules('tuteur', 'Tuteur', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('periode', 'Periode', 'required|trim');
		$this->form_validation->set_rules('niveau', 'niveau', 'required|trim');
		
		if (!$this->form_validation->run()) {
			$this->index();
		} else {
			$data = array(
				'titre' => $this->input->post('titre'),
				'description' =>$this->input->post('description'),
				'prerequis' =>$this->input->post('prerequis'),
				'filiere' =>$this->input->post('filiere'),
				'tuteurId' => $this->input->post('tuteur'),
				'dateDebut' => Carbon::createFromFormat('d/m/Y',$this->input->post('date'))->toDateString(),
				'periode' => $this->input->post('periode'),
				'niveau' => $this->input->post('niveau'),
				'entrepriseId' => currentsession()['id']
			);
			$this->sujet_model->createSujet($data);
			redirect('entreprise');
		}
	}

	public function edit_profile($id)
	{
		$entreprise = $this->entreprise_model->getEntreprise(['entrepriseId' => $id]);
		if (currentSession()['id'] != $entreprise->entrepriseId)
			return show_404();
		$this->form_validation->set_rules('numTel', 'Téléphone', 'trim|required');
		$this->form_validation->set_rules('adresse', 'Adresse', 'trim|required');
		$this->form_validation->set_rules('ville', 'Ville', 'trim|required');
		$this->form_validation->set_rules('pays', 'Pays', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Nouveau mot de passe', 'trim|min_length[6]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim|callback_check_password');
		$this->form_validation->set_rules('logo', 'Logo', 'callback_check_logo');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Modification du Profil';
			$data['entreprise'] = $entreprise;
			$this->render('entreprise/edit_infos', $data);
		} else {
			// Update entreprise
			$data = array(
				'numTel' => $this->input->post('numTel'),
				'adresse' => $this->input->post('adresse'),
				'ville' => $this->input->post('ville'),
				'pays' => $this->input->post('pays'),
			);
			$this->entreprise_model->updateEntreprise(currentSession()['id'], $data);
			// Update user
			$new_pwd = $this->input->post('new_password');
			if (!empty($new_pwd)) {
				$userData['password'] = $this->hash->password($new_pwd);
				$this->user_model->updateUser(['userId' => currentSession()['id']], $userData);
			}
			return redirect("entreprise/$id");
			// If the form was submitted
		}

	}

	public function profile($id)
	{
		$entreprise = $this->entreprise_model->getEntreprise(['entrepriseId' => $id]);
		$data['title'] = "Profil de $entreprise->nom";
		$data['entreprise'] = $entreprise;
		$this->render('entreprise/profile', $data);
	}

	// Form validation callbacks
	public function check_password($password)
	{
		$user = $this->user_model->getUser(['userId' => currentSession()['id']]);
		$this->form_validation->set_message('check_password', 'Mot de passe incorrect');
		return $this->hash->check_password($password, $user->password);
	}

	public function check_logo()
	{
		// If no photo was chosen, then don't bother trying to do any validation
		if (empty($_FILES['logo']['name']))
			return true;
		$entreprise = $this->entreprise_model->getEntreprise(['entrepriseId' => currentSession()['id']]);
		$config['allowed_types'] = 'jpg|png';
		$config['upload_path'] = FCPATH.'uploads/logos/';
		$config['file_name'] = $entreprise->entrepriseId;
		$config['max_size'] = 1024;
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		// If upload failed display error
		if ($this->upload->do_upload('logo')) {
			return true;
		} else {
			$this->form_validation->set_message('check_logo', strip_tags($this->upload->display_errors()));
			return false;
		}
	}
	public function tuteur(){
		if(currentSession()['role'] != 'entreprise'){
			return redirect('home');
		}

		$data['tuteurs'] = $this->tuteur_model->getTuteursExt(['entrepriseId' => currentSession()['id']]);
		$data['title'] = 'Tuteurs';
		$this->render('entreprise/tuteurs', $data);

	}
	public function ajouter_tuteur(){
		if (!isEntreprise())
			return show_404();
		$this->form_validation->set_rules('nom', 'nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'prenom', 'required|trim');
		$this->form_validation->set_rules('numtel', 'telephone', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		$this->form_validation->set_message('valid_email', 'Email invalide');
		
		if (!$this->form_validation->run()) {
			$this->tuteur();
		} else {
			$rand = $this->random->generateString(10);
			
			$data = array(
				'nom' => $this->input->post('nom'),
				'prenom' =>$this->input->post('prenom'),
				'email' =>$this->input->post('email'),
				'entrepriseId' => currentSession()['id'],
			);

			$userData = array(
				'username' => $data['email'],
				'password' => $this->hash->password($rand),
				'email' => $data['email'], 
				'numTel' => $this->input->post('numtel'),
				'role' => 'tuteur ext',
				'adresse' => '',
				'createdAt' => gmdate('Y-m-d H:i:s'),
				'updatedAt' => gmdate('Y-m-d H:i:s'),
			);

			$this->tuteur_model->createTuteurExt($userData,$data);
			$this->email_model->emailTuteurExt($this->input->post('email'),$rand);
			redirect('entreprise/tuteur');
		}
	}
}