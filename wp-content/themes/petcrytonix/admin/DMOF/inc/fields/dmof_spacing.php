<?php
/**
 * Fields type Spacing
 */

class DMOF_Fields_Spacing{

	public static function fields_spacing( $id, $name, $desc, $placeholder, $get_value ,$default ){

		echo '<th class="dmof_title">'.$name.'</th>';

        $default_top    = ( isset($default['top'])) ? $default['top'] : '';
        $default_right  = ( isset($default['right']) ) ? $default['right'] : '';
        $default_bottom = ( isset($default['bottom']) ) ? $default['bottom'] : '';
        $default_left   = ( isset($default['left']) ) ? $default['left'] : '';        

        $top            = ( isset($get_value['top']) ) ? $get_value['top'] : $default_top;
        $right          = ( isset($get_value['right']) ) ? $get_value['right'] : $default_right;
        $bottom         = ( isset($get_value['bottom']) ) ? $get_value['bottom'] : $default_bottom;
        $left           = ( isset($get_value['left']) ) ? $get_value['left'] : $default_left;

        if (is_array($placeholder)) {
            
            $pl_top     = ( $placeholder[0] ) ? $placeholder[0] : '';
            $pl_right   = ( $placeholder[1] ) ? $placeholder[1] : '';
            $pl_bottom  = ( $placeholder[2] ) ? $placeholder[2] : '';
            $pl_left    = ( $placeholder[3] ) ? $placeholder[3] : '';

        }else{
            $pl_top     = ( $placeholder ) ? $placeholder : '';
            $pl_right   = ( $placeholder ) ? $placeholder : '';
            $pl_bottom  = ( $placeholder ) ? $placeholder : '';
            $pl_left    = ( $placeholder ) ? $placeholder : '';
        }

		echo '<td class="dmof_content">';

            echo '<div class="dmof_spacing_wrap">';

        		echo '<div class="dmof_spacing_sec top"><span class="dashicons dashicons-arrow-up"></span><input type="text" name="'.$id.'[top]" value="'.$top.'" placeholder="'.$pl_top.'" /><span class="spacing_px">PX</span></div>';
        		echo '<div class="dmof_spacing_sec right"><span class="dashicons dashicons-arrow-right"></span><input type="text" name="'.$id.'[right]" value="'.$right.'" placeholder="'.$pl_right.'" /><span class="spacing_px">PX</span></div>';
        		echo '<div class="dmof_spacing_sec bottom"><span class="dashicons dashicons-arrow-down"></span><input type="text" name="'.$id.'[bottom]" value="'.$bottom.'" placeholder="'.$pl_bottom.'" /><span class="spacing_px">PX</span></div>';
        		echo '<div class="dmof_spacing_sec left"><span class="dashicons dashicons-arrow-left"></span><input type="text" name="'.$id.'[left]" value="'.$left.'" placeholder="'.$pl_left.'" /><span class="spacing_px">PX</span></div>';

    		echo '</div>'.$desc;

    	echo '</td>';

	}

}