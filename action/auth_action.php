<?php 
    session_start();
    include("../config.php");

    $password = $_POST['password'];
    $login = $_POST['login'];


    $login = trim($login);
    $password = trim($password);

    $password = md5($password);
    $password = strrev($password);
    $password = $password."99h876e8911786243283253";

    $result_user = mysql_query("SELECT * FROM users WHERE login ='$login' AND password = '$password'",$db);
    $r_user_panel = mysql_fetch_array($result_user);

    if(empty($r_user_panel['id']))
    {
        exit("error");
    }

    else
    {
        $_SESSION['password'] = $r_user_panel['password'];
        $_SESSION['login'] = $r_user_panel['login'];
        $_SESSION['id'] = $r_user_panel['id'];
    }
    echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";

?>