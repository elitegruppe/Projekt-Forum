<div class="container">
    <div class="blog-header">

        <p class="lead blog-description">
            WILLKOMMEN <?php echo isset($_SESSION['USERNAME']) ? strtoupper($_SESSION['USERNAME']) : 'GAST' ?> ! ! !</p>
        <div class="png">
            <img src="templates/layout/logo-home.png" alt="defaultpic"/>
        </div>
        <?php
        $userCreation = isset($_GET['userInserted']) ? $_GET['userInserted'] : false;
        if ($userCreation == 'false') {
            echo 'Username bereits vergeben bitte neuen Registrieren';
        }
        if ($userCreation == 'true') {
            echo 'Username erstellt';
        }
        ?>
    </div>
</div><!-- /.container -->
