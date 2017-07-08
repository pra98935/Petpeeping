<?php
/**
 * fields type password
 */

class DMOF_Fields_Password{

	public static function password_fields( $id, $name, $desc, $placeholder, $get_value ){

		echo '<th class="dmof_title">'.$name.'</th>';
		echo '<td class="dmof_content"><input type="password" name="'.$id.'" value="'.$get_value.'" placeholder="'.$placeholder.'">'.$desc.'</td>';

	}

}