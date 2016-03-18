<?php
require_once 'garageTableGateway.php'; //require the garage table gateway
require_once 'connection.php'; //require the connection to the database
require_once 'busTableGateway.php'; //tequire the bus table gateway

$connection = Connection::getInstance(); //Use the connection class getinstance of the connection
$gateway = new garageTableGateway($connection); //use the connection to connect to the garage table

$garages = $gateway->getGarages(); //$garages will use the gateway to get Garages for viewing the garage a bus is assigned too
//Function to set the value of the formdata to the respective fieldname

function setValue($formdata, $fieldname) {
    if (isset($formdata) && isset($formdata[$fieldname])) {
        echo $formdata[$fieldname];
    }
}

//Function to set the check boxs to the value
function setChecked($formdata, $fieldName, $fieldValue) {
    if (isset($formdata[$fieldName]) && isset($formdata[$fieldName])) {
        if (is_array($formdata[$fieldName]) && in_array($fieldValue, $formdata[$fieldName])) {
            echo 'checked = "checked"';
        } else if ($formdata[$fieldName] == $fieldValue) {
            echo 'checked = "checked"';
        }
    }
}

if (!isset($formdata)) {
    $formdata = array();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Bus Form</title>
        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>


    </head>

    <body>
        <div class="container-fluid">
            <!--container for the content.-->
            <div class="row">
                <!--row to hold the header-->
                <?php require 'utilities/header.php'; ?>
            </div>
            <!--All content in container-->
            <!--All data will be displayed from database-->

            <!--    Opening databse area -->
            <div class="row page-header home_content ">
                <br>
                <hr>
                <h4 class="center-content">Bus Add</h4>
                <hr>
                <!--        Opening form area           -->
                <form action="createBus.php" id="databaseAdd" name="databaseAdd"
                      method="POST" class="form-horizontal col-lg-push-2 col-lg-8 col-lg-pull-2" >
                    <!--            Data will go inside of here -->
                    <div class="form-group">
                        <!--keeps form data together-->
                        Registration Number
                        <input type="text" id="regNum" name="regNum" class="form-control"
                               value="<?php setValue($formdata, 'regNum') ?>"/><span class="errors"
                               id="regError">
                            <!--                        Garage address errors will go here          -->
                            <?php
                            if (isset($errors['regNum']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['regNum'];
                            ?>
                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Bus Make
                        <input type="text" id="make" name="make" class="form-control"
                               value="<?php setValue($formdata, 'make') ?>"/><span class="errors" id="makeError">
                            <!--                        Phone errors will go here       -->
                            <?php
                            if (isset($errors['make'])) //if there are any errors in the field 
                            // output the error message
                                echo $errors['make'];
                            ?>
                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Bus Model
                        <input type="text" id="model" name="model" class="form-control"
                               value="<?php setValue($formdata, 'model') ?>"/><span class="errors"
                               id="modelError">
                            <!--                        Manager name errors will go here           -->
                            <?php
                            if (isset($errors['model']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['model'];
                            ?>
                        </span>

                    </div>

                    <div class="form-group"> 
                        <!--keeps form data together-->
                        Engine Size

                        <input type="text" id="engine" name="engine" class="form-control"
                               value="<?php setValue($formdata, 'engine') ?>"/> <span class="errors"
                               id="engineError">
                                   <?php
                                   if (isset($errors['engine']))//if there are any errors in the field 
                                   // output the error message
                                       echo $errors['engine'];
                                   ?>
                            <!--                        Garage Name Errors will go here             -->
                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Date Bought

                        <input type="text" id="boughtDate" name="boughtDate" class="form-control"
                               value="<?php setValue($formdata, 'boughtDate') ?>" placeholder="(yyyy/mm/dd)"/><span class="errors" id="dateError">
                            <!--            Date Error will go here             -->
                            <?php
                            if (isset($errors['boughtDate']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['boughtDate'];
                            ?>

                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Next Service
                        <input type="text" id="service" name="service" class="form-control" 
                               value="<?php setValue($formdata, 'service') ?>"/><span class="errors"
                               id="serviceError">
                            <!--                        Email Error will go here        -->
                            <?php
                            if (isset($errors['service']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['service'];
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Garage Id
                        <select  id="gID" name="gID" class="form-control" value="<?php setValue($formdata, 'gID') ?>"/>
                        <?php
                        foreach ($garages as $garage) {
                            echo '<option value="' . $garage['garageID'] . '">' . $garage['nameofGarage'] . '</option>';
                        }
                        ?></select><span class="errors" id="idError">
                            <!--          URL Error will go here         -->
                            <?php
                            if (isset($errors['gID']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['gID'];
                            ?>
                        </span>

                    </div>


                    <div class="form-group">
                        <!--keeps form data together-->
                        <input type="submit" 
                               id="addbus" 
                               value="Add Bus"
                               name="add"
                               class="btn btn-success">
                    </div>
                    <!--        Closing data area       -->

                    <!--            Closing form area           -->
                </form>
            </div>
            <!--Closing container-->
        </div>
        <?php require 'utilities/footer.php'; ?> 
    </body>
</html>
