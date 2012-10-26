<?php
require_once("header.php");
// verify if they're logged in, or kick them out
if ( ! isset($_COOKIE['upt_api_u']) ) {
	// redirect to login
	header('Location: login.php');
}

require('ack_api.php');

///////////////////////////////////////////////////////////////
// up.time username and password settings for the acknowledgement to function
$user = $uptime_api_username;
$pass = $uptime_api_password;
$hostname = $uptime_api_hostname;	// NOTE: hostname of where the up.time monitoring station is; if the up.time Controller is on some other system, enter the up.time hostname here.
$uptime_ack_api_port = 9996;
///////////////////////////////////////////////////////////////

if ( ! isset($_REQUEST['m']) || intval($_REQUEST['m']) <= 0 ) {
	die('Error: No monitor info received');
}

// get monitor ID passed in
$monitorId = intval($_REQUEST['m']);
// get the rest of the monitor info
$monitor = $uptime_api->getMonitorStatus($monitorId);
$element = $uptime_api->getElements("id={$monitor['elementId']}");

$host = $element[0]['hostname'];
$monitorName = $monitor['name'];
$monitorStatus = $monitor['status'];
$monitorMsg = $monitor['message'];
$comment = '';
$error = '';

// Try to ack the monitor
if (isset($_REQUEST['comment'])) {
	$comment = trim($_REQUEST['comment']);
	// urlencode variables
	$host_enc = urlencode($host);
	$monitorName_enc = urlencode($monitorName);
	$comment_enc = urlencode($comment);
	// Create url for acknowledging the alert
	$ack_uri = "/command?command=ackServiceMonitor&hostName={$host_enc}&serviceName={$monitorName_enc}&ackComment={$comment_enc}&username={$user}&password={$pass}";
	$ackurl = "http://{$hostname}:{$uptime_ack_api_port}{$ack_uri}";
	
	//print "URI: GET {$ack_uri}<br/><br/>\n\n";
	//print "Full URL: {$ackurl}<br/><br/>\n\n";
	
	$ack_rv = agentcmd($ackurl);
	//print "Returned: '{$ack_rv}'<br/><br/>\n\n";
	if ($ack_rv == '0') {
		$error = "Monitor '{$monitorName}' was acknowledged successfully.";
		// redirect back
		header("Location: element.php?e={$element[0]['id']}");
		//exit(0);
	}
	else {
		$error = "Error: Monitor '{$monitorName}' could not be acknowledged.<br/>\nMessage: '{$ack_rv}'";
	}
}

////////////////////////////////////////////////////////////////////////////////////////////
// SMARTY: Assign variables
$smarty->assign( 'monitor', $monitor );
$smarty->assign( 'elementName', $host );
$smarty->assign( 'comment', $comment );
$smarty->assign( 'error', $error );
// SMARTY: Display page
$smarty->display('ack.tpl');
?>
