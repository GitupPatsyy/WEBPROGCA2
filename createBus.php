<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 */

require_once 'bus.php';
require_once 'connection.php';
require_once 'busTableGateway.php';
require_once 'bformprocess.php';


validate($formdata, $errors);
//
//    echo '<pre>';
//    print_r($errors);
//    print_r($formdata);
//    echo "</pre>";

if (empty($errors)) {


    $reg_num = $formdata["regNum"];
    $bus_make = $formdata["make"];
    $bus_model = $formdata["model"];
    $engine = $formdata["engine"];
    $bus_id;
    $bought_date = $formdata["boughtDate"];
    $next_service = $formdata['service'];
    $garage_id = $formdata['gID'];
    
    $bus = new Bus($bus_id, $reg_num, $bus_make, $bus_model, $engine, $bought_date, $next_service, $garage_id);



    $connection = Connection::getInstance();
    $gateway = new busTableGateway($connection);

    $id = $gateway->insertBus($bus);


//Redirects the user to the specific page
    header('Location: viewallbus.php');
    exit();
} else {
    require "addbusform.php";
}

