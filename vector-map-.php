<?php 
/*
Plugin Name: Vector Map 
Plugin URI: spreadfilms.de
Description: vector map
Version: 0.0.1
Author: Shreeram
Author URI: spreadfilms.de
Text Domain: vm
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if


require_once('installation.php');
register_activation_hook( __FILE__, 'vector_table' );


// Let's Initialize Everything
if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );
}
