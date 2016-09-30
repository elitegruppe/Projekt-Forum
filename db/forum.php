<?php
require_once(__DIR__ . '/forumModel.php');

$db = new forumModel();

//var_dump($_POST);
//var_dump($_SESSION);

/**
 * Prüfen ob Post GET gesetzt ist und Post in die Datenbank eintragen
 */
if ($_POST['posten']) {
    $db->insertPost();
    header("Refresh:0; url=../index.php?page=forum");
} else {
    var_dump($_POST);
    //$db->getPost();
    //header("Refresh:0; url=../index.php?page=forum");
}
?>