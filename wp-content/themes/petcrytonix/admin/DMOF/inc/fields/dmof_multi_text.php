<?php
/**
 * Fields type multitext
 */

class DMOF_Fields_Multitext{

	public static function multitext_fields( $id, $name, $desc, $placeholder,$get_value ){

		echo '<th class="dmof_title">'.$name.'</th>';

		echo '<td class="dmof_content">';

		echo '<div class="dmof_multitext_wrap field_wrapper">';

    		if ($get_value) {
    			$i = 1;
    			foreach ($get_value as $key => $value) {
    				if ($value) {
	    				if ($i == 1) {
	    					echo '<div class="dmof_add_more_fields"><input type="text" name="'.$id.'[]" value="'.$value.'"/><a href="javascript:void(0);" class="dmof_add_button" title="Add field"></a></div>';
	    				}else{
	    					echo '<div class="dmof_all_fields"><input type="text" name="'.$id.'[]" value="'.$value.'"/><a href="javascript:void(0);" class="remove_button" title="Remove field"></a></div>';
	    				}
	    			}else{
	    				if ($i == 1) {
	    					echo '<div class="dmof_add_more_fields"><input type="text" name="'.$id.'[]" value=""/><a href="javascript:void(0);" class="dmof_add_button" title="Add field"></a></div>';
	    				}
	    			}
    			$i++;	
    			}
    		}else{
    			echo '<div class="dmof_add_more_fields"><input type="text" name="'.$id.'[]" value=""/><a href="javascript:void(0);" class="dmof_add_button" title="Add field"></a></div>';
    		}

    		echo '</div>'.$desc;

    	echo '</td>';

	}

}