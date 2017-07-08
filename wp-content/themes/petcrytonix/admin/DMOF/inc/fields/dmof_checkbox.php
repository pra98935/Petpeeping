<?php
/**
 * Checkbox
 */

class DMOF_Fields_Checkbox {

	public static function get_checkbox( $id, $name = '', $desc = '', $options = '', $data_type = '', $default, $get_value = ''){
		
		echo '<th class="dmof_title">'.$name.'</th>';

		echo '<td class="dmof_content">';

		echo '<div class="dmof-checkbox-content">';

	    	if (!empty($data_type)) {
	    		if ($data_type == 'post' || $data_type == 'pages') {
	    			$data = '';
	    			if ($data_type == 'post') { $data = get_posts( $options ); }
	    			if ($data_type == 'pages') { $data = get_pages( $options ); }

	    			if (!empty($data)) {
    				
						foreach ( $data as $page ) {
							if ($get_value && in_array($page->ID, $get_value)) {
								echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$page->ID.'" checked><div class="control__indicator"></div>'.$page->post_title.'</label>';
							}else{
								echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$page->ID.'"><div class="control__indicator"></div>'.$page->post_title.'</label>';
							}
						}
					}

	    		} // end page/post

	    		if ($data_type == 'taxonomies') {

		    		$taxonomies = get_taxonomies($options,'objects'); 
					foreach ( $taxonomies as $taxonomy ) {
						if ($get_value && in_array($taxonomy->slug, $get_value)) {
							echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$taxonomy->slug.'" checked><div class="control__indicator"></div>'.$taxonomy->label.'</label>';
						}else{
					    	echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$taxonomy->slug.'"><div class="control__indicator"></div>'.$taxonomy->label.'</label>';
						}

					}
	    		} // end taxonomies

	    		// get terms
	    		if ($data_type == 'terms') {
		    		$terms = get_terms( $options );
		    		if (!is_wp_error($terms)) {
			    		foreach ( $terms as $term ) {
			    			if ($get_value && in_array($term->term_id, $get_value)) {
								echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$term->term_id.'" checked><div class="control__indicator"></div>'.$term->name.'</label>';
							}else{
						    	echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$term->term_id.'"><div class="control__indicator"></div>'.$term->name.'</label>';
							}
					    }
					}
	    		} // end taxonomies

	    	}else{
	    		if ($options) {
	        		foreach ($options as $key => $value) {
	        			if ($get_value && is_array($get_value) && in_array($key, $get_value)) {
	        				echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$key.'" checked><div class="control__indicator"></div>'.$value.'</label>';
	        			}else{
	        				echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="'.$key.'"><div class="control__indicator"></div>'.$value.'</label>';
	        			}
	        		}
	        	}else{
	        		if ($get_value) {
        				echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="1" checked><div class="control__indicator"></div>'.$name.'</label>';
        			}else{
        				echo '<label class="control control--checkbox"><input type="checkbox" name="'.$id.'[]" value="1"><div class="control__indicator"></div>'.$name.'</label>';
        			}
	        	}
	    	}

        	echo $desc.'</div>';

        echo '</tr>';
	}
	
}