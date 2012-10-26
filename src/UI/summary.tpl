{include file='header.tpl' title="Summary - up.time"}

<meta http-equiv="refresh" content="60">

<script type="text/javascript">
function MainMenuSubmit() {
	var menu_form = document.forms["mainMenu"];
	var menu_selected = menu_form.elements["menuOption"];
	if (menu_selected.value == 1) {			// groups page
		menu_form.action = "groups.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 2) {		// all outages page
		menu_form.action = "status.php";
		menu_form.submit();
	}
	else if (menu_selected.value == 3) {		// logout
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
		<option value="0">Summary</option>
		<option value="1">GlobalScan</option>
		<option value="2">All Outages</option>
		<option value="3">Logout</option>
	</select>
	</form>
</div>

<center>
<h2>Summary</h2>
<img src='gen_pie_chart.php?d={$total_m},{$total_u},{$total_o},{$total_w},{$total_c}&l=Maint|Unknown|Ok|Warn|Crit&size=175'>

<table border="1" width="100%">
<tr>
	<th colspan="2">Outages</th>
</tr>
<tr>
	<td class="crit">Crit</td>
	<td class="crit">{$total_c}</td>
</tr>
<tr>
	<td class="warn">Warn</td>
	<td class="warn">{$total_w}</td>
</tr>
<tr>
	<td class="ok">OK</td>
	<td class="ok">{$total_o}</td>
</tr>
<tr>
	<td class="maint">Maint</td>
	<td class="maint">{$total_m}</td>
</tr>
<tr>
	<td class="unknown">Unknown</td>
	<td class="unknown">{$total_u}</td>
</tr>
</table>

</center>
</body></html>
