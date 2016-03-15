<?php
require_once 'garageTableGateway.php';
require_once 'connection.php';
require_once 'busTableGateway.php';

$connection = Connection::getInstance();
$gateway = new garageTableGateway($connection);

$garages = $gateway->getGarages();

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 */
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
            <div class="row">
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
                        Registration Number
                        <input type="text" id="regNum" name="regNum" class="form-control"
                               value="<?php setValue($formdata, 'regNum') ?>"/><span class="errors"
                               id="regError">
                            <!--                        Garage address errors will go here          -->
                            <?php
                            if (isset($errors['regNum']))
                                echo $errors['regNum'];
                            ?>
                        </span>

                    </div>
                    <div class="form-group">
                        Bus Make
                        <input type="text" id="make" name="make" class="form-control"
                               value="<?php setValue($formdata, 'make') ?>"/><span class="errors" id="makeError">
                            <!--                        Phone errors will go here       -->
                            <?php
                            if (isset($errors['make']))
                                echo $errors['make'];
                            ?>
                        </span>

                    </div>
                    <div class="form-group">
                        Bus Model
                        <input type="text" id="model" name="model" class="form-control"
                               value="<?php setValue($formdata, 'model') ?>"/><span class="errors"
                               id="modelError">
                            <!--                        Manager name errors will go here           -->
                            <?php
                            if (isset($errors['model']))
                                echo $errors['model'];
                            ?>
                        </span>

                    </div>

                    <div class="form-group"> 
                        Engine Size

                        <input type="text" id="engine" name="engine" class="form-control"
                               value="<?php setValue($formdata, 'engine') ?>"/> <span class="errors"
                               id="engineError">
                                   <?php
                                   if (isset($errors['engine']))
                                       echo $errors['engine'];
                                   ?>
                            <!--                        Garage Name Errors will go here             -->
                        </span>

                    </div>
                    <div class="form-group">
                        Date Bought

                        <input type="text" id="boughtDate" name="boughtDate" class="form-control"
                               value="<?php setValue($formdata, 'boughtDate') ?>"/><span class="errors" id="dateError">
                            <!--            Date Error will go here             -->
                            <?php
                            if (isset($errors['boughtDate']))
                                echo $errors['boughtDate'];
                            ?>

                        </span>

                    </div>
                    <div class="form-group">
                        Next Service
                        <input type="text" id="service" name="service" class="form-control" 
                               value="<?php setValue($formdata, 'service') ?>"/><span class="errors"
                               id="serviceError">
                            <!--                        Email Error will go here        -->
                            <?php
                            if (isset($errors['service']))
                                echo $errors['service'];
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        Garage Id
                        <select  id="gID" name="gID" class="form-control" value="<?php setValue($formdata, 'gID') ?>"/>
                        <?php
                        foreach ($garages as $garage) {
                            echo '<option value="' . $garage['garageID'] . '">' . $garage['nameofGarage'] . '</option>';
                        }
                        ?></select><span class="errors" id="idError">
                            <!--          URL Error will go here         -->
                            <?php
                            if (isset($errors['gID']))
                                echo $errors['gID'];
                            ?>
                        </span>

                    </div>


                    <div class="form-group">
                        <input type="submit" 
                               id="addgarage" 
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
