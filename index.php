<?php
/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 27.09.16
 * Time: 19:48
 */
session_start();
$_SESSION['ID'] = isset($_SESSION['ID']) ? $_SESSION['ID'] : session_unset();

include __DIR__ . '/templates/layout/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';
$logout = isset($_GET['logout']) ? $_GET['logout'] : '';
if ($logout == true) {
    session_destroy();
    $_GET['logout'] = false;
    header("Refresh:0; url=index.php");

}

function login()
{
    if (!isset($_SESSION['ID'])) {

        $login = isset($_GET['login']) ? $_GET['login'] : '';
        if ($login == '1') {
            include __DIR__ . '/templates/login/login.php';
        } else {
            include __DIR__ . '/templates/login/registration.php';
        }
    }
}


switch ($page) {
    case 'home':
        include __DIR__ . '/pages/home.php';
        login();
        break;
    case 'forum':
        include __DIR__ . '/pages/forum.php';
        include __DIR__ . '/templates/forum/forum.php';
        break;
    case 'about':
        include __DIR__ . '/pages/about.php';
        break;
    case 'administration':
        include __DIR__ . '/pages/administration.php';
        break;
    default:
        include __DIR__ . '/pages/home.php';
        login();
}

include __DIR__ . '/templates/layout/footer.php';