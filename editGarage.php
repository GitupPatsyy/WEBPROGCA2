<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 26/11/2015
 * Time: 3:29 PM
 */
//
require_once 'garage.php'; //require the garage class
require_once 'connection.php'; //for connecting to db
require_once 'garageTableGateway.php'; //connecting to table
require_once 'gformprocess.php'; //validate the form data




validate($formdata, $errors); //function to validate the form data
//
//echo "<pre>";
//        print_r($formdata);
//        print_r($errors);
//        echo "</pre>";


if (empty($errors)) { //if the formdata has no errors then set the variable values from the formdata
    $garage_address = $formdata["garageAdd"];
    $phone_no = $formdata["phoneNo"];
    $manager_name = $formdata["managerName"];
    $garage_name = $formdata["garageName"];
    $garage_id = $_POST["id"];
    $service_date = $formdata["serviceDate"];
    $over_night = true;

    $garage_url = $formdata['garageURL'];
    $garage_url_valid = filter_var($garage_url, FILTER_VALIDATE_URL);

    $manager_email = filter_input(INPUT_POST, 'managerEmail', FILTER_SANITIZE_EMAIL);
    $manager_email_valid = filter_var($manager_email, FILTER_VALIDATE_EMAIL);

    $garage = new Garage($garage_address, $phone_no, $manager_name, $garage_name, $garage_id, $service_date, $manager_email, $garage_url, $over_night); //create a garage object 


    $connection = Connection::getInstance(); //get an instace of the connection
    $gateway = new garageTableGateway($connection); //connectt to the garagetable 

    $id = $gateway->updateGarage($garage); //update funciton using the new garage object
//Redirects the user to the specific page
    header('Location: viewall.php');
//    exit();
} else { //else will return the edit garage table
    $garage_id = $_POST["id"];
    header("Location: editgarageform.php?id=$garage_id");
}