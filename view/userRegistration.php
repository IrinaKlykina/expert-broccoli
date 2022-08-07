<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>my_site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="index.php" method="post">
            <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Ваш логин:</label>
                 <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"></span>
                    <input type="text" name="login" class="form-control" id="validationCustomUsername"
                       placeholder="Введите логин" aria-describedby="inputGroupPrepend" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="input-name">Ваше имя:</label>
                    <input type="text" name="name" class="form-control" id="input-name"
                         placeholder="Введите имя" value="" required>
                </div>
            </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Ваш пароль:</span>
                        <input type="text" onclick="checkPassword();" name="password" id="Password"
                               class="form-control is-valid" placeholder="Введите ваш пароль!"
                               aria-describedby="basic-addon1" required>
                 </div>
            </div>

                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Повторите ваш пароль:</span>
                        <input type="text" name="confirmPassword" id="confirmPassword" class="form-control is-valid"
                               placeholder="Повторите ваш пароль!" aria-describedby="basic-addon1" required>
                </div>
            </div>

            <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Ваш возраст:</span>
                        <input type="text" name="age" id="age" class="form-control is-valid"
                               placeholder="Пользователь должен быть совершеннолетним" aria-describedby="basic-addon1" required>
                </div>
             </div>
                <br>

            <div class="row">
                    <label for="validationCustom06" class="form-label">Ваш пол:</label>
                    <select class="custom-select custom-select-lg" name='gender' id="gender" required>
                        <option selected>Выберите свой пол...</option>
                        <option value="1">Мужчина</option>
                        <option value="2">Женщина</option>
                    </select>
                </div>
                <br>

                <input type="hidden" name="action" value="user/registration"/>
                <div class="col-12">
                    <button class="btn btn-primary" name="submit" type="submit">Отправить форму</button>
                </div>
            </div>
    </form>


</body>
</html>