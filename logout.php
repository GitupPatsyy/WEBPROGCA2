<?php
require_once 'utilities/functions.php';
require_once 'classes/User.php';

start_session();

if (!is_logged_in()) {
    header("Location: login_form.php");
}
else {
	unset($_SESSION['user']);
	
	header("Location: login_form.php");
}
?>
