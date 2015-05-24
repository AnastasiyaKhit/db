<?php
	include ("config.php");
    session_start();
    if($_SESSION['login'] AND $_SESSION['password'])
    {
        $login = $_SESSION['login'];
        $pass = $_SESSION['password'];
        $q_a = mysql_query("SELECT is_admin FROM users WHERE login='$login' AND  password='$pass' ",$db);
        $r_a = mysql_fetch_array($q_a);
        if($r_a['is_admin']==1)
        {
            $add_button = '<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Админ панель<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/add_news.php">Добавить новость</a>
                                </li>
                                <li>
                                    <a href="admin/edit_news.php">Редактировать новость</a>
                                </li>
                                <li>
                                    <a href="admin/delete_news.php">Удалить новость</a>
                                </li>
                            </ul>
                        </li>';
        } else $add_button = '';
        $type_page='';
?>

<?php
	include ("index.html");
?>

<?php 
    }
    else
    {
        $page=$_GET['page'];
        if($page=='login' OR $page=='' OR $page=='index')
        {
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Вход</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="container">
        <a href="?page=reg">Регистрация</a>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Вход</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="action/auth_action.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="login" type="textbox" placeholder="Логин" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Пароль">
                                </div>
                                <input name="submit"  class="btn btn-lg btn-success btn-block" type="submit" value="Войти" style="width: 211px;">
                                <!-- Change this to a button or input when using this as a form -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php
        }
        else if($page=='reg')
        {
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Регистрация</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="container">
        <a href="index.php">Вход</a>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Регистрация</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="action/action.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="name" type="name" placeholder="Имя" required autocomplete="off" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="second_name" type="textbox" placeholder="Фамилия" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="E-mail" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="login" type="textbox" placeholder="Логин" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Пароль" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="r_password" placeholder="Повторите пароль" required>
                                </div>
                                
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Зарегистрироваться" style="width: 211px;">
                                <!-- Change this to a button or input when using this as a form -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php
        }
    }
?>