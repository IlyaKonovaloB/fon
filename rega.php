<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
<fieldset>
            <legend>Форма регистрации пользователя</legend>
            <form action="" method="POST">
            <label for="">Введите Ваш логин <br></label><input type="text" name="login" placeholder="login" ><br>
            <label for="">Введите пароль <br></label><input type="password" name="pass" placeholder="**********" ><br>
            <label for="">Подтвердите пароль <br></label><input type="password" name="pass2" placeholder="**********" ><br>
            <label for="">Введите Вашу электронную почту <br></label><input type="e-mail" name="email" placeholder="test@test.ru" ><br>
            <label for="">Введите дату Вашего рождения <br></label><input type="date" name="date_r" placeholder="2001.01.01." for=""><br>
            <br><input type="submit" value="Отправить" name="send"><br>

            </form>
    </fieldset>
</body>
</html>

<?php
    include 'connect.php';
    $error_message = "";
    if(isset($_POST["send"])) {

        if($_POST["login"] && $_POST["pass"] && $_POST["pass2"] && $_POST["email"] && $_POST["date_r"]) {
            if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                if($_POST["pass"] == $_POST["pass2"]) {
                    $login = $_POST['login'];
                    
                    $query = $mysqli -> query("SELECT * FROM `users` WHERE `login` = '$login'");

                    if(mysqli_num_rows($query) == 0) {
                        $email = $_POST['email'];
                        $query2 = $mysqli -> query("SELECT * FROM `users` WHERE `email`='$email'");
                        if(mysqli_num_rows ($query2) == 0) {
                            $pass = $_POST['pass'];
                            $date_r = $_POST['date_r'];
                            $result = $mysqli->query ("INSERT INTO `users` (`login`, `pass`, `email`, `date_r`) VALUES ('$login', '".md5("$pass")."', '$email', '$date_r')");
        header ('index.php');  
                            header ("location: index.php");
                        } else echo $error_message = "Данная почта уже зарегистрирована";
                    } else echo $error_message = "Данный логин уже занят";
                } else echo $error_message = "Пароли не совпадают";
            } else echo $error_message = "Формат электронной почта указан не верно";
        } else echo $error_message = "Не все поля заполнены";
        } 
        
        $mysqli -> close ();
?>

