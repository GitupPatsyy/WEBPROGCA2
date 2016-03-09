<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:17 PM
 */
require_once 'connection.php';
require_once 'garageTableGateway.php';

if (!isset($_GET['id'])) {
    die("Halt");
}

$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new garageTableGateway($connection);

$statement = $gateway->getGarageByID($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Unable to get Garage By ID");
}
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
            <div class="row page-header home_content">
                <table class="col-lg-push-1 col-lg-10 col-lg-pull-1">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Phone No.</th>
                            <th>Manager Name</th>
                            <th>Garage Name</th>
                            <th>Garage ID</th>
                            <th>Service Date</th>
                            <th>Manager Email</th>
                            <th>Garage URL</th>
                            <th>Over Night?</th>
                        </tr>
                        <?php
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
                        echo '</tr>';
                        ?>
                </table>
            </div>
        </div>
        <?php require 'utilities/footer.php'; ?> 
    </body>
</html>