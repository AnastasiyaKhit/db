<?php 
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    include("../config.php");

    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $s_name = $_POST['second_name'];

    if($password!=$r_password)
    {
        exit("Пароли должны совпадать");
    }

if(strlen($login)<3 or strlen($login) > 15)
{
    exit("Логин должен быть меньше 15 символов и больше 3-х");
}

if(strlen($name)<2 or strlen($name)> 15)
{
    exit("Имя должно быть меньше 15 символов и больше 2-х");
}

if(strlen($s_name)<3 or strlen($s_name)> 25)
{
    exit("Фамилия должна быть меньше 25 символов и больше 3-х");
}

if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i",$email))
{
    exit("Почта неверна");
}

$login = mysql_real_escape_string($login);
$name = mysql_real_escape_string($name);
$email = mysql_real_escape_string($email);
$s_name = mysql_real_escape_string($s_name);
$password = mysql_real_escape_string($password);

$login = htmlspecialchars($login); 
$name = htmlspecialchars($name); 
$email = htmlspecialchars($email); 
$s_name = htmlspecialchars($s_name); 
$password = htmlspecialchars($password); 

$login = trim($login);
$name = trim($name);
$email = trim($email);
$s_name = trim($s_name);
$password = trim($password);

$name = ucfirst($name);
$s_name = ucfirst($s_name);
$q = mysql_query("SELECT login FROM users WHERE login='$login'",$db) or die(mysql_error());
$r = mysql_fetch_array($q);
if(!empty($r['login']))
{
    exit("Такой логин уже есть");
}

$q2 = mysql_query("SELECT email FROM users WHERE email = '$email'",$db) or die(mysql_error());
$r2 = mysql_fetch_array($q2);
if(!empty($r2['email']))
{
    exit("Такой email уже есть");
}

$password = md5($password);
$password = strrev($password);

$password = $password."99h876e8911786243283253";
    
$date = time();
$save_user = mysql_query("INSERT INTO users (login , email, password, name, second_name,date) VALUES('$login' , '$email', '$password', '$name', '$s_name','$date' )",$db);

if($save_user == true)
{
    echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
}
else
{
  echo "Ошибка при регистрации";  
}
?>