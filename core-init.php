<?php 
/*
*
*	***** Vector Map  *****
*
*	This file initializes all VM Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

require_once('assets/inc/vm-dashboard.php');

function vm_admin_menu(){
    add_menu_page('Vector Map', 'Vector Map', 'manage_options', 'vm-main', 'vm_dashboard','dashicons-xing');
}
add_action('admin_menu','vm_admin_menu');


// Define Our Constants
define('VM_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('VM_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('VM_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('VM_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function vector_map_admin_dashboard_css(){
    wp_enqueue_style('Vector_map_admin_css', VM_CORE_CSS. '/admin-dashboard.css');
    wp_enqueue_style('Vector_map_admin_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    wp_enqueue_script('Vector_map_admin_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');

    wp_enqueue_style('vm-kbmapmarkers', VM_CORE_CSS . 'KBmapmarkers.css',null,time(),'all');
    wp_enqueue_style('vm-font', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',null,time(),'all');

    wp_enqueue_script('jquery-3.3.1', 'https://code.jquery.com/jquery-3.3.1.slim.min.js',time(),true);
    wp_enqueue_script('vm-kbmapmarkers', VM_CORE_JS . 'KBmapmarkers.js',null,time(),true);
    wp_enqueue_script('vm-kbmapmarkersCords', VM_CORE_JS . 'KBmapmarkersCords.js',null,time(),true);
}
add_action( 'admin_enqueue_scripts', 'vector_map_admin_dashboard_css' );
function vm_register_core_css(){
wp_enqueue_style('vm-core', VM_CORE_CSS . 'vm-core.css',null,time(),'all');
wp_enqueue_style('vm-kbmapmarkers', VM_CORE_CSS . 'KBmapmarkers.css',null,time(),'all');
wp_enqueue_style('vm-font', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'vm_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function vm_register_core_js(){
// Register Core Plugin JS	
//wp_enqueue_script('vm-core', VM_CORE_JS . 'vm-core.js','jquery',time(),true);
wp_enqueue_script('jquery-3.3.1', 'https://code.jquery.com/jquery-3.3.1.slim.min.js',time(),true);
wp_enqueue_script('vm-kbmapmarkers', VM_CORE_JS . 'KBmapmarkers.js',null,time(),true);
wp_enqueue_script('vm-kbmapmarkersCords', VM_CORE_JS . 'KBmapmarkersCords.js',null,time(),true);
};
add_action( 'wp_enqueue_scripts', 'vm_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( VM_CORE_INC . 'vm-core-functions.php' ) ) {
	require_once VM_CORE_INC . 'vm-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( VM_CORE_INC . 'vm-ajax-request.php' ) ) {
	require_once VM_CORE_INC . 'vm-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( VM_CORE_INC . 'vm-shortcodes.php' ) ) {
	require_once VM_CORE_INC . 'vm-shortcodes.php';
}
