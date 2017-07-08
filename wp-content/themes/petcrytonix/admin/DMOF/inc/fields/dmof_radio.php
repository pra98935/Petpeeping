<?php
/**
 * Radio Fields
 */
class DMOF_Fields_Radio{

	public static function get_radio_btn( $id, $name, $options, $desc, $default, $get_value ){

        echo '<th class="dmof_title">'.$name.'</th>';

        $get_value = ($get_value) ? $get_value : $default;

        echo '<td class="dmof_content radio">';

		if ($options) {
    		foreach ($options as $key => $value) {
    			if ($get_value == $key) {
    				echo '<label class="control control--radio"><input type="radio" name="'.$id.'" value="'.$key.'" checked>'.$value.'<div class="control__indicator"></div></label>';
    			}else{
    				echo '<label class="control control--radio"><input type="radio" name="'.$id.'" value="'.$key.'">'.$value.'<div class="control__indicator"></div></label>';
    			}
    		}
        }else{
            if ($get_value) {
                echo '<label class="control control--radio"><input type="radio" name="'.$id.'" value="1" checked>'.$value.'<div class="control__indicator"></div></label>';
            }else{
                echo '<label class="control control--radio"><input type="radio" name="'.$id.'" value="1">'.$name.'<div class="control__indicator"></div></label>';
            }
        }
    	

        echo $desc.'</td>';
	}
}