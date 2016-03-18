<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 */
function validate(&$formdata, &$errors) {

    //Set the input method for efficiency instead of changing all the variables
    $input_method = INPUT_POST;
    //Formdata array
    //Sanitizing data that is input to defeat the sql injection
    $formdata['regNum'] = filter_input($input_method, "regNum", FILTER_SANITIZE_STRING);
    $formdata['make'] = filter_input($input_method, "make", FILTER_SANITIZE_STRING);
    $formdata['model'] = filter_input($input_method, "model", FILTER_SANITIZE_STRING);
    $formdata['engine'] = filter_input($input_method, "engine", FILTER_SANITIZE_STRING);
    $formdata['boughtDate'] = filter_input($input_method, "boughtDate", FILTER_SANITIZE_STRING);
    $formdata['service'] = filter_input($input_method, "service", FILTER_SANITIZE_STRING);
    $formdata['gID'] = filter_input($input_method, "gID", FILTER_SANITIZE_STRING);

    if ($formdata['regNum'] === NULL || $formdata['regNum'] === FALSE || $formdata['regNum'] === "") { //if the formdata  is null or false or empty the errors array will have the below error
        $errors['regNum'] = "Registration number is required to create a bus";
    }
    if ($formdata['make'] === NULL || $formdata['make'] === FALSE || $formdata['make'] === "") {//if the formdata  is null or false or empty the errors array will have the below error
        $errors['make'] = "Bus Make is required to create a bus";
    }
    if ($formdata['model'] === NULL || $formdata['model'] === FALSE || $formdata['model'] === "") {//if the formdata  is null or false or empty the errors array will have the below error
        $errors['model'] = "Bus Model is required to create a bus";
    }
    if ($formdata['engine'] === NULL || $formdata['engine'] === FALSE || $formdata['engine'] === "") {//if the formdata  is null or false or empty the errors array will have the below error
        $errors['engine'] = "Engine Size is required to create a bus";
    }
//If the form data for bought date is empty or in the wrong format it will output and error.
    if ($formdata['boughtDate'] !== NULL || $formdata['boughtDate'] !== FALSE || $formdata['boughtDate'] !== "") {
        $date_array = explode('-', $formdata['boughtDate']);
        if (count($date_array) != 3 || !checkdate($date_array[2], $date_array[1], $date_array[0])) {
            $errors['boughtDate'] = "Invalid Date Format(yyyy-dd-mm)";
        }
    }
    //If the form data for bought date is empty or in the wrong format it will output and error.
    if ($formdata['service'] !== NULL || $formdata['service'] !== FALSE || $formdata['service'] !== "") {
        $date_array = explode('-', $formdata['service']);
        if (count($date_array) != 3 || !checkdate($date_array[2], $date_array[1], $date_array[0])) {
            $errors['service'] = "Invalid Date Format(yyyy-dd-mm)";
        }
    }

    if ($formdata['gID'] === NULL || $formdata['gID'] === FALSE || $formdata['gID'] === "") {//if the formdata  is null or false or empty the errors array will have the below error
        $errors['gID'] = "A bus is required to have a garage";
    }
}
