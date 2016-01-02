<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('hash');
		$this->load->model('etudiant_model');
		$this->load->model('user_model');
	}

	public function edit_profile($cne)
	{
		$etudiant = $this->etudiant_model->getEtudiant(['cne' => $cne]);
		if (currentSession()['id'] != $etudiant->etudiantId)
			return show_404();
		$this->form_validation->set_rules('adresse', 'Adresse', 'trim|required');
		$this->form_validation->set_rules('ville', 'Ville', 'trim|required');
		$this->form_validation->set_rules('pays', 'Pays', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Nouveau mot de passe', 'trim|min_length[6]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required|trim|callback_check_password');
		$this->form_validation->set_rules('photo', 'Photo', 'callback_check_photo');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
		
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Modification du profil';
			$data['etudiant'] = $etudiant;
			$this->render('etudiant/edit_infos', $data);
		} else {
			$data = array(
				'adresse' => $this->input->post('adresse'),
				'ville' => $this->input->post('ville'),
				'pays' => $this->input->post('pays'),
			);
			$new_pwd = $this->input->post('new_password');
			if (!empty($new_pwd))
				$data['password'] = $this->hash->password($new_pwd);
			$this->etudiant_model->updateEtudiant(currentSession()['id'], $data);
			return redirect ($cne);
			// If the form was submitted
		}

	}

	public function profile($cne)
	{
		$etudiant = $this->etudiant_model->getEtudiant(['cne' => $cne]);
		$data['title'] = 'Profil de '.$etudiant->nom.' '.$etudiant->prenom;
		$data['etudiant'] = $etudiant;
		$this->render('etudiant/profile', $data);
	}

	public function check_password($password)
	{
		$user = $this->user_model->getUser(['userId' => currentSession()['id']]);
		$this->form_validation->set_message('check_password', 'Mot de passe incorrect');
		return $this->hash->check_password($password, $user->password);
	}

	public function check_photo()
	{
		// If no photo was chosen, then don't bother trying to do any validation
		if (empty($_FILES['photo']['name']))
			return true;
		$etudiant = $this->etudiant_model->getEtudiant(['etudiantId' => currentSession()['id']]);
		$config['upload_path'] = FCPATH.'uploads/photos/';
		$config['file_name'] = $etudiant->cne;
		$config['max_size'] = 1024;
		$config['allowed_types'] = 'jpg';
		$this->load->library('upload', $config);
		// If upload failed display error
		if ($this->upload->do_upload('photo')) {
			return true;
		} else {
			$this->form_validation->set_message('check_photo', strip_tags($this->upload->display_errors()));
			return false;
		}
	}
}