<?php
require_once 'configs/db.php';
require_once 'Controllers/controller.php';
require_once 'Models/model.php';
require_once 'helpers/UriHelper.php';

$db = new DataBase();
$conn = $db->connect();

$uriHelper = new UriHelper();

$controller = new NewsController($conn);

$uri = $uriHelper->getUri();
$segments = explode('/', $uri);

if ($segments[0] === 'news' && isset($segments[1])) {
    $controller->newsByID($segments[1]);
} else if ($segments[0] === 'news') {
    $controller->news($uriHelper);
} else {
    header('Location: /news');
    exit();
}
?>