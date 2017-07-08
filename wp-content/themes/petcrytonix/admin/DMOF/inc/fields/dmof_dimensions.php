<?php
/**
 * Fields type Spacing
 */

class DMOF_Fields_Dimensions{

	public static function dimensions( $id, $name, $desc, $placeholder, $get_value = '', $default = '' ){

		echo '<th class="dmof_title">'.$name.'</th>';

        if (is_array($placeholder)) {
            $pl_width  = $placeholder[0];
            $pl_height = $placeholder[1];
        }else{
            $pl_width  = $placeholder;
            $pl_height = $placeholder;
        }

        $default_width = ( isset($default['width']) ) ? $default['width'] : '';
        $default_height = ( isset($default['height']) ) ? $default['height'] : '';

        $width      = ( !empty($get_value['width']) ) ? $get_value['width'] : $default_width;
        $height     = ( !empty($get_value['height']) ) ? $get_value['height'] : $default_height;

		echo '<td class="dmof_content">';

		echo '<div class="dmof_dimensions_wrap">';

    		echo '<div class="dmof_dimensions_sec width"><span class="dashicons dashicons-arrow-left-alt"></span><span class="dashicons dashicons-arrow-right-alt"></span><input type="text" name="'.$id.'[width]" value="'.$width.'" placeholder="'.$pl_width.'" /><span class="spacing_px">PX</span></div>';
    		echo '<div class="dmof_dimensions_sec height"><span class="dashicons dashicons-arrow-up-alt"></span><span class="dashicons dashicons-arrow-down-alt"></span><input type="text" name="'.$id.'[height]" value="'.$height.'" placeholder="'.$pl_height.'" /><span class="spacing_px">PX</span></div>';

    		echo '</div><div class="clear"></div>'.$desc;

    	echo '</td>';

	}

}