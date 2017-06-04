<?php


	session_start();
/*
if(isset($_SESSION["session_username"])){
    // вывод "Session is set"; // в целях проверки
    header("Location: /home");
}*/

$link = mysqli_connect('mysql.zzz.com.ua','sanya195','s1a2n3y4a5ZHUKOV','sanya195')
or die('error con');

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $username = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $query = mysqli_query($link,"SELECT * FROM users WHERE login='" . $username . "' AND password='" . $password . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $dbusername = $row['login'];
            $dbpassword = $row['password'];
        }
        if ($username == $dbusername && $password == $dbpassword) {
            // старое место расположения
            //  session_start();
            $_SESSION['session_username'] = $username;
            /* Перенаправление браузера */
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }
}
