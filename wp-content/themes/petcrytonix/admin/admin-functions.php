<?php
/**
 * Admin Custom Functions
 * @package PET
 */



/**=====================================================================================================
 * Custom Post type
 =======================================================================================================*/

// Register Custom Post Type
function pet_custom_post_types_func() {

	$labels = array(
		'name'                  => _x( 'Pet Profiles', 'Post Type General Name', 'pet' ),
		'singular_name'         => _x( 'Pet Profiles', 'Post Type Singular Name', 'pet' ),
		'menu_name'             => __( 'Pet Profiles', 'pet' ),
		'name_admin_bar'        => __( 'Pet Profiles', 'pet' ),
		'archives'              => __( 'Item Archives', 'pet' ),
		'attributes'            => __( 'Item Attributes', 'pet' ),
		'parent_item_colon'     => __( 'Parent Item:', 'pet' ),
		'all_items'             => __( 'All Items', 'pet' ),
		'add_new_item'          => __( 'Add New Item', 'pet' ),
		'add_new'               => __( 'Add New', 'pet' ),
		'new_item'              => __( 'New Item', 'pet' ),
		'edit_item'             => __( 'Edit Item', 'pet' ),
		'update_item'           => __( 'Update Item', 'pet' ),
		'view_item'             => __( 'View Item', 'pet' ),
		'view_items'            => __( 'View Items', 'pet' ),
		'search_items'          => __( 'Search Item', 'pet' ),
		'not_found'             => __( 'Not found', 'pet' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pet' ),
		'featured_image'        => __( 'Featured Image', 'pet' ),
		'set_featured_image'    => __( 'Set featured image', 'pet' ),
		'remove_featured_image' => __( 'Remove featured image', 'pet' ),
		'use_featured_image'    => __( 'Use as featured image', 'pet' ),
		'insert_into_item'      => __( 'Insert into item', 'pet' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'pet' ),
		'items_list'            => __( 'Items list', 'pet' ),
		'items_list_navigation' => __( 'Items list navigation', 'pet' ),
		'filter_items_list'     => __( 'Filter items list', 'pet' ),
	);
	$args = array(
		'label'                 => __( 'Pet Profiles', 'pet' ),
		'description'           => __( 'Pet Profiles Description', 'pet' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', 'post-formats', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		//'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'pet_profiles', $args );

	/**
	 * Register Boat taxonomy post type Categories
	 */

	$labels = array(
		'name'                       => _x( 'Categories', 'Categories', 'pet' ),
		'singular_name'              => _x( 'Categories', 'Categories', 'pet' ),
		'menu_name'                  => __( 'Categories', 'pet' ),
		'all_items'                  => __( 'All Items', 'pet' ),
		'parent_item'                => __( 'Parent Item', 'pet' ),
		'parent_item_colon'          => __( 'Parent Item:', 'pet' ),
		'new_item_name'              => __( 'New Item Name', 'pet' ),
		'add_new_item'               => __( 'Add New Item', 'pet' ),
		'edit_item'                  => __( 'Edit Item', 'pet' ),
		'update_item'                => __( 'Update Item', 'pet' ),
		'view_item'                  => __( 'View Item', 'pet' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pet' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'pet' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pet' ),
		'popular_items'              => __( 'Popular Items', 'pet' ),
		'search_items'               => __( 'Search Items', 'pet' ),
		'not_found'                  => __( 'Not Found', 'pet' ),
		'no_terms'                   => __( 'No items', 'pet' ),
		'items_list'                 => __( 'Items list', 'pet' ),
		'items_list_navigation'      => __( 'Items list navigation', 'pet' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'pet_profiles_cat', array( 'pet_profiles' ), $args );



}
add_action( 'init', 'pet_custom_post_types_func', 0 );