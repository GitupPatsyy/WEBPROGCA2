<?php

require_once 'utilities/functions.php';
require_once 'classes/User.php'; //user class needed

start_session(); //session start

if (!is_logged_in()) { //if the user is not logged in send them to login form
    header("Location: login_form.php");
} else { //unset the users current session
    unset($_SESSION['user']);

    header("Location: login_form.php");
}
?>
