<?php

require_once 'classes/User.php'; //require the User class from the classes directory

function is_logged_in() { //function to see if the user is logged in
    start_session(); //PhP session must be started before you can start storing infromation
    return (isset($_SESSION['user'])); //return session of the "user"
}

function start_session() { //start session function
    $id = session_id(); //sets the current session_id to $id
    if ($id === "") { //if the $id is null/nothing 
        session_start(); //start the session
    }
}

?>