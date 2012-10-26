<?php
// Include the header file
require_once("header.php");
// Objects the header file creates:
// $smarty
// $uptime_api
//////////////////////////////////////////////////////////////////////////////////////////////

// set other variables
$error = "";
$message = "";

// check if logging in
$username = "";
$password = "";
if (isset($_REQUEST['login'])) {
	if (isset($_REQUEST['username'])) {
		$username = $_REQUEST['username'];
	}
	if (isset($_REQUEST['password'])) {
		$password = $_REQUEST['password'];
	}
	
	// Create API object
	$uptime_api->setCredentials($username, $password);
	
	// login
	if ($uptime_api->testAuth($error)) {	// Authorized
		// set cookie(s) and redirect to main groups page
		setcookie("upt_api_u", trim($username));
		setcookie("upt_api_p", $password);
		header("Location: groups.php");
	}
}

if (isset($_REQUEST['m'])) {	// message
	$message = $_REQUEST['m'];
}

// get up.time and API version info
$api_info = $uptime_api->getApiInfo($error);


////////////////////////////////////////////////////////////////////////////////////////////
// SMARTY: Assign variables
$smarty->assign( 'uptime_ver', $api_info['databaseVersion'] );
$smarty->assign( 'api_ver', $api_info['version'] );
$smarty->assign( 'error', $error );
$smarty->assign( 'message', $message );
$smarty->assign( 'username', $username );
// SMARTY: Display page
$smarty->display('login.tpl');
?>