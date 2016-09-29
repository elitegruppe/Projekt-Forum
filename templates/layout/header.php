<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="HTML, CSS, PHP, JAVASCRIPT">
    <meta name="author" content="root">
    <link rel=icon href=favicon.jpg sizes="16x16" type="image/png">

    <title>BVZ-Forum</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/customCSS/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <?php
            if ($_SESSION['ID']) {
                $directory = __DIR__ . '/../../pages/';
                $pages = array_diff(scandir($directory, SCANDIR_SORT_DESCENDING), array('..', '.', 'administration.php'));
                foreach ($pages as $item) {
                    $item = str_ireplace('.php', '', $item);
                    $page = $item;
                    $item = ucfirst($item);
                    echo '<a class="blog-nav-item" href="index.php?page=' . $page . '">' . $item . '</a>';
                }
            } elseif ($_SESSION['ID'] && $_SESSION['ADMIN']) {
                $directory = __DIR__ . '/../../pages/';
                $pages = array_diff(scandir($directory, SCANDIR_SORT_DESCENDING), array('..', '.'));
                foreach ($pages as $item) {
                    $item = str_ireplace('.php', '', $item);
                    $page = $item;
                    $item = ucfirst($item);
                    echo '<a class="blog-nav-item" href="index.php?page=' . $page . '">' . $item . '</a>';
                }
            }else {
                echo '<a class="blog-nav-item" href="index.php?page=home">Home</a>';
            }

            ?>
        </nav>
    </div>
</div>
