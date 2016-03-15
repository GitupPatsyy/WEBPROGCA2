<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:17 PM
 */
require_once 'connection.php';
require_once 'garageTableGateway.php';
require_once 'busTableGateway.php';

//if (!isset($_GET['id'])) {
//    die("Halt");
//}

$id = $_GET['id'];

$connection = Connection::getInstance();
$garageGateway = new garageTableGateway($connection);
$busGateway = new busTableGateway($connection);

$garages = $garageGateway->getGarageById($id);
$bus = $busGateway->getBusByGarageId($id);
//$row = $statement->fetch(PDO::FETCH_ASSOC);
//if (!$row) {
//    die("Unable to get Garage By ID");
//}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Garage by Id</title>

        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php require 'utilities/header.php'; ?>
            <div class="row col-lg-12">
                <h2>View Garage Details</h2>
                <div class="row page-header">
                    <table class="table rpb-table">
                        <tbody>
                            <?php
                            $garage = $garages->fetch(PDO::FETCH_ASSOC);
                            echo '<tr>';
                            echo '<th>Address</th>'
                            . '<td>' . $garage['garageAddress'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<th>Phone</th>'
                            . '<td>' . $garage['phoneNo'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<th>Manager Name</th>'
                            . '<td>' . $garage['managerName'] . '</td>';
                            echo '</tr>';
                            echo '<th>Garage Name</th>'
                            . '<td>' . $garage['nameofGarage'] . '</td>';
                            echo '</tr>';
                            echo '<th>Garage Id</th>'
                            . '<td>' . $garage['garageID'] . '</td>';
                            echo '</tr>';
                            echo '<th>Date of Next Service</th>'
                            . '<td>' . $garage['dateService'] . '</td>';
                            echo '</tr>';
                            echo '<th>Manager Email</th>'
                            . '<td>' . $garage['managerEmail'] . '</td>';
                            echo '</tr>';
                            echo '<th>Garage URL</th>'
                            . '<td>' . $garage['garageURL'] . '</td>';
                            echo '</tr>';
                            echo '<th>Overnight</th>'
                            . '<td>' . $garage['overNight'] . '</td>';
                            echo '</tr>';
                            echo '<td>'
                            . '<a href="editgarageform.php?id=' . $row['garageID'] . '"><img src="icons/edit.png" height="30px" width="30px"   style="margin: 3px;" /></a>'
                            . '<a class="deletebtn" href="deletegarage.php?id=' . $row['garageID'] . '"><img class="" src="icons/delete.png"  height="30px" width="30px" style="margin: 3px;" /></a>'
                            ?>
                        </tbody>
                    </table>
                    <div class="col-lg-10 col-lg-offset-1">
                        <h3>Buses Assigned to <?php echo $garage['nameofGarage']; ?></h3>
                        <?php if ($bus->rowCount() !== 0) { ?>
                            <table class="table table-height rpb-table">
                                <thead>
                                    <tr>
                                        <th>Bus ID</th>
                                        <th>Registration</th>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th>Engine Size</th>
                                        <th>Garage Id</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $bus->fetch(PDO::FETCH_ASSOC);
                                    while ($row) {
                                        echo '<tr>';
                                        echo '<td>' . $row['busID'] . '</td>';
                                        echo '<td>' . $row['regNum'] . '</td>';
                                        echo '<td>' . $row['busMake'] . '</td>';
                                        echo '<td>' . $row['busModel'] . '</td>';
                                        echo '<td>' . $row['engineSize'] . '</td>';
                                        echo '<td>' . $row['garageID'] . '</td>';
                                        echo '<td>'
                                        . '<a href="viewBus.php?id=' . $row['busID'] . '"><img src="icons/view.png"  height="30px" width="30px"  style="margin: 3px;"  /></a> '
                                        . '<a href="editBusForm.php?id=' . $row['busID'] . '"><img src="icons/edit.png" height="30px" width="30px"   style="margin: 3px;" /></a>'
                                        . '<a class="deleteBus" href="deleteBus.php?id=' . $row['busID'] . '"><img class="" src="icons/delete.png"  height="30px" width="30px" style="margin: 3px;" /></a> '
                                        . '</td>';
                                        echo '</tr>';

                                        $row = $bus->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php } else { ?>
                    <p>There are no buses being stored in this garage.</p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <?php require 'utilities/footer.php'; ?> 
        </div>
    </body>
</html>