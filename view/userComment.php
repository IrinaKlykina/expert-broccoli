<!DOCTYPE html>
<html>
<body>
<h3>Комментарий</h3>
<form id="myForm">
    <form name="comment" method="post">
        <p>
            <label>Логин:</label>
            <input type="text" name="userName" />
        </p>
        <p>
            <label>Комментарий:</label>
            <br>
            <textarea name="textComment" cols="40" rows="15"></textarea>
        </p>
        <p>
            <input type="hidden" name="page_id" value="150" />
            <input type="submit" value="Отправить">
        </p>
    </form>
</form>