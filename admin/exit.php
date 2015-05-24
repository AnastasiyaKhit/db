<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	echo "<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>";
?>