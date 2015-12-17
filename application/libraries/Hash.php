<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hash {

	public function password($password) {
		return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
	}

	public function check_password($password, $hash) {
		return password_verify($password, $hash);
	}

	public function create_hash($input) {
		return hash('sha256', $input);
	}

	public function check_hash($known, $user) {
		return hash_equals($known, $user);
	}

}