<?php

if (!function_exists('navIsActive')) {
	function navIsActive($controller, $function = null) {
		$CI =& get_instance();
		$ruri = explode('/', $CI->uri->ruri_string());
		$class = $ruri[0];
		$method = $ruri[1];
		if ($controller === $class && $function === $method)
			return 'class="active"';
		else if ($controller === $class && !$function)
			return 'class="active"';
		return '';
	}
}