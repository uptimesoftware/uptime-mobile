<?php
require_once("header.php");
// verify if they're logged in, or kick them out
if ( ! isset($_COOKIE['upt_api_u']) ) {
	// redirect to login
	header('Location: login.php');
}

// set/get current element group
$cur_group_id = 1;
if (isset($_REQUEST['sg'])) {
	$cur_group_id = intval($_REQUEST['sg']);
}

// get group information
$cur_group = $uptime_api->getGroups("id={$cur_group_id}");

//print_r($cur_group);	// debug


// get the group name (Ex. "My Infrastructure") and a few other variables
$cur_group_name = $cur_group[0]['name'];
$prev_group_id = intval($cur_group[0]['groupId']);
$prev_group_name = "";
// get the previous group name (if exists)
if ($prev_group_id > 0) {
	$prev_group = $uptime_api->getGroups("id={$prev_group_id}");
	$prev_group_name = $prev_group[0]['name'];
}

// get the list of sub-groups
$sub_groups = $uptime_api->getGroups("groupId={$cur_group_id}");

// get the list of elements in the current group
$elements = $cur_group[0]['elements'];
// add status information for each element
//foreach ($elements as &$element) {
for ($i = 0; $i < count($elements); ++$i) {
	$element = &$elements[$i];
	// first, determine if the element isMonitored, and if not, delete and skip
	if ($element['isMonitored'] == 1) {
		// get status information
		$error = "";
		$attempts = 1;
		$element_status = "";
		// in case we get some error connecting, let's try a few times before we give up
		/* to test the SSL issue
		$element_status = $uptime_api->getElementStatus($element['id'], "", $error);
		if (strlen($error) > 0) {
			print "Error: {$error}";
			print_r($element_status);
		}*/
		while ($attempts <= 3 && strlen($element_status) == 0) {
			$element_status = $uptime_api->getElementStatus($element['id'], $error);
			// detect error(s)
			if (strlen($error) == 0) {
				// all good, so we don't need to try again
				break 1;
			}
			$attempts++;
		}
		// get total statuses
		$total_monitors = 0;
		$total_ok = 0;
		$total_crit = 0;
		$total_warn = 0;
		$total_maint = 0;
		$total_unknown = 0;

		foreach ($element_status['monitorStatus'] as $status) {
			if ($status['isMonitored'] && ! $status['isHidden']) {	// get just the monitors that are being monitored AND are not hidden
				switch ( strtolower($status['status']) ) {
					case 'ok':
						$total_ok++;
					break;
					case 'crit':
						$total_crit++;
					break;
					case 'warn':
						$total_warn++;
					break;
					case 'maint':
						$total_maint++;
					break;
					default:
						$total_unknown++;
					break;
				}
				$total_monitors++;
			}
		}
		
		// add the totals to the array
		$element['total_ok'] = $total_ok;
		$element['total_warn'] = $total_warn;
		$element['total_crit'] = $total_crit;
		$element['total_maint'] = $total_maint;
		$element['total_unknown'] = $total_unknown;
		$element['total_monitors'] = $total_monitors;
		// add the element name/display_name as well
		$e = $uptime_api->getElements("id={$element['id']}");
		$element['hostname'] = $e[0]['hostname'];
		$element['status'] = $element_status['status'];
		
		
		// merge the two arrays together
		//$element = array_merge($element, $status);
		// add the merged array to the new list of elements
		//array_push($new_elements, $element);
	}
	else {
		// delete and skip element
		unset($elements[$i]);
		$elements = array_merge($elements);
		// lower the counter by one since we just deleted and re-organized the array
		$i--;
	}
}

////////////////////////////////////////////////////////////////////////////////////////////
// SMARTY: Assign variables
$smarty->assign( 'cur_group_id', $cur_group_id );		// current group id
$smarty->assign( 'cur_group_name', $cur_group_name );	// current group name
$smarty->assign( 'sub_groups', $sub_groups );			// array of sub groups of current group
$smarty->assign( 'prev_group_id', $prev_group_id );		// previous group id
$smarty->assign( 'prev_group_name', $prev_group_name );	// previous group name
$smarty->assign( 'elements', $elements );
// SMARTY: Display page
$smarty->display('groups.tpl');
?>