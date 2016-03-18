<?php

require_once 'utilities/functions.php'; //require the functions PhP file
start_session(); //start the PhP session

$user = $_SESSION['user']; //Sets the session to the $user
if (!is_logged_in()) { //if the user is not logged in display this nav menu
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li><a href="login_form.php">Login</a></li>';
    echo '<li><a href="register_form.php">Register</a></li>';
    echo '<li><a href="landing.php">Home</a></li>';
    echo '</ul>';
} else { //if the user is logged in display this nav menu
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li><a href="landing.php">Home</a></li>';
    echo '<li><a href="viewall.php">Garages</a></li>';
    echo '<li><a href="viewallbus.php">Buses</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
    echo '</ul>';
}
?>
