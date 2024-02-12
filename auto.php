<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
<fieldset>
            <legend>Форма авторизации пользователя</legend>
            <form action="index.php" method="POST">
            <label for="">Введите Ваш логин <br></label><input type="text" name="login" placeholder="login" require><br>
            <label for="">Введите пароль <br></label><input type="pass" name="pass" placeholder="**********" require><br>
            <br><input type="submit" value="Войти" name="send"><br>

            </form>
    </fieldset>
</body>
</html>