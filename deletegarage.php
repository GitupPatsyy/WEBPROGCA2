<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 08/12/2015
 * Time: 11:57 AM
 */

require_once 'Garage.php';
require_once 'Connection.php';
require_once 'garageTableGateway.php';


if (!isset($_GET['id'])) {
    die("Invalid ID");
}

$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new garageTableGateway($connection);

$gateway->removeGarage($id);
header("Location: index.php");