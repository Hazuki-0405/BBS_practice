<?php
    $database = new PDO('mysql:host=localhost;dbname=bbsdatabase;charset=UTF8;','root','');

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>掲示板作成の練習</title>
        <link rel="stylesheet" href="BBS_p/css/styles.css">
    </head>
    <body>
        <h1 class="header-ttl">掲示板</h1>
        <div class="container">
            <div class="posted-wrapper">
                <!--繰り返す部分-->
                <div class="posted-message">
                    <h2><?php  ?>タイトル</h2>
                    <p class="content"><?php  ?>コメント</p>
                </div>
                <!--繰り返す部分ここまで-->
            </div>
        <div class="post-wrapper">
            <form>
                <div class="post-input">
                    <label for="title">タイトル</label><input class="input-ttl" type="text" name="title"/>
                    <label for="content">コメント</label><textarea class="input-content" name="content"></textarea>
                </div>
                <input class="btn" type="submit" value="投稿" />
            </form>
        </div>
        </div>
    </body>
</html>