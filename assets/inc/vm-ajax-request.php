<?php 
/*
*
*	***** Vector Map  *****
*
*	Ajax Request
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
Ajax Requests
*/
add_action( 'wp_ajax_vm_custom_plugin_frontend_ajax', 'vm_custom_plugin_frontend_ajax' );
add_action( 'wp_ajax_nopriv_vm_custom_plugin_frontend_ajax', 'vm_custom_plugin_frontend_ajax' );
function vm_custom_plugin_frontend_ajax(){	
    ob_start();
    if(isset($_POST['myInputFieldValue'])){
       $printName = $_POST['myInputFieldValue'];
       
        // Your ajax Request & Response
        echo 'Success, Ajax is Working On Your New Plugin. Your field value was: vm';
    } else {
        // Your ajax Request & Response
        echo 'Error, Ajax is Working On Your New Plugin But Your field was empty! Try Typing in the field!';    
    } 

	wp_die();
}