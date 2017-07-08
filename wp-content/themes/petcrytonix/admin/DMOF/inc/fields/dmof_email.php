<?php
/**
 * Email Fields
 */

class DMOF_Fields_Email{
	public static function get_email( $id, $name, $desc, $placeholder, $get_value = '' ){
		
		echo '<th class="dmof_title">'.$name.'</th>';

		echo '<td class="dmof_content"><input type="email" name="'.$id.'" value="'.$get_value.'" placeholder="'.$placeholder.'">'.$desc.'</td>';
	
	}
}