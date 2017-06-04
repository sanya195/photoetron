<head>
    <meta charset="utf-8">
</head>

<?php
$link = mysqli_connect('mysql.zzz.com.ua', 'sanya195', 's1a2n3y4a5ZHUKOV', 'sanya195')
or die('error con');

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['about'])) {
    $login = htmlspecialchars($_POST['login']);
    $surname = htmlspecialchars($_POST['surname']);
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);
    $age = htmlspecialchars($_POST['age']);
    $about = htmlspecialchars($_POST['about']);
    $query = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
        $sql = "INSERT INTO users (login, password, regDate) VALUES('$login','$password', DATE_FORMAT(CURRENT_DATE(), '%d.%m.%y'))";
        $result = mysqli_query($link, $sql);
        $sql2 = "INSERT INTO usersContact (username, surname, age, about) VALUES('$name','$surname', '$age','$about')";
        $result2 = mysqli_query($link, $sql2);

        echo "Аккаунт успешно создан";
        header('Refresh: 2; URL='.$_SERVER['HTTP_REFERER']);
    } else {
        echo 'Такой пользователь уже существует';
        header('Refresh: 2; URL='.$_SERVER['HTTP_REFERER']);
    }
} else {
    echo 'Одно или несколько полей пустые!';
    header('Refresh: 2; URL='.$_SERVER['HTTP_REFERER']);
}

