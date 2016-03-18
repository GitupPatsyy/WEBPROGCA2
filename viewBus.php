<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 */
require_once 'connection.php'; //for connection to db
require_once 'garageTableGateway.php'; //connecting to garage tbal
require_once 'busTableGateway.php'; //connection to bus tbale 


if (!isset($_GET['id'])) { //oif the id is not one from the db
    die("Halt"); //die
}

$id = $_GET['id']; //get the id from the databae

$connection = Connection::getInstance(); //connect to the db
$garageGateway = new garageTableGateway($connection); //connect to the garage table
$busGateway = new busTableGateway($connection); //connect to the bus table

$garages = $garageGateway->getGarageByGarageId($id); //garage table get garageby id
$buses = $busGateway->getBusByID($id); //bus table get bus by id
//used in conjunction to view the garage that hioues that bus
//$row = $statement->fetch(PDO::FETCH_ASSOC);
//if (!$row) {
//    die("Unable to get Bus By ID");
//}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Bus by Id</title>

        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php require 'utilities/header.php'; ?>
            </div>
            <div class="row page-header home_content">
                <h2>View Bus Details</h2>
                <table class="table rpb-table">
                    <tbody>
                        <?php
                        $bus = $buses->fetch(PDO::FETCH_ASSOC);

                        echo '<tr>';
                        echo '<th>Bus ID</th>'
                        . '<td>' . $bus['busID'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Registration Number</th>'
                        . '<td>' . $bus['regNum'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<th>Bus Make</th>'
                        . '<td>' . $bus['busMake'] . '</td>';
                        echo '</tr>';
                        echo '<th>Bus Model</th>'
                        . '<td>' . $bus['busModel'] . '</td>';
                        echo '</tr>';
                        echo '<th>Engine Size</th>'
                        . '<td>' . $bus['engineSize'] . '</td>';
                        echo '</tr>';
                        echo '<th>Date Purchase</th>'
                        . '<td>' . $bus['dateBought'] . '</td>';
                        echo '</tr>';
                        echo '</tr>';
                        echo '<th>Date Next Service</th>'
                        . '<td>' . $bus['dateNextService'] . '</td>';
                        echo '</tr>';
                        echo '<th>Garage ID</th>'
                        . '<td>' . $bus['garageID'] . '</td>';
                        echo '</tr>';
                        echo '<td>'
                        . '<a href="editbusform.php?id=' . $bus['busID'] . '"><img src="icons/edit.png" height="40px" width="40px"   style="margin: 3px;" /></a>'
                        . '<a class="deletebtn" href="deletebus.php?id=' . $bus['busID'] . '"><img class="" src="icons/delete.png"  height="40px" width="40px" style="margin: 3px;" /></a>'
                        ?>
                    </tbody>
                </table>
                <div class="">
                    <h3>Bus Assigned to Selected Garage = <?php echo $bus['busID']; ?></h3>
                    <?php if ($garages->rowCount() !== 0) { ?>
                        <table class="table table-height rpb-table">
                            <thead>
                                <tr>
                                    <th>Garage Address</th>
                                    <th>Phone Number</th>
                                    <th>Manager Name</th>
                                    <th>Garage Name</th>
                                    <th>Garage Id</th>
                                    <th>Service Date</th>
                                    <th>Manager Email</th>
                                    <th>Garage URL</th>
                                    <th>Over Night</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $row = $garages->fetch(PDO::FETCH_ASSOC);
                                while ($row) {
                                    echo '<tr>';
                                    echo '<td>' . $row['garageAddress'] . '</td>';
                                    echo '<td>' . $row['phoneNo'] . '</td>';
                                    echo '<td>' . $row['managerName'] . '</td>';
                                    echo '<td>' . $row['nameofGarage'] . '</td>';
                                    echo '<td>' . $row['garageID'] . '</td>';
                                    echo '<td>' . $row['dateService'] . '</td>';
                                    echo '<td>' . $row['managerEmail'] . '</td>';
                                    echo '<td>' . $row['garageURL'] . '</td>';
                                    echo '<td>' . $row['overNight'] . '</td>';
                                    echo '<td>'
                                    . '<a href="viewGarage.php?id=' . $row['garageID'] . '"><img src="icons/view.png"  height="30px" width="30px"  style="margin: 3px;"  /></a> '
                                    . '<a href="editgarageform.php?id=' . $row['garageID'] . '"><img src="icons/edit.png" height="30px" width="30px"   style="margin: 3px;" /></a>'
                                    . '<a class="deleteGarage" href="deletegarage.php?id=' . $row['garageID'] . '"><img class="" src="icons/delete.png"  height="30px" width="30px" style="margin: 3px;" /></a> '
                                    . '</td>';
                                    echo '</tr>';

                                    $row = $garages->fetch(PDO::FETCH_ASSOC);
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <?php require 'utilities/footer.php'; ?> 
    </body>
</html>