<?php
require_once("header.php");
// verify if they're logged in, or kick them out
if ( ! isset($_COOKIE['upt_api_u']) ) {
	// redirect to login
	header('Location: login.php');
}


/////////////////////////////////
// Function to sort the monitors list
function sortMonitors($monitors) {
	$new_monitors_list = array();
	// First sort by status, then by length of time
	// Sort order: crit, warn, ok, maint, unknown
	$crit = array();
	$warn = array();
	$ok = array();
	$maint = array();
	$unknown = array();
	foreach ($monitors as $monitor) {
		$status = $monitor['status'];
		// strip out the monitors that are not monitored and are hidden
		if ($monitor['isMonitored'] && ! $monitor['isHidden']) {
			switch ( strtolower(trim($status)) ) {
				case 'ok':
					array_push($ok, $monitor);
				break;
				case 'crit':
					array_push($crit, $monitor);
				break;
				case 'warn':
					array_push($warn, $monitor);
				break;
				case 'maint':
					array_push($maint, $monitor);
				break;
				default:
					array_push($unknown, $monitor);
				break;
			}
		}
	}
	
	// now let's sort each status array by the newest outage (shortest "statusDifferenceInSeconds") to the top
	$crit = sortByOutageLengthInSeconds($crit);
	$warn = sortByOutageLengthInSeconds($warn);
	$ok = sortByOutageLengthInSeconds($ok);
	$maint = sortByOutageLengthInSeconds($maint);
	$unknown = sortByOutageLengthInSeconds($unknown);
//print_r($unknown);	
	// finally, let's build the new array with the proper sorting
	addToArray($new_monitors_list, $crit);
	addToArray($new_monitors_list, $warn);
	addToArray($new_monitors_list, $ok);
	addToArray($new_monitors_list, $maint);
	addToArray($new_monitors_list, $unknown);
	
//print_r($new_monitors_list);
	
	return $new_monitors_list;
}

function sortByOutageLengthInSeconds($arrMonitors) {
	// don't bother sorting if there's none or only one
	if (count($arrMonitors) > 1) {
		$oriArrMonitors = $arrMonitors;	// copy of the original array
		$newArrMonitors = array();	// new array of monitors
		$arrOutageSeconds = array();	// hold the IDs and the length of the outages ("statusDifferenceInSeconds")
		
		//for ($i = 0; $i < count($arrMonitors); $i++) {
		foreach ($arrMonitors as $monitor) {
			//$monitor = $arrMonitors[$i];
			$lowest_key = 0;
			$lowest_val = -1;
			$oriCount = count($arrMonitors);
			for ($x = 0; $x < $oriCount; $x++) {
				$mon = $arrMonitors[$x];
				if ($lowest_val < 0) {
					// first one, so let's just assign it as the lowest so far
					$lowest_key = $x;
					$lowest_val = $mon['statusDifferenceInSeconds'];
				}
				elseif ($mon['statusDifferenceInSeconds'] < $lowest_val) {
					$lowest_key = $x;
					$lowest_val = $mon['statusDifferenceInSeconds'];
				}
			}
			// add lowest line and delete from main array
			array_push($newArrMonitors, $arrMonitors[$lowest_key]);
			unset($arrMonitors[$lowest_key]);
			// resort the table keys
			$arrMonitors = array_merge($arrMonitors);
		}
		return $newArrMonitors;
	}
	else {
		// just return the same (untouched) array
		return $arrMonitors;
	}
}

function addToArray(&$arrPile, $arrMore) {
	// add more to the pile (arrays)
	$baseId = count($arrPile);
	if (count($arrMore) > 0) {
		foreach ($arrMore as $more) {
			$arrPile[$baseId] = $more;
			$baseId++;
		}
	}
}
/////////////////////////////////


// set/get current element group
$cur_group_id = 1;
if (isset($_REQUEST['e']) && intval($_REQUEST['e']) > 0) {
	$element_id = intval($_REQUEST['e']);
	// get element information
	$element = $uptime_api->getElementStatus($element_id);
	$element_info = $uptime_api->getElements("id={$element['id']}");;
	$monitors = $element['monitorStatus'];
}
else {
	// kick them back
	header('groups.php');
}

// calculate length of time in current state
foreach ($monitors as &$monitor) {
	$status_since_ts = strtotime($monitor['lastTransitionTime']);	// unix timestamp
	//$last_check_ts = strtotime($monitor['lastCheckTime']);
	
	$status_since = date_create($monitor['lastTransitionTime']);	// proper date variable
	//$last_check = date_create($monitor['lastCheckTime']);
	
	$now = new DateTime();
	$difference = date_diff($status_since, $now);
	// let's put the difference into the array object
	$monitor['statusDateDifference_y'] = $difference->y;	// years
	$monitor['statusDateDifference_m'] = $difference->m;	// months
	$monitor['statusDateDifference_d'] = $difference->d;	// days
	$monitor['statusDateDifference_h'] = $difference->h;	// hours
	$monitor['statusDateDifference_i'] = $difference->i;	// minutes
	$monitor['statusDateDifference_s'] = $difference->s;	// seconds
	
	$difference = 0;
	$difference = time() - $status_since_ts;
	$monitor['statusDifferenceInSeconds'] = $difference;
}

// Let's organize the monitors in a proper order instead of random on every refresh
$monitors = sortMonitors($monitors);

// clean up the element variables
unset($element['monitorStatus']);
unset($element_info[0]['monitors']);

//print_r($element);	// debug
//print_r($element_info);	// debug
//print_r($monitors);	// debug


////////////////////////////////////////////////////////////////////////////////////////////
// SMARTY: Assign variables
$smarty->assign( 'element_status', $element );
$smarty->assign( 'element_info', $element_info );
$smarty->assign( 'monitors', $monitors );
// SMARTY: Display page
$smarty->display('element.tpl');
?>
