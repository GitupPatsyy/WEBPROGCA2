<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:17 PM
 */
require_once 'bus.php';
require_once 'connection.php';
require_once 'busTableGateway.php';

//start_session();
//
//if (!is_logged_in()){
//    header("Location: login_form.php");
//}
//
//$user = $_SESSION['user'];

$connection = Connection::getInstance();
$gateway = new busTableGateway($connection);

$statement = $gateway->getBuses();
//
//echo "Connected to the database";
?>
<!DOCTYPE html>
<html>
    <head>

        <title>View all Buses</title>
        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row table-spacing">
                <?php require 'utilities/viewAllBusesHeader.php'; ?>
            </div>
            <br>
            <!--        <div class="row page-header home_content">
                        <hr>
                        <h4>View All Buses</h4>
                        <hr>
                        <table class="col-lg-push-2 col-lg-8 col-lg-pull-2">
                            <div class="row col-lg-push-2 col-lg-8 col-lg-pull-2">
                                <a href="addbusform.php"> <img src="icons/add.png" width="40" height="40"  style="margin: 3px;" ></a>
                            </div>
                            <thead>
                                <tr>
                                    <th>Reg Number</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Engine Size</th>
                                    <th>Date Bought</th>
                                    <th>Actions</th>
            
                                </tr>
            
                        
                        </table>
            
            
                    </div>-->
            <?php require 'utilities/footer.php'; ?> 
        </div>
    </body>

</html>