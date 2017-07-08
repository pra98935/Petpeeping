<?php
/**
 * Select Fields
 */


class DMOF_Fields_Select{

	public static function get_select( $id, $name, $desc, $options, $data_type, $multiple = false, $default, $get_value = '' ){

		echo '<th class="dmof_title">'.$name.'</th>';

		$get_value = ($get_value) ? $get_value : $default;

		echo '<td class="dmof_content">';

		if ($multiple) {
			echo '<select name="'.$id.'[]" class="dmof_select_options_example '.$id.'" multiple="multiple">';	
		}else{
			echo '<select name="'.$id.'" class="dmof_select_options_example '.$id.'">';
		}
				        	
		if ($data_type) {
    		if ($data_type == 'post' || $data_type == 'pages') {
    			$data = '';
    			if ($data_type == 'post') { $data = get_posts( $options ); }
    			if ($data_type == 'pages') { $data = get_pages( $options ); }

    			if (!empty($data)) {
					foreach ( $data as $page ) {
						
						if ($get_value == $page->ID || is_array($get_value) && in_array( $page->ID, $get_value )) {
							echo '<option value="'.$page->ID.'" selected>'.$page->post_title.'</option>';
						}else{
					    	echo '<option value="'.$page->ID.'">'.$page->post_title.'</option>';
						}
					}
				}

    		} // end page/post

    		if ($data_type == 'taxonomies') {

	    		$taxonomies = get_taxonomies($options,'objects'); 
				foreach ( $taxonomies as $taxonomy ) {
					if ($get_value == $taxonomy->slug || is_array($get_value) && in_array( $taxonomy->slug, $get_value ) ) {
						echo '<option value="'.$taxonomy->slug.'" selected>'.$taxonomy->label.'</option>';
					}else{
				    	echo '<option value="'.$taxonomy->slug.'">'.$taxonomy->label.'</option>';
					}
				}
    		} // end taxonomies

    		// get terms
    		if ($data_type == 'terms') {
	    		$terms = get_terms( $options );
	    		foreach ( $terms as $term ) {
			        if ($get_value == $term->term_id || is_array($get_value) && in_array( $term->term_id, $get_value )) {
						echo '<option value="'.$term->term_id.'" selected>'.$term->name.'</option>';
					}else{
				    	echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
					}
			    }
    		} // end terms

    		// get all Menu
    		if ($data_type == 'menus') {
    			$menus = get_terms('nav_menu');
				foreach($menus as $menu){
					if ($get_value == $menu || is_array($get_value) && in_array( $menu, $get_value )) {
						echo '<option value="'.$menu->term_id.'" selected>'.$menu->name.'</option>';
					}else{
				    	echo '<option value="'.$menu->term_id.'">'.$menu->name.'</option>';
					}
				}
			}

			// Get all menu location
			if ($data_type == 'menu_location') {
    			$menus = get_registered_nav_menus();
				foreach ( $menus as $location => $description ) {
					if ($get_value == $location || is_array($get_value) && in_array( $location, $get_value )) {
						echo '<option value="'.$location.'" selected>'.$description.'</option>';
					}else{
				    	echo '<option value="'.$location.'">'.$description.'</option>';
					}
				}
    		} // end get menu location

    		// Get all wordpress user
			if ($data_type == 'users') {
				$get_users = get_users();
				foreach ( $get_users as $user ) {
					
					if ($get_value == $user->ID || ( is_array($get_value) && in_array( $user->ID, $get_value ) )) {
						echo '<option value="'.$user->ID.'" selected>'.$user->display_name.'</option>';
					}else{
				    	echo '<option value="'.$user->ID.'">'.$user->display_name.'</option>';
					}
				}
    		} // end get menu location

    		// Get all wordpress Post types
			if ($data_type == 'post_types') {
				$post_types = get_post_types( $options , 'objects');

				foreach ( $post_types  as $post_type ) {
					
					if ($get_value == $post_type->name || ( is_array($get_value) && in_array( $post_type->name, $get_value ) )) {
						echo '<option value="'.$post_type->name.'" selected>'.$post_type->label.'</option>';
					}else{
				    	echo '<option value="'.$post_type->name.'">'.$post_type->label.'</option>';
					}
				}
    		} // end post types


			// get all sidebar
    		if ($data_type == 'sidebar') {
	    		
	    		global $wp_registered_sidebars;
	    		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
	    			$sidebar_id = $sidebar['id'];
	    			$sidebar_name = ucwords( $sidebar['name'] );
	    			if ($get_value == $sidebar_id || is_array($get_value) && in_array( $sidebar, $get_value )) {
						echo '<option value="' .$sidebar_id. '" selected>'.$sidebar_name.'</option>';
					}else{
						echo '<option value="' .$sidebar_id. '">'.$sidebar_name.'</option>';
					}
	    		}
    		} // end sidebar

    	}else{
    		if ($options) {
        		foreach ($options as $key => $value) {
        			if ($get_value == $key || is_array($get_value) && in_array( $key, $get_value )) {
        				echo '<option value="'.$key.'" selected>'.$value.'</option>';
        			}else{
        				echo '<option value="'.$key.'">'.$value.'</option>';
        			}
        		}
        	}
    	}

        echo '</select>'.$desc;

        echo '</td>';

	}
}