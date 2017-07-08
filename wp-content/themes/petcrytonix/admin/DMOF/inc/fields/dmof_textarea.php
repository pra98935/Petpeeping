<?php
/**
 * Textarea Fields
 */

class DMOF_Fields_Textarea{

	public static function get_textarea( $id, $name, $placeholder, $desc, $options, $get_value ){

		$rows = (is_array($options) && isset($options['rows'])) ? $options['rows'] : '5';
		$cols = (is_array($options) && isset($options['cols'])) ? $options['cols'] : '54';

		echo '<th class="dmof_title">'.$name.'</th>';

		echo '<td class="dmof_content"><textarea name="'.$id.'" rows="'.$rows.'" cols="'.$cols.'" placeholder="'.$placeholder.'">'.$get_value.'</textarea>'.$desc.'</td>';

	}
}