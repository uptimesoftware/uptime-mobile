<?php /* Smarty version Smarty-3.1.12, created on 2012-10-26 12:00:00
         compiled from ".\UI\groups.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21466508ab3809f3935-56387603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9673201f2d0f8540a5cccd296a4ace58e6f497ce' => 
    array (
      0 => '.\\UI\\groups.tpl',
      1 => 1348598195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21466508ab3809f3935-56387603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prev_group_name' => 0,
    'prev_group_id' => 0,
    'cur_group_name' => 0,
    'sub_groups' => 0,
    'cur_group_id' => 0,
    'sub_group' => 0,
    'elements' => 0,
    'element' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_508ab380c6da71_13252733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ab380c6da71_13252733')) {function content_508ab380c6da71_13252733($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Enterprise Status - up.time"), 0);?>


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
	<img src="images/uptime_logo.png" align="left"/>
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
<?php if (strlen($_smarty_tpl->tpl_vars['prev_group_name']->value)>0){?>
	<a href="?sg=<?php echo $_smarty_tpl->tpl_vars['prev_group_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['prev_group_name']->value;?>
</a> -&gt; 
<?php }?>
<?php echo $_smarty_tpl->tpl_vars['cur_group_name']->value;?>

<?php if (count($_smarty_tpl->tpl_vars['sub_groups']->value)>0){?>
-&gt;
<select name="sg" onChange="form.submit();">
	<option value="<?php echo $_smarty_tpl->tpl_vars['cur_group_id']->value;?>
"></option>
<?php  $_smarty_tpl->tpl_vars['sub_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub_group']->key => $_smarty_tpl->tpl_vars['sub_group']->value){
$_smarty_tpl->tpl_vars['sub_group']->_loop = true;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['sub_group']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sub_group']->value['name'];?>
</option>
<?php } ?>
</select>
<input type="submit" value="Go"/>
<?php }?>
</p>
</form>

<?php if (count($_smarty_tpl->tpl_vars['elements']->value)>0){?>
	<table border="1" cellspacing="0" cellpadding="0">
		<tr>
			<th>Elements</th>
		</tr>
	</table>

	<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
	<table border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="5" class="<?php echo strtolower($_smarty_tpl->tpl_vars['element']->value['status']);?>
">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" style="color:white">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['element']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['element']->value['hostname'];?>
)
					</div>
				</a>
			</td>
		</tr>
		<tr>
			<td class="crit" width="20%">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" style="color:white">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['element']->value['total_crit'];?>

					</div>
				</a>
			</td>
			<td class="warn" width="20%">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" style="color:black">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['element']->value['total_warn'];?>

					</div>
				</a>
			</td>
			<td class="ok" width="20%">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" style="color:white">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['element']->value['total_ok'];?>

					</div>
				</a>
			</td>
			<td class="maint" width="20%">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" style="color:white">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['element']->value['total_maint'];?>

					</div>
				</a>
			</td>
			<td class="unknown" width="20%">
				<a href="element.php?e=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" style="color:black">
					<div class="tdLink">
						<?php echo $_smarty_tpl->tpl_vars['element']->value['total_unknown'];?>

					</div>
				</a>
			</td>
		</tr>
	</table>
	<br/>
	<?php } ?>
<?php }else{ ?>
	No systems.
<?php }?>
</body></html>
<?php }} ?>