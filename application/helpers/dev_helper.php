<?php

if (!function_exists('asset_url')) {
	function asset_url($file) {
		return base_url('public/'.$file);
	}
}