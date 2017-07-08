<?php
/**
* color picker
*/


class DMOF_Fields_Color {

	public static function get_color_picker( $id, $name ,$desc, $default, $get_value){
		
		echo '<th class="dmof_title">'.$name.'</th>';

		$get_value = ($get_value) ? $get_value : $default;

		echo '<td class="dmof_content"><div class="pagebox">';
			if ($get_value) {
				echo '<input class="dmof_color_picker" type="text" name="'.$id.'" value="'.$get_value.'" />';
			}else{
				echo '<input class="dmof_color_picker" type="text" name="'.$id.'" />';
			}
		echo '</div>'.$desc.'<td>';
	}

}