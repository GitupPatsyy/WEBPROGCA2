<?php

require_once 'utilities/functions.php'; //require the funcitons
require_once 'classes/User.php'; //user class to create users
require_once 'connection.php'; //conecction 
require_once 'classes/UserTable.php'; //connection to user table

start_session(); //session start so information can be saved


try {
    $formdata = array();
    $errors = array();

    $input_method = INPUT_POST;
//sanitise the formdata 
    $formdata['username'] = filter_input($input_method, "username", FILTER_SANITIZE_STRING);
    $formdata['password'] = filter_input($input_method, "password", FILTER_SANITIZE_STRING);

    //if any of the form fields are empty
    if (empty($formdata['username'])) {
        $errors['username'] = "Username required";
    }

    if (empty($formdata['password'])) {
        $errors['password'] = "Password required";
    }
    if (empty($errors)) {
        // since none of the form fields were empty,
        // store the form data in variables
        $username = $formdata['username'];
        $password = $formdata['password'];

        // create a UserTable object and use it to retrieve
        // the users
        $connection = connection::getInstance();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByUn($username);

        // since password fields match, see if the username
        // has already been registered - if it is then throw
        // and exception
        if ($user == null) {
            $errors['username'] = "Username is not registered";
        } else {
            if ($password !== $user->getPassword()) {
                $errors['password'] = "Password is incorrect";
            }
        }
    }

    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    // since the username is not aleady registered, cre
    $_SESSION['user'] = $user;

    header('Location: landing.php');
} catch (Exception $ex) {
    // if an exception occurs then extract the message
    // from the exception and send the user the
    // registration form
    $errorMessage = $ex->getMessage();
    require 'login_form.php';
}
?>
