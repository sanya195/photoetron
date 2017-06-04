<?php
$img = $_POST['id'];

$link = mysqli_connect('mysql.zzz.com.ua','sanya195','s1a2n3y4a5ZHUKOV','sanya195')
or die('error con');
$queryLikes = "SELECT * FROM likes WHERE  id = '$img'";
$res = mysqli_query($link, $queryLikes);
$data = array();
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
echo count($data);

mysqli_close($link);