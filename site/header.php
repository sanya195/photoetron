<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Photoetron</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="/site/script.js"></script>
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
                        echo '<div style="background-color: rgba(228, 228, 228, 0.75); width: 190px; height: 1px; margin: 0 0 0 10px"></div>';
                    } else {
                        echo "<div class='sideMenuItem'><a href='". '/' . $data[$i]['link'] . "'>" . "<div style='width: 200px;padding: 2px 5px;'>" .$data[$i]['item'] . "</div>" . "</a></div>";
                    }
                }
                mysqli_close($link);
                ?>
            </div>
            <div id="posts">
