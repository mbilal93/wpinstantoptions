<?php
/*
   Plugin Name: All in one options panel
   Plugin URI: 
   Description: Custom admin panel for wordpress
   Version: 0.01
   Author: Muhammad Bilal
   Author URI: 
   License: 
*/

require("functions.php");

//Additional classes
function allinone_body_class(){
    return "allinoneAdmin";
}
add_filter('admin_body_class','allinone_body_class');



//Setup Plugin
function allinone_js()
{
  global $pluginName;
	echo '
	<script src="'.pluginpath.'/colorpicker/js/colorpicker.js"></script>	
	';
	wp_enqueue_script( 'jquery-ui-dialog' );
  wp_enqueue_script( 'admin-js',pluginpath.'/admin.js.','','',true );
  wp_enqueue_script( 'admin-ajax-js',pluginpath.'/ajax.js.','','',true );
	wp_enqueue_style( 'wp-jquery-ui-dialog');
  wp_localize_script('admin-ajax-js','ajaxreq',array('ajaxurl'=>admin_url( 'admin-ajax.php')));
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'custom-script-handle', plugins_url( 'colorpicker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

}
add_action('admin_head', 'allinone_js');

function mw_enqueue_color_picker( $hook_suffix ) {
  // first check that $hook_suffix is appropriate for your admin page
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'my-script-handle', plugins_url('admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );



function allinone_skin()
{
	echo '<link rel="stylesheet" href="'.pluginpath.'/admin.css" type="text/css" media="all">';
	echo '<link rel="stylesheet" href="'.pluginpath.'/colorpicker/css/colorpicker.css" type="text/css" media="all">';
}
add_action('admin_head', 'allinone_skin');

register_activation_hook(__FILE__,'initialize_db');

register_uninstall_hook(__FILE__,'uninstall_db');


function frontporch_enqueue_scripts() {
	if (is_admin() ) {
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'google-jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js', array( 'jquery' ) );
		wp_register_style( 'template-style', 'http://www.frontporchdeals.com/wordpress/wp-includes/js/jqueryui/css/ui-lightness/jquery-ui-1.8.12.custom.css', true);
	}
}

add_action( 'init', 'frontporch_enqueue_scripts' );
