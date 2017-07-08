<?php
/**
 * Select Fields
 */


class DMOF_Fields_Image_Select{

	public function get_image_select( $id, $name, $desc, $options, $default, $get_value = '' ){

		echo '<th class="dmof_title">'.$name.'</th>';

		$get_value = ($get_value) ? $get_value : $default;

		echo '<td class="dmof_content">';
			echo '<div class="dmof_image_select_wrap">';
			echo '<select name="'.$id.'" class="dmof_image_select">';
			if ($options) {
				foreach ($options as $key => $value) {
					if ($get_value == $key) {
						echo '<option name="'.$id.'" data-img-src="'.$value.'" value="'.$key.'" selected></option>';
					}else{
						echo '<option name="'.$id.'" data-img-src="'.$value.'" value="'.$key.'"></option>';
					}
				}
			}

        echo '</select>'.$desc;
        echo '</div>';
        echo '</td>';

	}
}