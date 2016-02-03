<?php
require_once 'garage.php';
require_once 'connection.php';
require_once 'garageTableGateway.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(!isset($_GET['id'])){
        die("Illegal Request");
    }
    
    $id = $_GET[id];
    $connection = Connection::getInstance();
    $gateway = new garageTableGateway($connection);
    
    $statement = $gateway->getGarageByID($id);
    
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if(!row){
        die("Illegal request");
    }
    
    else if ($_SERVER['REQUEST_METHOD' === 'POST']){
        if (!isset($_POST['id'])){
            die("Illegal Request");
            
        }
        $id = $_POST['id'];
        $row = $formdata;
        
        
    }
    else {
        die("Illegal Request");
    }
    
    if (!isset($errors)) {
    $errors = array();
}
?>


<html>
    <head>
        <title>EditGarageForm</title>
        <!--Stylsheets to put the design of the website to 960-->
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/text.css">
        <link rel="stylesheet" type="text/css" href="css/960.css">
        <!--Style for the add garage page-->
        <link rel="stylesheet" type="text/css" href="css/addgarage.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <!--External stylesheet for form style-->
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <!--Link for Javascript-->
        <script src="javascript/jsvalidation.js"></script>


    </head>
    <body>
        <!--    Opening databse area -->
        <div class="prefix_5">

            <!--        Opening form area           -->

            <form action="editGarage.php" class="pure-form pure-form-stacked" method="POST">
                <!--            Data will go inside of here -->
                <input type="hidden" name="id" value="<?php echo $row['garageID'];;
?>"/> 
                <h2>Edit Garage Form</h2>
                <table class="grid_12 alpha">
                    <tr>
                        <td>Garage Address</td>
                    </tr>


                    <tr>
                        <td><input type="text" id="garageAdd" name="garageAdd"
                                   value="<?php echo $row['garageAddress']; ?>"/><span class="errors">
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Garage Phone</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="phoneNo" name="phoneNo"
                                   value="<?php setValue($formdata, 'phoneNo') ?>"/><span class="errors" id="phoneError">
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Manager Name</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="managerName" name="managerName"
                                   value="<?php setValue($formdata, 'managerName') ?>"/><span class="errors" id="mnameError">
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Garage Name</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="garageName" name="garageName"
                                   value="<?php setValue($formdata, 'garageName') ?>"/> <span class="errors"
                                   id="garagenameError">
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Date of Next Service</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="serviceDate" name="serviceDate"
                                   value="<?php setValue($formdata, 'serviceDate') ?>"/><span class="errors" id="dateError">
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Manager Email</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="manEmail" name="managerEmail"
                                   value="<?php setValue($formdata, 'managerEmail') ?>"/><span class="errors"
                                   id="emailError">
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Garage URL</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="gURL" name="garageURL" value="<?php setValue($formdata, 'garageURL') ?>"/><span
                                class="errors" id="urlError">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Overnight Facility?</td>
                    </tr>
                    <tr>
                        <td>Yes<input type="checkbox" id="overnighty" type="checkbox" name="overnighty" value="Yes" <?php setChecked($formdata, 'overnighty', 'Yes') ?>/></td>
                        <td>No<input type="checkbox" id="overnightn" type="checkbox" name="overnightn" value="No"<?php setChecked($formdata, 'overnightn', 'No') ?>/></td>

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
                        <td><input type="submit" id="addgarage" value="Update Garage" class="pure-button pure-button-primary submit_btn"
                                   name="add"></td>
                    </tr>


                    <!--        Closing data area       -->
                </table>
                <!--            Closing form area           -->
            </form>

            <!--Closing database area-->
        </div>






    </body>
</html>
