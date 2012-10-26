<?php
require_once("header.php");
// verify if they're logged in, or kick them out
if ( ! isset($_COOKIE['upt_api_u']) ) {
	// redirect to login
	header('Location: login.php');
}

// get all monitor statuses
$allMonitorStatus = $uptime_api->getAllMonitorStatus();
// count how many of each there are
$c = array();
$w = array();
$o = array();
$m = array();
$u = array();
foreach ($allMonitorStatus as $monitor) {
	if ($monitor['isMonitored'] && ! $monitor['isHidden']) {
		$status = $monitor['status'];
		switch ( strtolower(trim($status)) ) {
			case 'ok':
				array_push($o, $monitor);
			break;
			case 'crit':
				array_push($c, $monitor);
			break;
			case 'warn':
				array_push($w, $monitor);
			break;
			case 'maint':
				array_push($m, $monitor);
			break;
			default:
				array_push($u, $monitor);
			break;
		}
	}
}

//print_r($allMonitorStatus);

////////////////////////////////////////////////////////////////////////////////////////////
// SMARTY: Assign variables
$smarty->assign( 'total_o', count($o) );
$smarty->assign( 'total_c', count($c) );
$smarty->assign( 'total_w', count($w) );
$smarty->assign( 'total_m', count($m) );
$smarty->assign( 'total_u', count($u) );
//$smarty->assign( 'dsgag', $element );
// SMARTY: Display page
$smarty->display('summary.tpl');
?>
