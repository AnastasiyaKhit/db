<?php
	include ("../config.php");
    session_start();
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
                                    <a href="add_news.php">Добавить новость</a>
                                </li>
                                <li>
                                    <a href="edit_news.php">Редактировать новость</a>
                                </li>
                                <li>
                                    <a href="delete_news.php">Удалить новость</a>
                                </li>
                            </ul>
                        </li>';
    } else $add_button = '';
?>

<?php

	$id = intval($_GET['id']);
	$q = mysql_query("SELECT * FROM articles WHERE id='$id'"); 
	$res = mysql_fetch_array($q);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Новостной портал</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->


    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">News v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="exit.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                        </li>
                        <li>
                            <a href="../type1.php"><i class="fa fa-laptop"></i> Технологии</a>
                        </li>
                        <li>
                            <a href="../type2.php"><i class="fa  fa-bank"></i> Недвижимость</a>
                        </li>
                        <li>
                            <a href="../type3.php"><i class="fa fa-user"></i> Люди</a>
                        </li>
                        <?php echo $add_button; ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

                <div id="page-wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="edit_news_action_update.php" role="form" method="post">
                                                    <input type="hidden" value="<?php echo $id;?>" name="id">
                                            <input  class="form-control title title_add" value="<?php echo $res['title'];?>" name="title" required placeholder="Заголовок статьи">
                                            <div class="form-group">
                                                <select name="type" class="form-control control_add">
                                                    <option value="1" <?php if($res['type']==1) echo "selected"; ?>>Технологии</option>
                                                    <option value="2" <?php if($res['type']==2) echo "selected"; ?>>Недвижимость</option>
                                                    <option value="3" <?php if($res['type']==3) echo "selected"; ?>>Люди</option>
                                                </select>
                                            </div>
                                            <textarea rows="3" class="form-control short_add" name="summary" required placeholder="Короткое описание"><?php echo $res['summary'];?></textarea>
                                            <textarea rows="23" class="form-control article_add" name="full" required placeholder="Статья"><?php echo $res['full'];?></textarea>
                                            <button type="submit" name="submit" class="btn btn-default">Сохранить</button>

                                      </form>
                                    </div>
                                    <!-- /.col-lg-12 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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



