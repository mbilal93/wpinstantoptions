<?php
$pluginName = 'allinoneoptionspanel';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currentpage=$protocol.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
define('current_page',$currentpage);
define('plugin_name',$pluginName);

$pluginpath = plugin_dir_url('').$pluginName;
define('pluginpath',$pluginpath);

define('template_url',get_template_directory_uri());

include('config.php');

function get_theme_option($field)
{
	global $wpdb;
	$sql = $wpdb->get_results("select * from ".theme_option_db_name." where option_name='".$field."'");

	if(isset($sql[0]->option_value)){
	return $sql[0]->option_value;
	}else
	{
		return NULL;
	}
}
function wpdocs_create_post_type() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name'          => __( 'Products', 'textdomain' ),
        'singular_name' => __( 'Product', 'textdomain' )
      ),
      'public'      => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-products',
    )
  );
}
add_action( 'init', 'wpdocs_create_post_type', 0 );

add_action ( 'admin_enqueue_scripts', function () {
        if (is_admin ())
            wp_enqueue_media ();
    } );
function theme_setup()
{
	include('theme_option_main.php');
}
function theme_option_menu()
{
	add_submenu_page('themes.php','WP Instant Options','WP Instant Options','manage_options','theme-options','theme_setup');
}
add_action('admin_menu','theme_option_menu');

function add_allinone_section(){
  $inputval = stripslashes($_POST['input']);
  global $wpdb;

  $dbcheck = $wpdb->get_var( "SELECT 'option_name' FROM ".theme_option_db_name." WHERE option_name='".$inputval."'" );

  if($dbcheck !== 'option_name'){
    //Doesn't exist
    $wpdb->insert(theme_option_db_name,array('option_name'=>$inputval));
    return true;
  }else{
    //Exist
    return false;
  }

  exit;
}
add_action('wp_ajax_add_allinone_section','add_allinone_section');

function add_allinone_option() {
  $formdata = $_POST['formdata'];
  global $wpdb;

  foreach($formdata as $data){
    $group = '';
   if(isset($data['parent'])){
     $group = $data['parent'];
     //unset($data['parent']);
   }

    $dbcheck = $wpdb->get_results( "SELECT * FROM ".theme_option_db_name." WHERE option_name='".$group."'" );

    if(count($dbcheck) > 0){
      //Group exist.
      $_data = $dbcheck;
      $_data[] = $formdata;

      print_r($_data);

      //$wpdb->query("UPDATE ".theme_option_db_name." SET option_value='".$_data."' WHERE option_name='".$group."'");
      break;
    }
  }
}
add_action('wp_ajax_add_allinone_option','add_allinone_option');



?>