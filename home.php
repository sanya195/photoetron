<?php

$link = mysqli_connect('mysql.zzz.com.ua','sanya195','s1a2n3y4a5ZHUKOV','sanya195')
    or die('error con');
$query = "SELECT * FROM posts";
$res = mysqli_query($link, $query);
$data = array();
while ($row = mysqli_fetch_assoc($res)){
    $data[] = $row;
}

for ($i = 0; $i < count($data); $i++) {
    echo "<div class='post' id='" . $data[$i]['id'] . "'>" . "<img src=" . $data[$i]['image'] . ">";
    echo "<div class='postTitle'>";
    echo '<div class="postName">' . $data[$i]['name'] . '</div>';
    echo '<div class="dataut">';
    echo '<div class="date">' . $data[$i]['postDate'] . '</div>';
    echo '<div class="author">' . $data[$i]['postedBy'] . '</div>';
    echo '</div>';
    echo "</div></div>";
}

mysqli_close($link);
