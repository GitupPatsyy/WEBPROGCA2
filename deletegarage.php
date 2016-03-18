<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 08/12/2015
 * Time: 11:57 AM
 */
require_once 'Garage.php'; //reuqire the garage class
require_once 'Connection.php'; //require the conneciton
require_once 'garageTableGateway.php'; //require the garage table gatwatwdao-is


if (!isset($_GET['id'])) { //if the id doesnt match a garage id
    die("Invalid ID"); //die and output error 
}

$id = $_GET['id']; //get the id from the garage 

$connection = Connection::getInstance(); //get an instance of a connection 
$gateway = new garageTableGateway($connection); //connect to the gargae table using the $connectio

$gateway->removeGarage($id); //use the remove method usign the valid id 
header("Location: viewall.php"); //redirect the user
