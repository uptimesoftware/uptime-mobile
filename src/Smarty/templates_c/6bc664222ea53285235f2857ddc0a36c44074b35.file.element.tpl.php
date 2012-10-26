<?php /* Smarty version Smarty-3.1.12, created on 2012-10-26 12:04:25
         compiled from ".\UI\element.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20491508ab394e81246-59698158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bc664222ea53285235f2857ddc0a36c44074b35' => 
    array (
      0 => '.\\UI\\element.tpl',
      1 => 1351267462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20491508ab394e81246-59698158',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_508ab3950a10b2_93496210',
  'variables' => 
  array (
    'element_status' => 0,
    'element_info' => 0,
    'monitors' => 0,
    'monitor' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ab3950a10b2_93496210')) {function content_508ab3950a10b2_93496210($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'Smarty//libs/plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_replace')) include 'Smarty//libs/plugins\\modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"'".((string)$_smarty_tpl->tpl_vars['element_status']->value['name'])."' Status - up.time"), 0);?>


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

<div class="heading"><?php echo $_smarty_tpl->tpl_vars['element_status']->value['name'];?>
</div>

<table border="1" width="100%">
	<tr>
		<td>Host Status:</td>
		<td class="<?php echo strtolower($_smarty_tpl->tpl_vars['element_status']->value['status']);?>
"><?php echo $_smarty_tpl->tpl_vars['element_status']->value['status'];?>
</td>
	</tr>
	<tr>
		<td>Type:</td>
		<td><?php echo $_smarty_tpl->tpl_vars['element_info']->value[0]['type'];?>
</td>
	</tr>
	<tr>
		<td>Platform:</td>
		<td><?php echo $_smarty_tpl->tpl_vars['element_info']->value[0]['typeSubtypeName'];?>
</td>
	</tr>
	<tr>
		<td>Operating System:</td>
		<td><?php echo $_smarty_tpl->tpl_vars['element_info']->value[0]['typeOs'];?>
</td>
	</tr>
</table>

<?php if (count($_smarty_tpl->tpl_vars['monitors']->value)>0){?>

	<div class="heading">Monitor Info</div>

	<?php  $_smarty_tpl->tpl_vars['monitor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['monitor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['monitors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['monitor']->key => $_smarty_tpl->tpl_vars['monitor']->value){
$_smarty_tpl->tpl_vars['monitor']->_loop = true;
?>



	<table border="1">
		<tr>
			<td class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
_left" colspan="2">
				<?php echo $_smarty_tpl->tpl_vars['monitor']->value['name'];?>

			</td>
		</tr>
		<tr>
			<td class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
_left">
				'<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['monitor']->value['status'],true);?>
' for:
				<?php if ($_smarty_tpl->tpl_vars['monitor']->value['statusDateDifference_d']>0){?>
					<?php echo $_smarty_tpl->tpl_vars['monitor']->value['statusDateDifference_d'];?>
 Days
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['monitor']->value['statusDateDifference_h']>0){?>
					<?php echo $_smarty_tpl->tpl_vars['monitor']->value['statusDateDifference_h'];?>
 Hours
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['monitor']->value['statusDateDifference_i']>0){?>
					<?php echo $_smarty_tpl->tpl_vars['monitor']->value['statusDateDifference_i'];?>
 Minutes
				<?php }?>
				<?php echo $_smarty_tpl->tpl_vars['monitor']->value['statusDateDifference_s'];?>
 Seconds
			</td>
			<td class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
_left">
				'<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['monitor']->value['status'],true);?>
' since: <?php echo $_smarty_tpl->tpl_vars['monitor']->value['lastTransitionTime'];?>

			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php if (strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='crit'||strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='warn'||strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='unknown'){?>
					<?php if ($_smarty_tpl->tpl_vars['monitor']->value['isAcknowledged']){?>
						<img src="images/ack-check.gif" />
					<?php }else{ ?>
						<a href="ack.php?m=<?php echo $_smarty_tpl->tpl_vars['monitor']->value['id'];?>
"><img src="images/ack-x.gif" /></a>
					<?php }?>
				<?php }?>
				<span style="font-weight: bold;">Message:</span> <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['monitor']->value['message'],"\n","<br/>");?>

				<?php if (strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='crit'||strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='warn'||strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='unknown'){?>
					<?php if ($_smarty_tpl->tpl_vars['monitor']->value['isAcknowledged']){?>
						<br/><br/>
						<span style="font-weight: bold;">Acknowledged Message:</span><br/> <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['monitor']->value['acknowledgedComment'],"\n","<br/>");?>

					<?php }?>
				<?php }?>
			</td>
		</tr>
	</table>
	<br/>

	<?php } ?>
<?php }else{ ?>
	<br/>
	No monitors currently running for this element.
<?php }?>

</body></html>
<?php }} ?>