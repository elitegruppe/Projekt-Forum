<?php
/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 27.09.16
 * Time: 19:48
 */
session_start();
include __DIR__ . '/templates/layout/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';
$login = isset($_GET['login']) ? $_GET['login'] : '';

switch ($page) {
    case 'home':
        include __DIR__ . '/pages/home.php';
        break;
    case 'forum':
        include __DIR__ . '/pages/forum.php';
        break;
    case 'about':
        include __DIR__ . '/pages/about.php';
        break;
    case 'administration':
        include __DIR__ . '/pages/administration.php';
        break;
    default:
        include __DIR__ . '/pages/home.php';
}

if ($login == '1') {
    include __DIR__ . '/templates/login/login.php';
} else {
    include __DIR__ . '/templates/login/registration.php';
}

include __DIR__ . '/templates/layout/footer.php';

?>
