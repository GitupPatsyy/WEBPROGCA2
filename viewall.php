<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:17 PM
 */
require_once 'garage.php';
require_once 'connection.php';
require_once 'garageTableGateway.php';

//start_session();
//
//if (!is_logged_in()){
//    header("Location: login_form.php");
//}
//
//$user = $_SESSION['user'];

$connection = Connection::getInstance();
$gateway = new garageTableGateway($connection);

$statement = $gateway->getGarages();
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