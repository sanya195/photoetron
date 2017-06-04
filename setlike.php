<?php
$link = mysqli_connect('mysql.zzz.com.ua', 'sanya195', 's1a2n3y4a5ZHUKOV', 'sanya195')
or die('error con');
session_start();
$id = $_POST['id'];
$ulog = $_SESSION['session_username'];

$query = "SELECT * FROM users WHERE login = '$ulog'";
$res = mysqli_query($link, $query);
$data = array();
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
$uid = $data[0]['id'];

$queryCheck = "SELECT * FROM likes WHERE id = '$id' AND userId = '$uid'";
$res2 = mysqli_query($link, $queryCheck);
$data2 = array();
while ($row2 = mysqli_fetch_assoc($res2)) {
    $data2[] = $row2;
}
$num = count($data2);

if ($num == 0 && $uid != 0) {
    $queryLikes = "INSERT INTO likes (id, userId) VALUES ('$id','$uid')";
    $resLikes = mysqli_query($link, $queryLikes);
}

mysqli_close($link);