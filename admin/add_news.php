<?php $content = ' <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="add_news_action.php" role="form" method="post">
                            <input  class="form-control title title_add" name="title" required placeholder="Заголовок статьи">
                            <div class="form-group">
                                <select name="type" class="form-control control_add">
                                    <option value="1">Технологии</option>
                                    <option value="2">Недвижимость</option>
                                    <option value="3">Люди</option>
                                </select>
                            </div>
                            <textarea rows="3" class="form-control short_add" name="summary" required placeholder="Короткое описание"></textarea>
                            <textarea rows="23" class="form-control article_add" name="full" required placeholder="Статья"></textarea>
                            <button type="submit" name="submit" class="btn btn-default">Добавить</button>

		              </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>'


?>
<?php include("../admin_panel.php"); ?>

