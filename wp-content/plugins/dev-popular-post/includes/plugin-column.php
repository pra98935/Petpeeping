<?php
/**
 * Disply Post Count Data on Post Listing Column
 */

//function dev_add_option_in_column(){

	// Hooks For Display data on post column
	foreach ( dev_get_post_types('exclude')  as $post_type ) {
		// Edit job custom post type column
		add_filter( 'manage_edit-'.$post_type.'_columns', 'dev_posting_columns_title' );// Custom Column Title
		add_action( 'manage_'.$post_type.'_posts_custom_column', 'dev_posting_columns_content', 2 );
		add_filter( 'manage_edit-'.$post_type.'_sortable_columns', 'dev_posting_columns_sortable' ); // sorting by date or etc
	}

	// Post Custom column title
	function dev_posting_columns_title( $columns ) {
		
		if ( ! is_array( $columns ) ) { $columns = array(); }
		$count_title = dev_get_theme_options('dev_post_count_title');
		$count_title = ($count_title) ? $count_title : 'Hits';
		$columns["total_hits"]  = __( $count_title, 'dev' );
		
		return $columns;
	}

	// Post Custom column content
	function dev_posting_columns_content( $column ) {
		global $post;
		$post_id = $post->ID;
		switch ( $column ) {
			case "total_hits" :
				$post_counts = get_post_meta( $post_id, 'dev_post_visits_count_meta', true );
				$post_counts = ($post_counts) ? $post_counts : '0';

				if ($post_counts > 9999 && $post_counts <= 999999) {
				    $result = $post_counts / 10000 . 'K';
				} elseif ($post_counts > 999999) {
				    $result = ($post_counts / 1000000) . ' M';
				} else {
				    $result = $post_counts;
				}

				echo '<span class="post_view" title="Post View Counts">' .$result. '</span>';
			break;
		}
	}

	
//}
//add_action('admin_init','dev_add_option_in_column');

// Sortable job posting
function dev_posting_columns_sortable( $columns ) {

   $columns['total_hits'] = 'dev_total_hits';
    return $columns;
}
// Sorting post order by query
add_action( 'pre_get_posts', 'dev_posting_columns_sortable_orderby' );
function dev_posting_columns_sortable_orderby( $query ) {
    if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'dev_total_hits' == $orderby ) {
        $query->set('meta_key','dev_post_visits_count_meta');
        $query->set('orderby','meta_value_num');
    }
}

/**
 * Display Post Count on Edit Post Page
 */

// Display post count on edit post section above of publish button
add_action( 'post_submitbox_misc_actions', 'dev_post_submitbox_misc_actions' );
function dev_post_submitbox_misc_actions(){
    global $post; $post_id = $post->ID;

    foreach ( dev_get_post_types('exclude')  as $post_type ) {
    	if ($post->post_type == $post_type) {
    		
		    echo '<div class="misc-pub-section total-post-hits-count">';
		    	
		    	$count_title = dev_get_theme_options('dev_post_count_title');
				$count_title = ($count_title) ? $count_title : 'Hits';
				
		        echo '<label for="my_custom_post_action">Total '.$count_title.' : </label>';

		        $posts_views = get_post_meta( $post_id, 'dev_post_visits_count_meta', true );
		        $posts_views = ($posts_views) ? $posts_views : '0';

				if ($posts_views > 9999 && $posts_views <= 999999) {
				    $results = $posts_views / 10000 . 'K';
				} elseif ($posts_views > 999999) {
				    $results = ($posts_views / 1000000) . ' M';
				} else {
				    $results = $posts_views;
				}
		        
		        printf('<strong>%s</strong>',$results);

		    echo '</div>';
		}
    }
}

/**
 * Protect Meta
 */
/* Protect Meta */
add_filter( 'is_protected_meta', 'dpp_protect_meta_post_like', 10, 2 );
function dpp_protect_meta_post_like( $protected, $meta_key ) {
    if ( 'dev_post_visits_count_meta' == $meta_key ) return true;
    return $protected;
}