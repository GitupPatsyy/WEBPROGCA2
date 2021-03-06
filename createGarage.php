<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 26/11/2015
 * Time: 3:29 PM
 */
//
require_once 'garage.php'; //require the garage class
require_once 'connection.php'; //require the conneciton for db conenction
require_once 'garageTableGateway.php'; //require garagetable gateway for connecting to the table
require_once 'gformprocess.php'; //require for form validation 


validate($formdata, $errors); //function for validating the formdaata
//    echo '<pre>';
//    print_r($errors);
//    print_r($formdata);
//    echo "</pre>";

if (empty($errors)) { //if the errors array is empty set the varibles to the respective formdata
    $garage_address = $formdata["garageAdd"];
    $phone_no = $formdata["phoneNo"];
    $manager_name = $formdata["managerName"];
    $garage_name = $formdata["garageName"];
    $garage_id;
    $service_date = $formdata["serviceDate"];
    $over_night = true;

    $garage_url = filter_input(INPUT_POST, 'garageURL', FILTER_SANITIZE_URL);
    $garage_url_valid = filter_var($garage_url, FILTER_VALIDATE_URL);

    $manager_email = filter_input(INPUT_POST, 'managerEmail', FILTER_SANITIZE_EMAIL);
    $manager_email_valid = filter_var($manager_email, FILTER_VALIDATE_EMAIL);

    $garage = new Garage($garage_address, $phone_no, $manager_name, $garage_name, $garage_id, $service_date, $manager_email, $garage_url, $over_night);



    $connection = Connection::getInstance(); //get an instance of the connection
    $gateway = new garageTableGateway($connection); //connect to the garage table using the connection

    $id = $gateway->insertGarage($garage); //insert the garage object
//Redirects the user to the specific page
    header('Location: viewall.php');
    exit();
} else {
    require "addgarageform.php";
}

