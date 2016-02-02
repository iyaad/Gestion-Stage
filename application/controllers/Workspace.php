<?php

use Carbon\Carbon;

class Workspace extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('random');
		$this->load->library('hash');
	}

	public function accueil($id) {
		if (!isEtudiantEnStage() && !isTuteurExtEnStage() && !isTuteurEnStage()){
			return redirect('home');
		}
		$data['title'] = 'Espace de Travail';
		$data['messages_recus'] = $this->message_model->getMessages(['destinataire' =>currentSession()['id']]);
		$data['messages_envoyes'] = $this->message_model->getMessages(['expediteur' =>currentSession()['id']]);
		$data['destinataire'] = $this->sujet_model->getStage(['s.etudiantId'=>$id]);
		$data['id'] = $id;
		$this->render('workspace/accueil', $data);
	}

	public function envoyerMessage($id)
	{
		$this->form_validation->set_rules('destinataire', "Destinataire",'required|trim');
		$this->form_validation->set_rules('message',"Message",'required|trim|htmlspecialchars');
		$this->form_validation->set_rules('fichier',"Fichier",'callback_check_attachment');
		$this->form_validation->set_message('required', 'Le champs %s est requis');

		if ($this->form_validation->run() == false) {
			$this->accueil($id);
		} else {
			$message = array(
				'stageId'=> $this->input->post('stageId'),
				'message'=> $this->input->post('message'),
				'titre' => $this->input->post('titre'),
				'expediteur'=> currentSession()['id'],
				'destinataire'=> $this->input->post('destinataire'),
				'date' => gmdate('Y-m-d H:i:s'),
			);
			$mId = $this->message_model->envoyerMessage($message);
			return redirect('workspace/accueil/'.$id);
		}		
	}

	public function tuteur(){
		if (!isTuteur() && !isTuteurExt())
			return show_404();
		$data['title'] = 'Etudiants en stage';
		if (isTuteur())
			$data['etudiants'] = $this->sujet_model->getStages(['s.tuteurId'=>currentId()]);
		else if (isTuteurExt())
			$data['etudiants'] = $this->sujet_model->getStages(['s.tuteurExtId'=>currentId()]);
		$this->render('workspace/tuteur', $data);
	}

	public function check_attachment()
	{
		// If no photo was chosen, then don't bother trying to do any validation
		if (empty($_FILES['fichier']['name']))
			return true;
		$id = $this->input->post('stageId');
		$config['upload_path'] = FCPATH.'uploads/workspace/';
		$config['file_name'] = $id.'_'.url_title($this->input->post('titre'), '-', true);
		$config['max_size'] = 5120;
		$config['allowed_types'] = 'docx|doc|pdf|ppt|pptx|xls|xlsx|jpg|zip|rar';
		$this->load->library('upload', $config);
		// If upload failed display error
		if ($this->upload->do_upload('fichier')) {
			return true;
		} else {
			$this->form_validation->set_message('check_attachment', strip_tags($this->upload->display_errors()));
			return false;
		}
	}

	public function download_file($file) {
		$file = FCPATH.'uploads/workspace/'.$file;
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		readfile($file);
		exit;
	}
	
}