<?php
/**
 * PLugin Name: DMOF
 * Author: Devkaran Patidar
 * Description: This is theme options and meta options framework
 * version: 1.0.0
 * text-domain: dmof 
 */


if ( ! defined( 'ABSPATH' ) && defined( 'DMOF' ) )
	return false;
	
	define( 'DMOF_PATH', dirname( __FILE__ ) );

	list( $path, $url ) = dmof_get_file_url( dirname( dirname( __FILE__ ) ) );
	// Plugin URLs, for fast enqueuing scripts and styles
	define( 'DMOF_framework_URL', $url );

	// DMOF images url
	define( 'DMOF_IMG_FOLDER_PATH', DMOF_framework_URL . 'DMOF/assets/images/' );


// included fields
require_once DMOF_PATH . '/inc/fields_config.php';

// Included metabox
require_once DMOF_PATH . '/meta_box/meta_box.php';

// included theme options
require_once DMOF_PATH . '/theme_options/theme_options.php';


/**
 * Get plugin base path and URL.
 * The method is static and can be used in extensions.
 *
 * @link http://www.deluxeblogtips.com/2013/07/get-url-of-php-file-in-wordpress.html
 * @param string $path Base folder path
 * @return array Path and URL.
 */

function dmof_get_file_url( $path = '' ) {
	// Plugin base path
	$path       = wp_normalize_path( untrailingslashit( $path ) );
	$themes_dir = wp_normalize_path( untrailingslashit( dirname( realpath( get_stylesheet_directory() ) ) ) );

	// Default URL
	$url = plugins_url( '', $path . '/' . basename( $path ) . '.php' );

	// Included into themes
	if (
		0 !== strpos( $path, wp_normalize_path( WP_PLUGIN_DIR ) )
		&& 0 !== strpos( $path, wp_normalize_path( WPMU_PLUGIN_DIR ) )
		&& 0 === strpos( $path, $themes_dir )
	) {
		$themes_url = untrailingslashit( dirname( get_stylesheet_directory_uri() ) );
		$url        = str_replace( $themes_dir, $themes_url, $path );
	}

	$path = trailingslashit( $path );
	$url  = trailingslashit( $url );

	return array( $path, $url );
}

/**
 * Include plugin styles and scripts
 */

add_action( 'admin_enqueue_scripts', 'dmof_admin_enqueues' );

function dmof_admin_enqueues(){

	wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

	wp_enqueue_style('select2-min-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', array(), '1.0.0', 'all');
	wp_enqueue_style( 'dmof-styles', DMOF_framework_URL . 'DMOF/assets/css/styles.css', array(), '1.0.0', 'all');
	/* Load Theme Script */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-accordion' );

	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');
	
	wp_enqueue_media(); 
	
	wp_enqueue_script('jquery-ui-datepicker');

	wp_register_script( 'select2_min_js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js' );
	wp_enqueue_script( 'select2_min_js' );

	wp_register_script( 'dmof-jquery', DMOF_framework_URL . 'DMOF/assets/js/jquery.js' );
	wp_enqueue_script( 'dmof-jquery' );
	wp_localize_script( 'dmof-jquery', 'dmof_ajax_object',array(
						'ajax_url' 			=> admin_url( 'admin-ajax.php' ),
						'current_user_id'	=> get_current_user_id(),
						'site_url' 			=> site_url(),
					) );
}