<?php

if (!function_exists('currentSession')) {
	function currentSession() {
		$CI =& get_instance();
		return $CI->session->userdata('login');
	}
}

if (!function_exists('loggedIn')) {
	function loggedIn() {
		/** 
		 * $CI accesses the current controller
		 * (since we can't use $this in a regular function)
		 */
		$CI =& get_instance();
		return $CI->session->has_userdata('login');
	}
}

if (!function_exists('isSuperviseur')) {
	function isSuperviseur() {
		$CI =& get_instance();
		return loggedIn() && $CI->session->userdata('login')['role'] == 'superviseur';
	}
}

if (!function_exists('isEtudiant')) {
	function isEtudiant() {
		$CI =& get_instance();
		return loggedIn() && $CI->session->userdata('login')['role'] == 'etudiant';
	}
}

if (!function_exists('isEntreprise')) {
	function isEntreprise() {
		$CI =& get_instance();
		return loggedIn() && $CI->session->userdata('login')['role'] == 'entreprise';
	}
}

if (!function_exists('isChefFiliere')) {
	function isChefFiliere() {
		$CI =& get_instance();
		return loggedIn() && $CI->session->userdata('login')['role'] == 'chef filiere';
	}
}

if (!function_exists('isTuteurExt')) {
	function isTuteurExt() {
		$CI =& get_instance();
		return loggedIn() && $CI->session->userdata('login')['role'] == 'tuteur ext';
	}
}

if (!function_exists('isTuteur')) {
	function isTuteur() {
		$CI =& get_instance();
		return loggedIn() && $CI->session->userdata('login')['role'] == 'tuteur';
	}
}

if (!function_exists('isEtudiantEnStage')) {
	function isEtudiantEnStage() {
		$CI =& get_instance();
		$CI->load->model('sujet_model');
		return loggedIn() && $CI->sujet_model->enStage(['s.etudiantId' => currentSession()['id']]);
	}
}


if (!function_exists('isTuteurEnStage')) {
	function isTuteurEnStage() {
		$CI =& get_instance();
		$CI->load->model('sujet_model');
		return loggedIn() && $CI->sujet_model->enStage(['s.tuteurId' => currentSession()['id']]);
	}
}


if (!function_exists('isTuteurExtEnStage')) {
	function isTuteutExtEnStage() {
		$CI =& get_instance();
		$CI->load->model('sujet_model');
		return loggedIn() && $CI->sujet_model->enStage(['s.tuteurExtId' => currentSession()['id']]);
	}
}







