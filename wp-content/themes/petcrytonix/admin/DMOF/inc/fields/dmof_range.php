<?php
/**
 * Fields type range
 */

class DMOF_Fields_Range{
    
    public static function range_fields( $id, $name, $desc, $options, $default, $get_value ){
        
        echo '<th class="dmof_title">'.$name.'</th>';

        $get_value = ( $get_value ) ? $get_value : $default;
        
        echo '<td class="dmof_content">';
            
        $min_val = (isset($options['min'])) ? $options['min'] : '';
        $max_val = (isset($options['max'])) ? $options['max'] : '';
		
		echo '<div class="range-slider"><input class="range-slider__range" name="'.$id.'" type="range" value="'.$get_value.'" min="'.$min_val.'" max="'.$max_val.'"><span class="range-slider__value">'.$get_value.'</span></div>'.$desc;
        
        echo '</td>';
        
    }
    
}