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
    var_dump($sessionData);
    $_SESSION['ID'] = $sessionData['userID'];
    $_SESSION['USERNAME'] = $sessionData['username'];
    var_dump($_SESSION);
    echo "Login erfolgreich";
//    header("Location: http://localhost/phpForum/");
    header("Location: /../../phpForum/index.php?page=forum");
} else {
    echo "Login fehlgeschlagen";
}

