<?php

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$data['title'] = 'Login';
		$this->render('login', $data);
	}

}