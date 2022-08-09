<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Последние посты</title>
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4>Последние посты</h4>
            <?php
            foreach ($posts as $post) { ?>
                <li>
                    <!-- "Верстка" здесь очень грубая, по факту она отсутствует. Если хочется сделать нормально, можно сделать нормально) -->
                    <br>
                    <b>Логин:</b>
                    <?= $post ['login'] ?>
                    <br>
                    <b>Заголовок:</b>
                    <?= $post ['headline'] ?>
                    <br>
                    <b>Пост:</b>
                    <?= $post ['body'] ?>
                    <br>
                    <a href="http://expert-broccoli/user-comment.php">Комментировать</a>
                </li>
            <?php } ?>
            <ol class="timeline">
            </ol>
        </div>
    </div>
</div>
</body>
</html>