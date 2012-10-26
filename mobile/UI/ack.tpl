{include file='header.tpl' title="Ack '{$monitor['name']}' - up.time"}

<script type="text/javascript">
function MainMenuSubmit() {
	var menu_form = document.forms["mainMenu"];
	var menu_selected = menu_form.elements["menuOption"];
	if (menu_selected.value == 1) {			// groups page
		menu_form.action = "groups.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 2) {			// summary page
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
		<option value="0">Ack Alert</option>
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


<h2>Acknowledge monitor status</h2>
<font color='red'>{$error}</font>
<table border="1px" width="100%">
<tr><td><b>Element:</b></td>
<td>{$elementName}</td></tr>
<tr>
	<td><b>Monitor:</b></td>
	<td class="{$monitor['status']|lower}">{$monitor['name']} ({$monitor['status']})</td>
</tr>
<tr>
	<td><b>'{$monitor['status']}' Since:</b></td>
	<td>{$monitor['lastTransitionTime']})</td>
</tr>
<tr>
	<td><b>Last Check:</b></td>
	<td>{$monitor['lastCheckTime']})</td>
</tr>
<tr><td><b>Message:</b></td>
<td>{$monitor['message']}</td></tr>
</table><br/>
<form method="get">
<input type='hidden' name='m' value="{$monitor['id']}">
Please enter the reason for acknowledging this outage:<br/>
<textarea style="width:95%;" rows="8" name="comment" id="comment">{$comment}</textarea><br/>
<input type="submit" name="submit" class="FormButton" value="Submit">
</form>

</body></html>
