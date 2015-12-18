<?php

class Tuteur extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function importer()
	{
		$data['title'] = 'Importer depuis CSV';
		$this->render('tuteur/importer');
	}
}