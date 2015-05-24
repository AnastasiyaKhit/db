<?php 
	include("../config.php");
	$id = $_GET['id'];
	if(is_numeric($id)){
		$q = mysql_query("DELETE FROM articles WHERE id='$id'",$db);
		if($q==true){
			echo "<meta http-equiv='Refresh'; content='0; URL=../index.php'>";
		}
		else {
			echo mysql_error();
		}
	}
?>