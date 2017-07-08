<?php
/**
 * Theme Options custom functions
 */

function dmof_get_options_data( $id = '', $param = '' ){

		$dmof_get_data = get_option('dmof_theme_options');

		if ($id) {
			$dmof_get_data = ( isset($dmof_get_data[$id]) ) ? $dmof_get_data[$id] : '';
		}

		if ($id && $dmof_get_data && $param) {
			$dmof_get_data = $dmof_get_data[$param];
		}

		return $dmof_get_data;
	
} // end get_options_data