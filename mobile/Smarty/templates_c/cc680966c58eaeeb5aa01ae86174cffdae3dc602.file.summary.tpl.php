<?php /* Smarty version Smarty-3.1.12, created on 2012-10-26 12:25:19
         compiled from ".\UI\summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21414508ab96f18e402-92529508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc680966c58eaeeb5aa01ae86174cffdae3dc602' => 
    array (
      0 => '.\\UI\\summary.tpl',
      1 => 1349883487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21414508ab96f18e402-92529508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total_m' => 0,
    'total_u' => 0,
    'total_o' => 0,
    'total_w' => 0,
    'total_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_508ab96f2291f8_27292329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ab96f2291f8_27292329')) {function content_508ab96f2291f8_27292329($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Summary - up.time"), 0);?>


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
<img src='gen_pie_chart.php?d=<?php echo $_smarty_tpl->tpl_vars['total_m']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['total_u']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['total_o']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['total_w']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['total_c']->value;?>
&l=Maint|Unknown|Ok|Warn|Crit&size=175'>

<table border="1" width="100%">
<tr>
	<th colspan="2">Outages</th>
</tr>
<tr>
	<td class="crit">Crit</td>
	<td class="crit"><?php echo $_smarty_tpl->tpl_vars['total_c']->value;?>
</td>
</tr>
<tr>
	<td class="warn">Warn</td>
	<td class="warn"><?php echo $_smarty_tpl->tpl_vars['total_w']->value;?>
</td>
</tr>
<tr>
	<td class="ok">OK</td>
	<td class="ok"><?php echo $_smarty_tpl->tpl_vars['total_o']->value;?>
</td>
</tr>
<tr>
	<td class="maint">Maint</td>
	<td class="maint"><?php echo $_smarty_tpl->tpl_vars['total_m']->value;?>
</td>
</tr>
<tr>
	<td class="unknown">Unknown</td>
	<td class="unknown"><?php echo $_smarty_tpl->tpl_vars['total_u']->value;?>
</td>
</tr>
</table>

</center>
</body></html>
<?php }} ?>