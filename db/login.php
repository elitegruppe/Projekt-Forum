<?php
/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 27.09.16
 * Time: 20:53
 */
session_start();
require_once(__DIR__ . '/../db/dbModel.php');

$db = new dbModel();

if ($sessionData = $db->login()) {
    $_SESSION['ID'] = $sessionData['userID'];
    $_SESSION['USERNAME'] = $sessionData['username'];
    echo "Login erfolgreich";
    $forumPage = str_ireplace('?login=1','', $_SERVER['HTTP_REFERER']);
    header('Location: ' . $forumPage . '?page=forum');
} else {
    echo "Login fehlgeschlagen";
    header('Location: ' . $_SERVER['HTTP_REFERER']);


}

