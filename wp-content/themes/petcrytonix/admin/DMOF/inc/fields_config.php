<?php
/**
 * Included all fields type
 */

$dir = dirname( __FILE__ ) . '/fields';
$files = glob($dir . '/*.php');
foreach ($files as $file) {
    require($file);   
}