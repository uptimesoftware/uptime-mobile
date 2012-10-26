<?php /* Smarty version Smarty-3.1.12, created on 2012-10-26 12:24:56
         compiled from ".\UI\ack.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7912508ab39d969d91-22865431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '086bc5c4525917e724eaff953d7012e787d0167e' => 
    array (
      0 => '.\\UI\\ack.tpl',
      1 => 1351268692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7912508ab39d969d91-22865431',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_508ab39da05f57_58566076',
  'variables' => 
  array (
    'monitor' => 0,
    'error' => 0,
    'elementName' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ab39da05f57_58566076')) {function content_508ab39da05f57_58566076($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Ack '".((string)$_smarty_tpl->tpl_vars['monitor']->value['name'])."' - up.time"), 0);?>


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
<font color='red'><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</font>
<table border="1px" width="100%">
<tr><td><b>Element:</b></td>
<td><?php echo $_smarty_tpl->tpl_vars['elementName']->value;?>
</td></tr>
<tr>
	<td><b>Monitor:</b></td>
	<td class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
"><?php echo $_smarty_tpl->tpl_vars['monitor']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['monitor']->value['status'];?>
)</td>
</tr>
<tr>
	<td><b>'<?php echo $_smarty_tpl->tpl_vars['monitor']->value['status'];?>
' Since:</b></td>
	<td><?php echo $_smarty_tpl->tpl_vars['monitor']->value['lastTransitionTime'];?>
)</td>
</tr>
<tr>
	<td><b>Last Check:</b></td>
	<td><?php echo $_smarty_tpl->tpl_vars['monitor']->value['lastCheckTime'];?>
)</td>
</tr>
<tr><td><b>Message:</b></td>
<td><?php echo $_smarty_tpl->tpl_vars['monitor']->value['message'];?>
</td></tr>
</table><br/>
<form method="get">
<input type='hidden' name='m' value="<?php echo $_smarty_tpl->tpl_vars['monitor']->value['id'];?>
">
Please enter the reason for acknowledging this outage:<br/>
<textarea style="width:95%;" rows="8" name="comment" id="comment"><?php echo $_smarty_tpl->tpl_vars['comment']->value;?>
</textarea><br/>
<input type="submit" name="submit" class="FormButton" value="Submit">
</form>

</body></html>
<?php }} ?>