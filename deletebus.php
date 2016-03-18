<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 08/12/2015
 * Time: 11:57 AM
 */
require_once 'Garage.php'; //require the garage class
require_once 'Connection.php'; //require the conneciton class
require_once 'busTableGateway.php'; //require the bus table gateway


if (!isset($_GET['id'])) { //if the id does not match to a valid bus id 
    die("Invalid Bus ID"); // die and output the error
}

$id = $_GET['id']; //get the id from the form

$connection = Connection::getInstance(); //get an instance of the connection
$gateway = new busTableGateway($connection); //connect to the bus table 

$gateway->removeBus($id); //use the remove bus method by passing in the valid id
header("Location: viewallbus.php"); //redirect the user back to the view all bus page
 