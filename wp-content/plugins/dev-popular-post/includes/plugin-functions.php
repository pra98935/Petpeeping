<?php /* Plugin Custom Functions */


// Get the all options of Plugins
/*
 * @param $ID put the plugins options id and get single id data
*/

function dev_get_theme_options($id=''){

	$get_dev_plugin_options = get_option('dev_plugin_options');
	if ($get_dev_plugin_options && $id) {
		return $get_dev_plugin_options[$id];
	}else{
		return $get_dev_plugin_options;
	}
}

/*
 * Get all Post Types of site
 * @param $exclude_data 
 *  if you want to only folter data from post type put exclude param in functions
 */

function dev_get_post_types($exclude_data=''){

	$args = array('public'   => true,);
	$post_types = get_post_types( $args);
	
	unset($post_types['attachment']);// remove from attachment
	// if exclude param is available
	if ($exclude_data) {
		foreach ( $post_types  as $post_type ) {
			if( dev_get_theme_options('dev_post_type_'.$post_type) == 'on'){
				unset($post_types[$post_type]);
			}
		}	
	}
	return $post_types;
}

/**
 * Get Post Visitor for all pages
 */
// Process of check post visits count
function dev_post_visits_count(){

	if (is_home() || is_singular() || is_front_page()) {

		global $wp_query;

		$page_object = $wp_query->get_queried_object();
		$post_id     = $wp_query->get_queried_object_id();

		$curnt_post = get_post_type($post_id);
		$exclude_post = dev_get_post_types('exclude');
		
		if (is_array($exclude_post) && in_array($curnt_post, $exclude_post)) {
		
		    // Is Blog Page select from setting->reading
			if(is_home()){ $post_id = get_option( 'page_for_posts' ); }

			// Get Post Count data
			$dev_post_count = get_post_meta($post_id, 'dev_post_visits_count_meta', true); //Get Post meta value

			$get_visits_option =  dev_get_theme_options('dev_post_visits_option'); //Get Visits Count Options
			
			if ($get_visits_option == 'all_visits_count') {
				if ($dev_post_count) {
			        update_post_meta($post_id, 'dev_post_visits_count_meta', $dev_post_count+1); // Update post meta value
			    }else{
			        add_post_meta($post_id, 'dev_post_visits_count_meta', '1'); //Register Post Meta Value   
			    }
			}else{ // Only Visits Count
				// Retrieve Ip Address
				$post_IP_ADDR = $_SERVER['REMOTE_ADDR'];
				// Get Current store ip
				$dev_get_meta_IP = get_post_meta($post_id, '_dev_post_visiter_ip', true); //Get Post meta value
			    
			    if (!$dev_post_count && ($dev_get_meta_IP !== $post_IP_ADDR)) {
			    	if ($dev_post_count) {
				        update_post_meta($post_id, 'dev_post_visits_count_meta', $dev_post_count+1); // Update post meta value
				    }else{
				        add_post_meta($post_id, 'dev_post_visits_count_meta', '1'); //Register Post Meta Value   
				    }	
			    }
			}
		} //-> End Exclude Post
	}// end page conditions
}
add_action('wp_head','dev_post_visits_count');

// End get visitors