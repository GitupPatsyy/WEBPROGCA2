<?php

require_once 'utilities/functions.php';
start_session();

$user = $_SESSION['user'];
if (!is_logged_in()) {
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li><a href="login_form.php">Login</a></li>';
    echo '<li><a href="register_form.php">Register</a></li>';
    echo '<li><a href="landing.php">Home</a></li>';
    echo '</ul>';
} else {
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li><a href="landing.php">Home</a></li>';
    echo '<li><a href="viewall.php">Garages</a></li>';
    echo '<li><a href="viewallbus.php">Buses</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
    echo '</ul>';
}
?>
