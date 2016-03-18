<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 */
require_once 'bus.php'; //require bus class 
require_once 'connection.php'; //require connection
require_once 'busTableGateway.php'; //require bustablegateway
require_once 'bformprocess.php'; //require the form process for validation


validate($formdata, $errors); //function to validate the formdata
//
//    echo '<pre>';
//    print_r($errors);
//    print_r($formdata);
//    echo "</pre>";

if (empty($errors)) { // if the errors arry is empty create the bus objct
    //set varibles to formdata of the respective fields
    $reg_num = $formdata["regNum"];
    $bus_make = $formdata["make"];
    $bus_model = $formdata["model"];
    $engine = $formdata["engine"];
    $bus_id;
    $bought_date = $formdata["boughtDate"];
    $next_service = $formdata['service'];
    $garage_id = $formdata['gID'];

    $bus = new Bus($bus_id, $reg_num, $bus_make, $bus_model, $engine, $bought_date, $next_service, $garage_id);



    $connection = Connection::getInstance(); //get an instance of the connection
    $gateway = new busTableGateway($connection); //connect to the bus table gateway using the conneciton 

    $id = $gateway->insertBus($bus); //insert the bus object
//Redirects the user to the specific page
    header('Location: viewallbus.php');
    exit();
} else {
    require "addbusform.php";
}

