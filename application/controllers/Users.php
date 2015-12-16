<?php

class Users extends MY_Controller {

	public function login(){

		$data['title'] = "login";
		$this->render("login",$data);
	}


}