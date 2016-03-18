<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <!--        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
            <?php
            require_once 'utils/functions.php';

            if (!is_logged_in()) {
                echo '<li><a href="login_form.php">Login</a></li>';
                echo '<li><a href="register_form.php">Register</a></li>';
            } else {
                echo '<li><a href="landing.php">Home</a></li>';
                echo '<li><a href="viewall.php">Garages</a></li>';
                echo '<li><a href="viewall.php">Buses</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>



















<?php if (!is_logged_in()): ?>
    <?php
    require_once 'utilities/functions.php';

    echo'<nav class="navbar-left">';
    echo'<ul class="nav nav-tabs">';
    echo'<li><a href = "./landing.php">Home</a></li>';
    echo'</ul>';
    echo '</nav>';
    ?>
<?php else: ?>
    <?php
    require_once 'utilities/functions.php';

    echo'<nav>';
    echo'<ul>';
    echo'<li><a href="./landing.php">Home</a></li>';
    echo'<li><a href="./login_form.php">Login</a></li>';
    echo'<li><a href="./register_form.php">Register</a></li>';
    echo'</ul>';
    echo '</nav>';
    ?>
<?php endif; ?>