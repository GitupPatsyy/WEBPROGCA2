<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 18/11/2015
 * Time: 1:42 PM
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
        <title>Add Garage Form</title>
        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>


    </head>

    <body>
        <div class="container-fluid">
            <?php require 'utilities/header.php'; ?>
            <!--All content in container-->
            <!--All data will be displayed from database-->

            <!--    Opening databse area -->
            <div class="row page-header home_content ">
                <br>
                <hr>
                <h4 class="center-content">Garage Add</h4>
                <hr>
                <!--        Opening form area           -->
                <form action="createGarage.php" id="databaseAdd" name="databaseAdd"
                      method="POST" class="form-horizontal col-lg-push-2 col-lg-8 col-lg-pull-2" >
                    <!--            Data will go inside of here -->
                    <div class="form-group">
                        <!--keeps form data together-->
                        Garage Address
                        <input type="text" id="garageAdd" name="garageAdd" class="form-control"
                               value="<?php setValue($formdata, 'garageAdd') ?>"/><span class="errors"
                               id="addresssError">
                            <!--                        Garage address errors will go here          -->
                            <?php
                            if (isset($errors['garageAdd']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['garageAdd'];
                            ?>
                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Garage Phone
                        <input type="text" id="phoneNo" name="phoneNo" class="form-control"
                               value="<?php setValue($formdata, 'phoneNo') ?>"/><span class="errors" id="phoneError">
                            <!--                        Phone errors will go here       -->
                            <?php
                            if (isset($errors['phoneNo']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['phoneNo'];
                            ?>
                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Manager Name
                        <input type="text" id="managerName" name="managerName" class="form-control"
                               value="<?php setValue($formdata, 'managerName') ?>"/><span class="errors"
                               id="mnameError">
                            <!--                        Manager name errors will go here           -->
                            <?php
                            if (isset($errors['managerName']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['managerName'];
                            ?>
                        </span>

                    </div>

                    <div class="form-group"> 
                        <!--keeps form data together-->
                        Garage Name

                        <input type="text" id="garageName" name="garageName" class="form-control"
                               value="<?php setValue($formdata, 'garageName') ?>"/> <span class="errors"
                               id="garagenameError">
                                   <?php
                                   if (isset($errors['garageName']))//if there are any errors in the field 
                                   // output the error message
                                       echo $errors['garageName'];
                                   ?>
                            <!--                        Garage Name Errors will go here             -->
                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Date of Next Service

                        <input type="text" id="serviceDate" name="serviceDate" class="form-control"
                               value="<?php setValue($formdata, 'serviceDate') ?>"  placeholder="(yyyy/mm/dd)" /><span class="errors" id="dateError">
                            <!--            Date Error will go here             -->
                            <?php
                            if (isset($errors['serviceDate']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['serviceDate'];
                            ?>

                        </span>

                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Manager Email
                        <input type="text" id="manEmail" name="managerEmail" class="form-control" 
                               value="<?php setValue($formdata, 'managerEmail') ?>"/><span class="errors"
                               id="emailError">
                            <!--                        Email Error will go here        -->
                            <?php
                            if (isset($errors['managerEmail']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['managerEmail'];
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <!--keeps form data together-->
                        Garage URL
                        <input type="text" id="gURL" name="garageURL" class="form-control" value="<?php setValue($formdata, 'garageURL') ?>"/><span
                            class="errors" id="urlError">
                            <!--          URL Error will go here         -->
                            <?php
                            if (isset($errors['garageURL']))//if there are any errors in the field 
                            // output the error message
                                echo $errors['garageURL'];
                            ?>
                        </span>

                    </div>
                    <div class="form-group form-control">
                        <!--keeps form data together-->
                        Overnight Facility?
                        Yes<input type="checkbox" id="overnighty" type="checkbox" name="overnighty" value="Yes" <?php setChecked($formdata, 'overnighty', 'Yes') ?>/>
                        No<input type="checkbox" id="overnightn" type="checkbox" name="overnightn" value="No"<?php setChecked($formdata, 'overnightn', 'No') ?>/>
                    </div>

                    <div class="form-group">
                        <!--keeps form data together-->
                        <input type="submit" 
                               id="addgarage" 
                               value="Add Garage"
                               name="add"
                               class="btn btn-success">
                    </div>
                    <!--        Closing data area       -->

                    <!--            Closing form area           -->
                </form>
            </div>
            <!--Closing container-->
        </div>
    </div><!--Closing container-->
    <?php require 'utilities/footer.php'; ?> 
</body>
</html>
