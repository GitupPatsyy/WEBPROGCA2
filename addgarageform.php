<?php
/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 18/11/2015
 * Time: 1:42 PM
 */
//Function to set the value of the formdata to the respective fieldname
function setValue($formdata, $fieldname)
{
    if (isset($formdata) && isset($formdata[$fieldname])) {
        echo $formdata[$fieldname];
    }

}
//Function to set the check boxs to the value 
function setChecked($formdata, $fieldName, $fieldValue) {
    if (isset($formdata[$fieldName]) && isset($formdata[$fieldName])) {
        if (is_array($formdata[$fieldName]) && in_array($fieldValue, $formdata[$fieldName])){
            echo 'checked = "checked"';
        }
        else if ($formdata[$fieldName] == $fieldValue){
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
<!--All content in container-->
<div class="container_12">
    <!--All data will be displayed from database-->
    <br>
    <hr>
    <h4 style="text-align: center">Garage Add</h4>
    <hr>
    <!--    Opening databse area -->
    <div class="prefix_5">

        <!--        Opening form area           -->

        <form action="createGarage.php" class="pure-form pure-form-stacked" id="databaseAdd" name="databaseAdd"
              method="POST">
            <!--            Data will go inside of here -->
            <table class="grid_12 alpha">
                <tr>
                    <td>Garage Address</td>
                </tr>
                <tr>
                    <td><input type="text" id="garageAdd" name="garageAdd"
                               value="<?php setValue($formdata, 'garageAdd') ?>"/><span class="errors"
                                                                                        id="addresssError">
<!--                        Garage address errors will go here          -->
                            <?php
                            if (isset($errors['garageAdd']))
                                echo $errors['garageAdd'];
                            ?>
                    </span>
                    </td>
                </tr>

                <tr>
                    <td>Garage Phone</td>
                </tr>
                <tr>
                    <td><input type="text" id="phoneNo" name="phoneNo"
                               value="<?php setValue($formdata, 'phoneNo') ?>"/><span class="errors" id="phoneError">
<!--                        Phone errors will go here       -->
                            <?php
                            if (isset($errors['phoneNo']))
                                echo $errors['phoneNo'];
                            ?>
                    </span>
                    </td>
                </tr>

                <tr>
                    <td>Manager Name</td>
                </tr>
                <tr>
                    <td><input type="text" id="managerName" name="managerName"
                               value="<?php setValue($formdata, 'managerName') ?>"/><span class="errors"
                                                                                          id="mnameError">
<!--                        Manager name errors will go here           -->

                            <?php
                            if (isset($errors['managerName']))
                                echo $errors['managerName'];
                            ?>
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
                            <?php
                            if (isset($errors['garageName']))
                                echo $errors['garageName'];
                            ?>
                            <!--                        Garage Name Errors will go here             -->
                    </span>
                    </td>
                </tr>

                <tr>
                    <td>Date of Next Service</td>
                </tr>
                <tr>
                    <td><input type="text" id="serviceDate" name="serviceDate"
                               value="<?php setValue($formdata, 'serviceDate') ?>"/><span class="errors" id="dateError">
<!--            Date Error will go here             -->
                            <?php
                            if (isset($errors['serviceDate']))
                                echo $errors['serviceDate'];
                            ?>

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
<!--                        Email Error will go here        -->
                            <?php
                            if (isset($errors['managerEmail']))
                                echo $errors['managerEmail'];

                            ?>
                    </span>
                    </td>
                </tr>

                <tr>
                    <td>Garage URL</td>
                </tr>
                <tr>
                    <td><input type="text" id="gURL" name="garageURL" value="<?php setValue($formdata, 'garageURL') ?>"/><span
                            class="errors" id="urlError">
<!--          URL Error will go here         -->
                            <?php
                            if (isset($errors['garageURL']))
                                echo $errors['garageURL'];
                            ?>

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
                    <td><input type="submit" id="addgarage" value="Add Garage" class="pure-button pure-button-primary submit_btn"
                               name="add"></td>
                </tr>


                <!--        Closing data area       -->
            </table>
            <!--            Closing form area           -->
        </form>

        <!--Closing database area-->
    </div>

    <!--Closing container-->
</div>
</body>


</html>
