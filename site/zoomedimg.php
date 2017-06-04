<?php
$img = $_POST['id'];

$link = mysqli_connect('mysql.zzz.com.ua','sanya195','s1a2n3y4a5ZHUKOV','sanya195')
or die('error con');
$query = "SELECT * FROM posts WHERE id = $img";
$res = mysqli_query($link, $query);
while ($row = mysqli_fetch_assoc($res)){
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($link);