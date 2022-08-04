<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>my_post</title>
</head>
<body>

<div class="container">
    <form action="../index.php" method="post">

        <br>

        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">Заголовок</span>
            </div>
            <input type="text" name="headline" class="form-control" aria-label="Large"
                   aria-describedby="inputGroup-sizing-sm">
            <div class="invalid-feedback">
                Заголовок должен быть больше 2 букв и меньше 50 букв
            </div>
        </div>

        <br>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Текст поста</span>
            </div>
            <textarea class="form-control" name="body" aria-label="With textarea"></textarea>
            <div class="invalid-feedback">
                Текст должен быть больше 10 букв и меньше 250 букв
            </div>
        </div>

        <br>

        <input type="hidden" name="action" value="post/create"/>

        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Отправить</button>
        </div>

</div>
</form>


</body>
</html>