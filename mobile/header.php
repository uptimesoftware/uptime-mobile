<?php

//////////////////////////////////////////////////
// SMARTY
$smarty_dir = "Smarty/";
define('SMARTY_DIR', $smarty_dir . '/libs/');
ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . $smarty_dir . '/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = './UI/';
$smarty->compile_dir  = $smarty_dir . 'templates_c/';
$smarty->config_dir   = $smarty_dir . 'configs/';
$smarty->cache_dir    = $smarty_dir . 'cache/';
//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//////////////////////////////////////////////////

// require the uptimeApi
require_once("uptimeApi.php");

// Setup uptime API variables
$uptime_api_username = "";				// username will be set later
$uptime_api_password = "";				// password will be set later
$uptime_api_hostname = "localhost";		// up.time Controller hostname (usually localhost, but not always)
$uptime_api_port = 9997;
$uptime_api_version = "v1";
$uptime_api_ssl = true;

// retrieve values from cookies (if they're already set)
if (isset($_COOKIE['upt_api_u'])) {
	$uptime_api_username = $_COOKIE['upt_api_u'];
}
if (isset($_COOKIE['upt_api_p'])) {
	$uptime_api_password = $_COOKIE['upt_api_p'];
}

// Create API object
$uptime_api = new uptimeApi($uptime_api_username, $uptime_api_password, $uptime_api_hostname, $uptime_api_port, $uptime_api_version, $uptime_api_ssl);
?>