<?php /* Smarty version Smarty-3.1.12, created on 2012-10-26 11:59:54
         compiled from ".\UI\status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3836508ab37adcafe3-59364954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eda84e67adfcca1ead5a384de1d98117ebefc2c' => 
    array (
      0 => '.\\UI\\status.tpl',
      1 => 1348589841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3836508ab37adcafe3-59364954',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'monitors' => 0,
    'monitor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_508ab37af24aa6_42613248',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ab37af24aa6_42613248')) {function content_508ab37af24aa6_42613248($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Enterprise Outages - up.time"), 0);?>


<meta http-equiv="refresh" content="300">

<script type="text/javascript">
function MainMenuSubmit() {
	var menu_form = document.forms["mainMenu"];
	var menu_selected = menu_form.elements["menuOption"];
	if (menu_selected.value == 1) {			// summary page
		menu_form.action = "summary.php";
		menu_form.submit();
	}
	if (menu_selected.value == 2) {			// globalscan page
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

<?php if (count($_smarty_tpl->tpl_vars['monitors']->value)>0){?>
<table border="1">
	<?php  $_smarty_tpl->tpl_vars['monitor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['monitor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['monitors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['monitor']->key => $_smarty_tpl->tpl_vars['monitor']->value){
$_smarty_tpl->tpl_vars['monitor']->_loop = true;
?>
		<tr>
			<td class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
" style="text-align: left;">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['monitor']->value['elementId'];?>
" style="color:white">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['monitor']->value['name'];?>

					</div>
				</a>
			</td>
			<td class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['monitor']->value['elementId'];?>
" style="color:white">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['monitor']->value['status'];?>

					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
" style="text-align: left;">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['monitor']->value['elementId'];?>
" style="color:white">
					<div class="tdLink">
						Down for
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
					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="<?php echo strtolower($_smarty_tpl->tpl_vars['monitor']->value['status']);?>
" style="text-align: left;">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['monitor']->value['elementId'];?>
" style="color:white">
					<div class="tdLink">
						<?php if (strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='crit'||strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='warn'||strtolower($_smarty_tpl->tpl_vars['monitor']->value['status'])=='unknown'){?>
							<?php if (stristr($_smarty_tpl->tpl_vars['monitor']->value['message'],'The monitor status has been acknowledged.')){?>
								<img src="images/ack-check.gif" />
							<?php }else{ ?>
								<img src="images/ack-x.gif" />
							<?php }?>
						<?php }?>
						<?php echo $_smarty_tpl->tpl_vars['monitor']->value['message'];?>
&nbsp;
					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				&nbsp;
			</td>
		</tr>
	<?php } ?>
</table
<?php }?>

</body></html>
<?php }} ?>