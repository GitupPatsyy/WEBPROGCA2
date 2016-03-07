<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'utilities/functions.php';
require_once 'classes/User.php';
require_once 'classes/UserTable.php';

start_session();

try {
    $formdata = array();
    $errors = array();
    
    $input_method = INPUT_POST;
    
    $input_method['username'] = filter_input($input_method, "username", FILTER_SANITIZE_STRING);
    $input_method['password'] = filter_input($input_method,  "password", FILTER_SANITIZE_STRING);
    
    //Throw an exception if any of the form fields are empty
    if (empty($formdata['username'])){
        $errors['username'] = "Username Required";
    }
    
    if (empty($formdata['password'])){
        $errors['password'] = 'Password Required';
    }
    
    if(empty($errors)){
        $username = $formdata['username'];
        $password = $formdata['password'];
        
        $encrypted_password = md5($formdata[COLUMN_USER_PASSWORD]);
        
        //create new user table for users
        $connection = $connection::getConnection();
        $userTable= new UserTable($connection);
        $user = $userTable->getUserByUsername($username);
        
        if($user == null){
            $errors[COLUMN_USER_USERNAME] = 'Password & Username do not match';
        } else {
            if ($encrypted_password !== $user->getPassword()) {
                $errors[COLUMN_USER_PASSWORD] = "Password & Username do not match";
            }
        }
        
        if (!empty($errors)) {
            throw new Exception("Credentials were incorrect, please try again.");
        }
        
        $_SESSION['user'] = $user;
        
        
        header('Location: landing.php');
    }
    
} catch (Exception $ex) {
    $errorMessage =  $ex->getMessage();
    require 'login_form.php';
}



