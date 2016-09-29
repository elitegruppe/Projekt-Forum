<?php
/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 27.09.16
 * Time: 20:53
 */
require_once(__DIR__ . '/../db/dbModel.php');

$db = new dbModel();

if ($db->userExists()) {
    header("Location: /../../phpForum/index.php");
    echo "Dieser Username ist schon vergeben";
} else {
    $db->insertUser();
    header("Location: /../../phpForum/index.php?login=1");
}
