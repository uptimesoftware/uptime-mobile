{include file='header.tpl' title="Enterprise Outages - up.time"}

<meta http-equiv="refresh" content="300">

<script type="text/javascript">
function MainMenuSubmit() {
	var menu_form = document.forms["mainMenu"];
	var menu_selected = menu_form.elements["menuOption"];
	if (menu_selected.value == 1) {			// summary page
		menu_form.action = "summary.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 2) {			// globalscan page
		menu_form.action = "groups.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 3) {	// logout
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
		<option value="0">All Outages</option>
		<option value="1">Summary</option>
		<option value="2">GlobalScan</option>
		<option value="3">Logout</option>
	</select>
	</form>
</div>


<h2>All Outages</h2>

{if count($monitors) > 0}
<table border="1">
	{foreach from=$monitors item=monitor}
		<tr>
			<td class="{$monitor['status']|lower}" style="text-align: left;">
				<a href="element.php?e={$monitor['elementId']}" style="color:white">
					<div class="tdLink">
						{$monitor['name']}
					</div>
				</a>
			</td>
			<td class="{$monitor['status']|lower}">
				<a href="element.php?e={$monitor['elementId']}" style="color:white">
					<div class="tdLink">
						{$monitor['status']}
					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="{$monitor['status']|lower}" style="text-align: left;">
				<a href="element.php?e={$monitor['elementId']}" style="color:white">
					<div class="tdLink">
						Down for
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
					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="{$monitor['status']|lower}" style="text-align: left;">
				<a href="element.php?e={$monitor['elementId']}" style="color:white">
					<div class="tdLink">
						{if $monitor['status']|lower == 'crit' || $monitor['status']|lower == 'warn' || $monitor['status']|lower == 'unknown'}
							{if $monitor['message']|stristr:'The monitor status has been acknowledged.'}
								<img src="images/ack-check.gif" />
							{else}
								<img src="images/ack-x.gif" />
							{/if}
						{/if}
						{$monitor['message']}&nbsp;
					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				&nbsp;
			</td>
		</tr>
	{/foreach}
</table
{/if}

</body></html>
