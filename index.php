<?php
/**
 * Created by PhpStorm.
 * User: sonic
 * Date: 27.09.16
 * Time: 19:48
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EliteGruppe Forum</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container center-block">
    <h1>Willkommen im EliteGruppe Forum</h1>
    <p>Bitte melde dich an um den Forum Bereich zu nutzen.</p>
</div>
<div class="container">
    <form class="form-signin" action="db/registration.php" method="get">
        <?php
        if (($_GET['userlogin'] == 'true')) {
            include 'templates/login/login.php';
        } else {
            include 'templates/login/registration.php';
        }
        ?>
    </form>
</div> <!-- /container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>