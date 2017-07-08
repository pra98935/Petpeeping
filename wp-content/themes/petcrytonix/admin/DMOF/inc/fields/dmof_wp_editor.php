<?php
/**
 * Wp Editor
 */

class DMOF_Fields_WPEditor{

	public function wp_editor( $id, $name , $desc, $options, $default, $get_value) {

		echo '<th class="dmof_title">'.$name.'</th>';

		$get_value = ( $get_value ) ? $get_value : $default;

		echo '<td class="dmof_content"><div class="dmof_content">';
			wp_editor( $get_value, $id, $options);
		echo '</div>'.$desc.'</td>';
	
	}
	
}