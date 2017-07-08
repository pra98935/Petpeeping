<?php
/**
 * Plugin Name: Suffix Options
 * Plugin URI: https://devpatidar.com
 * Description: Create Theme options in WordPress.
 * Version: 1.0.0
 * Author: Dev Patidar
 * Author URI: http://www.devpatidar.com
 * License: GPL2+
 * Text Domain: dmof
 */

if (!defined( 'ABSPATH' )) return false;

define( 'DMOF_OPTIONS_VAR' , '1.0.0');
define( 'DMOF_OPTIONS_DIR' , dirname( __FILE__ ));

// Included metabox config
require_once DMOF_OPTIONS_DIR . '/includes/functions.php';
require_once DMOF_OPTIONS_DIR . '/includes/frontend_functions.php';

// included configration file
require_once DMOF_OPTIONS_DIR . '/config.php';

// init plugin functionality
$DMOF_Options = new DMOF_Options;
$DMOF_Options->init();