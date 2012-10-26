<?php
require_once("header.php");
// verify if they're logged in, or kick them out
if ( ! isset($_COOKIE['upt_api_u']) ) {
	// redirect to login
	header('Location: login.php');
}

////////////////////////////////////////////////////////////////////////////
// Variables
$allMonitorStatus = array();


////////////////////////////////////////////////////////////////////////////
// Main code
$start = time();
$allMonitorStatus = $uptime_api->getAllMonitorStatus("status=(CRIT)|(WARN)|(MAINT)|(UNKNOWN)");
$end = time();
$diff = $end - $start;
//print "API calls took {$diff} seconds.\n";

////////////////////////////////////////////////////////////////////////////////////////////
// SMARTY: Assign variables
$smarty->assign( 'monitors', $allMonitorStatus );
// SMARTY: Display page
$smarty->display('status.tpl');
?>