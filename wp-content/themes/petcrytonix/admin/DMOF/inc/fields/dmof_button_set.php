<?php
/**
 * Email Fields
 */

class DMOF_Fields_Button_Set{
	public static function get_button_set( $id, $name, $options, $desc, $default, $get_value = '' ){
		
		echo '<th class="dmof_title">'.$name.'</th>';

		echo '<td class="dmof_content">';
		
		echo '<ul class="button-group dmof_button_set_wrap">';

		if ($options) {
			
			foreach ($options as $key => $value) {
				if ($get_value == $key) {
					echo '<li><a class="dmof_button_set_btn active" data-id="'.$key.'" href="#">'.$value.'</a></li>';
				}else{
					echo '<li><a class="dmof_button_set_btn" data-id="'.$key.'" href="#">'.$value.'</a></li>';
				}
			}
		
		}else{
			if ($get_value) {
				echo '<li><a class="dmof_button_set_btn active" data-id="'.$key.'" href="#">'.$name.'</a></li>';
			}else{
				echo '<li><a class="dmof_button_set_btn" data-id="'.$key.'" href="#">'.$name.'</a></li>';
			}
		}
		echo '<input type="hidden" name="'.$id.'" class="dmof_btn_set_val" value="'.$get_value.'" placeholder="'.$placeholder.'">';
		echo '</ul>';

		echo $desc.'</td>';
	
	}
}