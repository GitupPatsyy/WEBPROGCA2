<?php
require_once 'garage.php';
require_once 'connection.php';
require_once 'garageTableGateway.php';

if (!isset($_GET['id'])) {
    die("illegealsdnhajiduyvshj request");
}
$id = $_GET['id'];
$connection = Connection::getInstance();
$gateway = new garageTableGateway($connection);

$statement = $gateway->getGarageByID($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
//if (!$row) {
//    die("Bad request");
//} 
//else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    if (!isset($_POST['id'])) {
//        die("go die");
//    }
//
//    $id = $_POST['id'];
//    $row = $formdata;
//} else {
//    die("DIE BART DIE");
//}
//echo "<pre>";
//        print_r($row);
//        echo "</pre>";

if (!isset($errors)) {
    $errors = array();
}
?>


<html>

    <head>
        <title>Edit GarageForm</title>
        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>


    </head>

    <body>
        <!--All content in container-->
        <div class="container-fluid">
                <?php require 'utilities/header.php'; ?>
            <hr>
            <!--        Opening form area           -->

            <form action="editGarage.php"  id="garageUpdate" name="garageUpdate" method="POST" class="row page-header home_content">
                <!--            Data will go inside of here -->
                <table>
                    
            <h4 class="center-content">Edit Garage</h4>
                    <input type="hidden" name="id" value="<?php
                    echo $row['garageID'];
                    ;
                    ?>" />
                    <tr>
                        <td>Garage Address</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="garageAdd" value="<?php echo $row['garageAddress']; ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Garage Phone</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="phoneNo" value="<?php echo $row['phoneNo']; ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Manager Name</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="managerName" value="<?php echo $row['managerName']; ?>"/>
                    </tr>

                    <tr>
                        <td>Garage Name</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="garageName" value="<?php echo $row['nameofGarage']; ?>"/> 
                        </td>
                    </tr>

                    <tr>
                        <td>Date of Next Service</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="serviceDate" value="<?php echo $row['dateService']; ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Manager Email</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="managerEmail" value="<?php echo $row['managerEmail']; ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Garage URL</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="gURL" name="garageURL" value="<?php echo $row['garageURL']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Overnight Facility?</td>
                    </tr>
                    <tr>
                        <td>Yes
                            <input type="checkbox" id="overnighty" type="checkbox" name="overnighty" value="Yes<?php echo $row['overNight']; ?>"/>
                            No
                            <input type="checkbox" id="overnightn" type="checkbox" name="overnightn" value="No<?php echo $row['overNight']; ?>"/></td>

                    </tr>
                    <tr>

                    </tr>
                    <!--                <tr>-->
                    <!--                    <td>Garage Image</td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><input type="image" class="pure-button pure-button-secondary image_btn" name=""></td>-->
                    <!--                </tr>-->

                    <tr>
                        <td>
                            <input type="submit" id="editgarage" value="Update Garage"  name="edit">
                        </td>
                    </tr>


                    <!--        Closing data area       -->
                </table>
                <!--            Closing form area           -->
            </form>

        <?php  require 'utilities/footer.php'; ?> 

            <!--Closing database area-->
        </div>

    </body>

</html>
