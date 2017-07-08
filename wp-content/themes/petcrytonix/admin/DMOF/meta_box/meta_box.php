<?php
/**
 * Plugin Name: Meta Box
 * Plugin URI: https://devpatidar.com
 * Description: Create meta boxes in WordPress.
 * Version: 1.0.0
 * Author: Dev Patidar
 * Author URI: http://www.devpatidar.com
 * License: GPL2+
 * Text Domain: dmb
 */

if (!defined( 'ABSPATH' )) return false;

define( 'DMOF_METABOX_DIR' , dirname( __FILE__ ));

// Included metabox config
require_once DMOF_METABOX_DIR . '/config.php';
require_once DMOF_METABOX_DIR . '/includes/core_functions.php';
require_once DMOF_METABOX_DIR . '/includes/dmb_functions.php';