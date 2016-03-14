<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
*/
require_once 'connection.php';
require_once 'busTableGateway.php';

if (!isset($_GET['id'])) {
    die("Halt");
}

$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new busTableGateway($connection);

$statement = $gateway->getBusByID($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Unable to get Bus By ID");
}
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
                <?php require 'utilities/header.php'; ?>
            <div class="row page-header home_content">
                <table class="col-lg-push-1 col-lg-10 col-lg-pull-1">
                    <thead>
                        <tr>
                            <th>Reg Num</th>
                            <th>Bus Make</th>
                            <th>Bus Model</th>
                            <th>Engine Size</th>
                            <th>Date Bought</th>
                            <th>Next Service</th>
                            <th>Garage ID</th>
                        </tr>
                        <?php
                        echo '<tr>';
                        echo '<td>' . $row['regNum'] . '</td>';
                        echo '<td>' . $row['busMake'] . '</td>';
                        echo '<td>' . $row['busModel'] . '</td>';
                        echo '<td>' . $row['engineSize'] . '</td>';
                        echo '<td>' . $row['dateBought'] . '</td>';
                        echo '<td>' . $row['dateNextService'] . '</td>';
                        echo '<td>' . $row['garageID'] . '</td>';
                        echo '</tr>';
                        ?>
                </table>
            </div>
        </div>
        <?php require 'utilities/footer.php'; ?> 
    </body>
</html>