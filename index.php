<?php
    $database = new PDO('mysql:host=localhost;dbname=bbsdatabase;charset=UTF8;','root','');
    
    $sql = 'SELECT * FROM comments ORDER BY id ASC';
    $statement = $database->query($sql);
    $records = $statement->fetchAll();
    
    $post_title = $_POST['title'];
    $post_title = htmlspecialchars($post_title, ENT_QUOTES, 'UTF-8');
    $post_comment = $_POST['content'];
    $post_comment = htmlspecialchars($post_comment, ENT_QUOTES, 'UTF-8');
    
    
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
                
                <?php
                foreach($records as $record){
                    $id = $record['id'];
                    $title = $record['title'];
                    $comment = $record['comment'];
                    
                    echo 
                    "<div class=\"posted-message\">
                        <h2>$id. $title</h2>
                    <p class=\"content\">$comment</p>
                    </div>";
                }
                
                
                ?>
            </div>
        <div class="post-wrapper">
            <form method="post">
                <div class="post-input">
                    <label for="title">タイトル</label><input class="input-ttl" type="text" name="title"/>
                    <label for="content">コメント</label><textarea class="input-content" name="content"></textarea>
                </div>
                <input class="btn" type="submit" value="投稿" />
            </form>
            <?php
            if($post_title && $post_comment){
                $post_sql = 'insert into comments (title, comment) values (:title, :comment)';
                $statement = $database->prepare($post_sql);
                $statement->bindParam(':title', $post_title);
                $statement->bindParam(':comment', $post_comment);
                $statement->execute();
            } elseif(empty($post_title) && empty($post_comment)){
                echo '';
            } elseif(!$post_title || !$post_comment) {
                echo "<p class=\"notice\">タイトルとコメントを入力してください</p>";
            }
            ?>
        </div>
        </div>
    </body>
</html>