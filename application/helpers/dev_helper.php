<?php

if (!function_exists('asset_url')) {
	function asset_url($file) {
		return base_url('public/'.$file);
	}
}

if (!function_exists('dd')) {
	function dd($var) {
		var_dump($var);
		die();
	}
}