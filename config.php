<?php 
	$db = mysql_connect("localhost","root","");
	mysql_select_db("tutorial", $db);
	
	define("ADMIN_LOGIN","admin");
	define("ADMIN_PASS","admin");
?>