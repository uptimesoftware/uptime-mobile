{include file='header.tpl' title="Enterprise Status - up.time"}

<meta http-equiv="refresh" content="60">

<script type="text/javascript">
function MainMenuSubmit() {
	var menu_form = document.forms["mainMenu"];
	var menu_selected = menu_form.elements["menuOption"];
	if (menu_selected.value == 1) {				// summary page
		menu_form.action = "summary.php";
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
	<img src="images/uptime_logo.png" align="left" border="0px"/>
	Menu:
	<select id="menuOption" name="mainMenu" onChange="MainMenuSubmit();">
		<option value="0">GlobalScan</option>
		<option value="1">Summary</option>
		<option value="2">All Outages</option>
		<option value="3">Logout</option>
	</select>
	</form>
</div>

<form method="GET">
<p>
{if strlen($prev_group_name) > 0}
	<a href="?sg={$prev_group_id}">{$prev_group_name}</a> -&gt; 
{/if}
{$cur_group_name}
{if count($sub_groups) > 0}
<br/>
Groups:
<select name="sg" onChange="form.submit();">
	<option value="{$cur_group_id}"></option>
{foreach from=$sub_groups item=sub_group}
	<option value="{$sub_group['id']}">{$sub_group['name']}</option>
{/foreach}
</select>
<input type="submit" value="Go"/>
{/if}
</p>
</form>

{if count($elements) > 0}
	<table border="1" cellspacing="0" cellpadding="0">
		<tr>
			<th>Elements</th>
		</tr>
	</table>

	{foreach from=$elements item=element}
		{assign var="cols" value="0"}
		{if ($element['total_ok'])}
			{assign var="cols" value="`$cols+1`"}
		{/if}
		{if ($element['total_warn'])}
			{assign var="cols" value="`$cols+1`"}
		{/if}
		{if ($element['total_crit'])}
			{assign var="cols" value="`$cols+1`"}
		{/if}
		{if ($element['total_maint'])}
			{assign var="cols" value="`$cols+1`"}
		{/if}
		{if ($element['total_unknown'])}
			{assign var="cols" value="`$cols+1`"}
		{/if}
		{if ($cols == 0)}
			{assign var="cols" value="1"}
		{/if}
	<table border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="5" class="{$element['status']|lower}">
				<a href="element.php?e={$element['id']}" style="color:white">
					<div class="tdLink">
						{$element['name']} ({$element['hostname']})
					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td class="ok" width="20%">
				<a href="element.php?e={$element['id']}" style="color:white">
					<div class="tdLink">
						{$element['total_ok']}
					</div>
				</a>
			</td>
			{if $element['total_warn'] > 0}
			<td class="warn" width="20%">
				<a href="element.php?e={$element['id']}" style="color:black">
					<div class="tdLink">
						{$element['total_warn']}
					</div>
				</a>
			</td>
			{/if}
			{if $element['total_crit'] > 0}
			<td class="crit" width="20%">
				<a href="element.php?e={$element['id']}" style="color:white">
					<div class="tdLink">
						{$element['total_crit']}
					</div>
				</a>
			</td>
			{/if}
			{if $element['total_maint'] > 0}
			<td class="maint" width="20%">
				<a href="element.php?e={$element['id']}" style="color:white">
					<div class="tdLink">
						{$element['total_maint']}
					</div>
				</a>
			</td>
			{/if}
			{if $element['total_unknown'] > 0}
			<td class="unknown" width="20%">
				<a href="element.php?e={$element['id']}" style="color:black">
					<div class="tdLink">
						{$element['total_unknown']}
					</div>
				</a>
			</td>
			{/if}
		</tr>
	</table>
	<br/>
	{/foreach}
{else}
	No systems.
{/if}
</body></html>
