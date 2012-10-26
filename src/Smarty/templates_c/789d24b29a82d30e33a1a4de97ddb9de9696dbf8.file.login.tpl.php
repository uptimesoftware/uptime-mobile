<?php /* Smarty version Smarty-3.1.12, created on 2012-10-26 12:25:32
         compiled from ".\UI\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25063508ab97c010128-55093143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '789d24b29a82d30e33a1a4de97ddb9de9696dbf8' => 
    array (
      0 => '.\\UI\\login.tpl',
      1 => 1348261428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25063508ab97c010128-55093143',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'error' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_508ab97c15c9c7_52899081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508ab97c15c9c7_52899081')) {function content_508ab97c15c9c7_52899081($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<title>Login Page - up.time</title>

</head>
<body>
<center>

<p><img src="images/uptime_logo.png" alt="up.time"></p>
<form action="login.php" method="post">
<p>
<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

</p>
<table>
<tr>
	<td>User Name:</td>
	<td><input type="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" /></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name="password" /></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="2"><input type="submit" name="login" value="Login" /></td>
</tr>

</form>

</center>
</body></html>
<?php }} ?>