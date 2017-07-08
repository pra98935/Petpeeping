<?php
/*
 * Plugin Name: Dev Category Image
 * Author: Devkaran Patidar
 * Author URI: http://devpatidar.com/
 * Description: Dev Categories Images Plugin allow you to add an image to category or any custom term.
 * Version: 1.0.0
 * text-domain: DCI
*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define('DCI_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('DCI_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

define('DCI_PLUGIN_PLACEHOLDER_IMG', DCI_PLUGIN_URL."/images/img_placeholder.jpg");

require DCI_PLUGIN_PATH . 'includes/plugin-settings.php';
require DCI_PLUGIN_PATH . 'includes/plugin-functions.php';


/**
 * Includes plugin style and scripts
 */

function DCI_load_custom_wp_admin_style() {
	wp_enqueue_script('jquery');
    wp_enqueue_style( 'dci-style-css', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_script( 'dci-plugin-js', plugins_url('js/plugins-js.js', __FILE__), array(), '1.0.0', false  );
}
add_action( 'admin_enqueue_scripts', 'DCI_load_custom_wp_admin_style' );