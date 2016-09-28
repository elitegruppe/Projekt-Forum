<?php
/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 27.09.16
 * Time: 19:48
 */

include __DIR__ . '/temp.html';

$userlogin = (isset($_GET['userlogin']) ? $_GET['userlogin'] : false);
if ($userlogin == 'true') {
    include __DIR__ . '/templates/login/login.php';
} else {
    include __DIR__ . '/templates/login/registration.php';
}

include __DIR__ . '/footer.html';

?>
