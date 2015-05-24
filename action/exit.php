<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	unset($_SESSION['id']);
	echo "<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>";
?>