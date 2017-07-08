<?php
/**
 * Fields type switch
 */

class DMOF_Fields_Switch{

	public static function dmof_switch( $id, $name , $desc, $default = '1', $get_value) {

		echo '<th class="dmof_title">'.$name.'</th>';
			
			if ($get_value == '') {
				$get_value = $default;
			}

		echo '<td class="dmof_content">';
			echo '<span class="dmof_switch">';
    			if ($get_value) {
    				echo '<input class="dmof_switch_hidden" type="hidden" name="'.$id.'" value="'.$get_value.'"><input id="'.$id.'" class="dmof_switch_val" type="checkbox" name="dmof_switch_'.$id.'" value="'.$get_value.'" checked>';
    			}else{
    				echo '<input class="dmof_switch_hidden" type="hidden" name="'.$id.'" value="'.$get_value.'"><input id="'.$id.'" class="dmof_switch_val" type="checkbox" name="dmof_switch_'.$id.'" value="'.$get_value.'">';
    			}
    			//echo '<div class="dmof_switch_slider round"></div>';
    			echo '<label class="dmof_switch2" for="'.$id.'"></label>';
    		echo '</span>';
    	echo $desc.'</td>';
	
	}
	
}