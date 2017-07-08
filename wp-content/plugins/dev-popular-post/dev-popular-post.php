<?php
/**
 * Plugin Name: Dev Popular Post
 * Author: Devkaran Patidar
 * Author Name: Devkaran Patidar
 * Description: This plugin is count your website all visitor al=nd show all popular post( like us page,post etc)
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if ( ! class_exists( 'Dev_Post_Visit_Count' ) ) :

	final class Dev_Post_Visit_Count {}

	/**
	 * Instantiate the plugin
	 *
	 * @since 1.0.0
	 */
	function _dev_post_visit_count_func() {
		new Dev_Post_Visit_Count();
	}
	add_action( 'init', '_dev_post_visit_count_func', 99 );

endif;




define( 'DEV_PLUGIN_URI' , plugin_dir_url( __FILE__ ) );
define( 'DEV_PLUGIN_PATH' , plugin_dir_path( __FILE__ ) );

require DEV_PLUGIN_PATH . '/includes/plugin-functions.php';
require DEV_PLUGIN_PATH . '/includes/plugin-settings.php';
require DEV_PLUGIN_PATH . '/includes/plugin-dashboard.php';
require DEV_PLUGIN_PATH . '/includes/plugin-column.php';
require DEV_PLUGIN_PATH . '/includes/plugin-popular-post.php';

function dev_post_view_count_activate() {
	/* Your Plugin Activate Code */
}
register_activation_hook( __FILE__, 'dev_post_view_count_activate' );


function dev_post_view_count_deactivate() {
	// Remove All Meta Keys related to plugin
	//delete_post_meta_by_key( 'dev_post_visits_count_meta' );
}
register_deactivation_hook( __FILE__, 'dev_post_view_count_deactivate' );


/** 
 * Enqueue Plugin Css Styles
 */

function dev_load_custom_wp_admin_style() {
	wp_enqueue_style( 'dev-style-css', plugins_url('css/style.css', __FILE__) );

	//Included PLugins Scripts
	wp_register_script( 'popular_plugins-js', plugins_url('js/popular_plugins.js', __FILE__), array(), '', true);
	wp_enqueue_script( 'popular_plugins-js' );
}
add_action( 'admin_enqueue_scripts', 'dev_load_custom_wp_admin_style' );