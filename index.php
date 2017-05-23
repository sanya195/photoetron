<?

if ($_SERVER['REQUEST_URI'] == '/'){
    $page = 'home';
} else {
    $page = substr($_SERVER['REQUEST_URI'], 1);
    if (!preg_match('/^[A-z0-9]{3,20}$/', $page)) exit('Ошибка');
}

session_start();

$header = require 'site/header.php';


if (file_exists($page.'.php')) include $page.'.php';
else exit('Page 404');

$footer = require 'site/footer.php';
