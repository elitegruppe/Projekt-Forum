<?php
/**
 * Dient zur Registrierung
 */
require_once(__DIR__ . '/../db/dbModel.php');

$db = new dbModel();

if ($db->userExists()) {
    header("Refresh:0; url=../index.php?userInserted=false");
} else {
    $db->insertUser();
    header("Refresh:0; url=../index.php?userInserted=true");
}
