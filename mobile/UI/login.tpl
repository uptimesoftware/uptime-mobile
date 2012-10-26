{include file='header.tpl'}

<title>Login Page - up.time</title>

</head>
<body>
<center>

<p><img src="images/uptime_logo.png" alt="up.time"></p>
<form action="login.php" method="post">
<p>
{$message}
{$error}
</p>
<table>
<tr>
	<td>User Name:</td>
	<td><input type="username" name="username" value="{$username}" /></td>
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
