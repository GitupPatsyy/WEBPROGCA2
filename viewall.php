<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:17 PM
 */
require_once 'garage.php'; //garges 
require_once 'connection.php'; //coneection to db
require_once 'garageTableGateway.php'; //connect to the garage tabl
//start_session();
//
//if (!is_logged_in()){
//    header("Location: login_form.php");
//}
//
//$user = $_SESSION['user'];

$connection = Connection::getInstance(); //connection to db 
$gateway = new garageTableGateway($connection); //use the conenction to go to the garagetable

$statement = $gateway->getGarages(); //method to select all garages
//
//echo "Connected to the database";
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Base View of Garages</title>
        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row table-spacing">

                <?php require 'utilities/viewAllGaragesHead.php'; ?>
            </div>
            <br>
        </div>
        <div class="row">
            <?php require 'utilities/footer.php'; ?> 
        </div>
    </body>

</html>