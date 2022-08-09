<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <form action="../index.php" method="post">
        <h2>Комментарий</h2>
        <br>
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">Логин</span>
            </div>
            <input type="text" name="login" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
        </div>
            <br>
        <div class="form-floating">
                <textarea class="form-control" name="text_area" placeholder="Напишите свой комментарий" id="floatingTextarea2" style="height: 100px"></textarea>
        </div>
        <br>

        <input type="hidden" name="action" value="user-comment"/>
        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Отправить</button>
        </div>
    </form>
</body>
</html>
