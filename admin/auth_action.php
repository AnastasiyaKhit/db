<?php
	session_start();
	include("../config.php");
	function filter_data($var)
	{
			$var = mysql_real_escape_string($var);
			$var = htmlspecialchars($var);
			$var = trim($var);
			return $var;
	}


	$login=filter_data($_POST['login']);
	$pass=filter_data($_POST['pass']);
	
	if($login == ADMIN_LOGIN AND $pass=ADMIN_PASS)
	{
		$_SESSION['admin_login'] = $login;
		$_SESSION['admin_password'] = $pass;
		echo "<meta http-equiv='Refresh'; content='0; URL=../admin.php'>";
	}
?>