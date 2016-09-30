<div class="container">
    <div class="blog-header">

        <p class="lead blog-description">
            WILLKOMMEN <?php echo isset($_SESSION['USERNAME']) ? strtoupper($_SESSION['USERNAME']) : 'GAST' ?> ! ! !</p>
        			<div class="png">
        				<img src="templates/layout/logo-home.png" alt="defaultpic" />
        			</div>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
        </div><!-- /.blog-main -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module">
                <h4>Wichtige Links:</h4>
                <ol class="list-unstyled">
                    <li><a href="http://www.github.com">GitHub</a></li>
                    <li><a href="http://www.facebook.com">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->
</div><!-- /.container -->
