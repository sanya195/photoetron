<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Photoetron</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/site/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="head">
            <div id="headMenu">
                <div id="logo">
                    <img src="/site/img/logo.png">
                </div>
            </div>
        </div>
        <div id="content">
            <div id="sideMenu">
                <?php
                $link = mysqli_connect('mysql.zzz.com.ua','sanya195','s1a2n3y4a5ZHUKOV','sanya195')
                or die('error con');

                $query = "SELECT * FROM menu";
                $res = mysqli_query($link, $query);
                $data = array();
                while ($row = mysqli_fetch_assoc($res)){
                    $data[] = $row;
                }
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['item'] == '-') {
                        echo '<hr>';
                    } else {
                        echo "<div class='sideMenuItem'><a href='". '/' . $data[$i]['link'] . "'>" . $data[$i]['item'] . "</a></div>";
                    }
                }
                mysqli_close($link);
                ?>
            </div>
            <div id="posts">
