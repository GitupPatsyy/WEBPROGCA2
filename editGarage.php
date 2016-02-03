<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'garage.php';
require_once 'connection.php';
require_once 'garageTableGateway';

$id = $_POST['garageID'];
$garageadd = $_POST['garageAddress'];
$phoneno = $_POST['phoneNo'];
$managername = $_POST['managerName'];
$nameofgarage = $_POST['nameofGarage'];
$dateservice = $_POST['dateService'];
$manemail = $_POST['managerEmail'];
$garage_url = $_POST['garageURL'];
$over_night = $_POST['overNight'];

$garage = new Garage($id, $garageadd, $phoneno, $managername, $nameofgarage, $dateservice, $manemail, $garage_url, $over_night);

$connection = Connection::getInstance();
$gateway = new garageTableGateway($connection);

$id = $gateway->updateGarage($garage);

header('Location: viewall.php');



    
