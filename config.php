<?php
/*
* Admin Theme Controller
* Made by Muhammad Bilal
* 6/7/2015
*/
global $wpdb;
$prefix = $wpdb->prefix;
$tablename = $prefix . "allinone_options";
define( 'theme_option_db_name', $tablename );
//Activation
function initialize_db() {
	global $wpdb;
	$dbcheck = $wpdb->get_var( "SHOW TABLES LIKE '".theme_option_db_name."'" );

	if ( $dbcheck != theme_option_db_name ) {
		//Create theme option db.
		$sql = "CREATE TABLE ".theme_option_db_name." (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,	option_name VARCHAR(100), option_value LONGTEXT)";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}

////Uninstall Plugin
function uninstall_db(){
	global $wpdb, $tablename;
	$sql = "DROP TABLE IF EXISTS `$tablename`";
	return $wpdb->query($sql);
}

////Uninstall Plugin
function flush_db(){
	global $wpdb, $tablename;
	$sql = "TRUNCATE TABLE `$tablename`";
	return $wpdb->query($sql);
}

function query_all(){
	global $wpdb, $tablename;
	$sql = "SELECT id FROM `$tablename`";
	return $wpdb->query($sql);
}

?>