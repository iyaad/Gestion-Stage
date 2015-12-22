<?php

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