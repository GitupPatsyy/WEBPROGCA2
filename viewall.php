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
        <div class="row">
            <?php require 'utilities/header.php'; ?>
            <?php require 'utilities/toolbar.php'; ?>
        </div>
        <div class="container">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>Address</th>
                        <th>Phone No.</th>
                        <th>Manager Name</th>
                        <th>Garage Name</th>
                        <th>Garage ID</th>
                        <th>Actions</th>

                    </tr>
                    <?php
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {

                        echo '<tr class="info">';
                        echo '<td>' . $row['garageAddress'] . '</td>';
                        echo '<td>' . $row['phoneNo'] . '</td>';
                        echo '<td>' . $row['managerName'] . '</td>';
                        echo '<td>' . $row['nameofGarage'] . '</td>';
                        echo '<td>' . $row['garageID'] . '</td>';
                        echo '<td>'
                        . '<a href="viewGarage.php?id=' . $row['garageID'] . '"><img src="icons/search67.png" height="40px" width="40px" style="padding-right: 10px"/></a>'
                        . '<a href="editgarageform.php?id=' . $row['garageID'] . '"><img src="icons/edi.png" height="40px" width="40px"  /></a>'
                        . '<a class="deletebtn" href="deletegarage.php?id=' . $row['garageID'] . '"><img class="deletebtn" src="icons/del.png"  height="40px" width="40px" style="padding-left: 10px"/></a>';
                        echo '</tr>';

                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>

            </table>

            <a href="addgarageform.php"> <img src="icons/add.png" width="40" height="40"></a>
        </div>
    </body>

</html>