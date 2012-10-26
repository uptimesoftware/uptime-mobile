<?php
require_once("header.php");
// log the user out
if ( isset($_COOKIE['upt_api_u']) ) {
	// delete cookies
	setcookie ("upt_api_u", "", time() - 3600);
	setcookie ("upt_api_p", "", time() - 3600);
}
// ... and redirect to login
header('Location: login.php');
?>