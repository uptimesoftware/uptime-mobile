{include file='header.tpl' title="'{$element_status['name']}' Status - up.time"}

<meta http-equiv="refresh" content="60">

<script type="text/javascript">
function MainMenuSubmit() {
	var menu_form = document.forms["mainMenu"];
	var menu_selected = menu_form.elements["menuOption"];
	if (menu_selected.value == 1) {			// groups page
		menu_form.action = "groups.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 2) {		// summary page
		menu_form.action = "summary.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 3) {		// all outages page
		menu_form.action = "status.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 4) {		// logout
		menu_form.action = "logout.php";
		menu_form.submit();
	}
}
</script>

</head>
<body>

<div id="mainMenu" align="right">
	<form id="mainMenu" method="GET">
	<img src="images/uptime_logo.png" align="left"/>
	Menu:
	<select id="menuOption" name="mainMenu" onChange="MainMenuSubmit();">
		<option value="0">Element Status</option>
		<option value="1">GlobalScan</option>
		<option value="2">Summary</option>
		<option value="3">All Outages</option>
		<option value="4">Logout</option>
	</select>
	</form>
</div>

<table>
	<tr>
		<td>
			&lt;- <a href="javascript:history.go(-1)">Back</a>
		</td>
	</tr>
</table>

<div class="heading">{$element_status['name']}</div>

<table border="1" width="100%">
	<tr>
		<td>Host Status:</td>
		<td class="{$element_status['status']|lower}">{$element_status['status']}</td>
	</tr>
	<tr>
		<td>Type:</td>
		<td>{$element_info[0]['type']}</td>
	</tr>
	<tr>
		<td>Platform:</td>
		<td>{$element_info[0]['typeSubtypeName']}</td>
	</tr>
	<tr>
		<td>Operating System:</td>
		<td>{$element_info[0]['typeOs']}</td>
	</tr>
</table>

{if count($monitors) > 0}

	<div class="heading">Monitor Info</div>

	{foreach from=$monitors item=monitor}



	<table border="1">
		<tr>
			<td class="{$monitor['status']|lower}_left" colspan="2">
				{$monitor['name']}
			</td>
		</tr>
		<tr>
			<td class="{$monitor['status']|lower}_left">
				'{$monitor['status']|capitalize:true}' for:
				{if $monitor['statusDateDifference_d'] > 0}
					{$monitor['statusDateDifference_d']} Days
				{/if}
				{if $monitor['statusDateDifference_h'] > 0}
					{$monitor['statusDateDifference_h']} Hours
				{/if}
				{if $monitor['statusDateDifference_i'] > 0}
					{$monitor['statusDateDifference_i']} Minutes
				{/if}
				{$monitor['statusDateDifference_s']} Seconds
			</td>
			<td class="{$monitor['status']|lower}_left">
				'{$monitor['status']|capitalize:true}' since: {$monitor['lastTransitionTime']}
			</td>
		</tr>
		<tr>
			<td colspan="3">
				{if $monitor['status']|lower == 'crit' || $monitor['status']|lower == 'warn' || $monitor['status']|lower == 'unknown'}
					{if $monitor['isAcknowledged']}
						<img src="images/ack-check.gif" />
					{else}
						<a href="ack.php?m={$monitor['id']}"><img src="images/ack-x.gif" /></a>
					{/if}
				{/if}
				<span style="font-weight: bold;">Message:</span> {$monitor['message']|replace:"\n":"<br/>"}
				{if $monitor['status']|lower == 'crit' || $monitor['status']|lower == 'warn' || $monitor['status']|lower == 'unknown'}
					{if $monitor['isAcknowledged']}
						<br/><br/>
						<span style="font-weight: bold;">Acknowledged Message:</span><br/> {$monitor['acknowledgedComment']|replace:"\n":"<br/>"}
					{/if}
				{/if}
			</td>
		</tr>
	</table>
	<br/>

	{/foreach}
{else}
	<br/>
	No monitors currently running for this element.
{/if}

</body></html>
