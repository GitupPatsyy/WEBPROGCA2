<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 03/12/2015
 * Time: 1:24 PM
 */
function validate(&$formdata, &$errors) {

    //Set the input method for efficiency instead of changing all the variables
    $input_method = INPUT_POST;
    //Formdata array
    //Sanitizing data that is input to defeat the sql injection
    $formdata['garageName'] = filter_input($input_method, "garageName", FILTER_SANITIZE_STRING);
    $formdata['garageAdd'] = filter_input($input_method, "garageAdd", FILTER_SANITIZE_STRING);
    $formdata['phoneNo'] = filter_input($input_method, "phoneNo", FILTER_SANITIZE_STRING);
    $formdata['managerName'] = filter_input($input_method, "managerName", FILTER_SANITIZE_STRING);
    $formdata['managerEmail'] = filter_input($input_method, "managerEmail", FILTER_SANITIZE_STRING);
    $formdata['serviceDate'] = filter_input($input_method, "serviceDate", FILTER_SANITIZE_STRING);
    $formdata['garageURL'] = filter_input($input_method, "garageURL", FILTER_SANITIZE_STRING);
    $formdata['overnight'] = filter_input($input_method, "overnight", FILTER_SANITIZE_STRING);

    if ($formdata['garageName'] === NULL || $formdata['garageName'] === FALSE || $formdata['garageName'] === "") {
        $errors['garageName'] = "Garage Name is required to create a garage";
    }
    if ($formdata['garageAdd'] === NULL || $formdata['garageAdd'] === FALSE || $formdata['garageAdd'] === "") {
        $errors['garageAdd'] = "Garage Address is required to create a garage";
    }
    if ($formdata['phoneNo'] === NULL || $formdata['phoneNo'] === FALSE || $formdata['phoneNo'] === "") {
        $errors['phoneNo'] = "Phone Number is required to create a garage";
    }
    if ($formdata['managerName'] === NULL || $formdata['managerName'] === FALSE || $formdata['managerName'] === "") {
        $errors['managerName'] = "Manager Name is required to create a garage";
    }
    if ($formdata['managerEmail'] === NULL || $formdata['managerEmail'] === FALSE || $formdata['managerEmail'] === "") {
        $errors['managerEmail'] = "Manager Email is required to create a garage";
    }
    if ($formdata['serviceDate'] !== NULL || $formdata['serviceDate'] !== FALSE || $formdata['serviceDate'] !== "") {
        $date_array = explode('-', $formdata['serviceDate']);
        if (count($date_array) != 3 || !checkdate($date_array[2], $date_array[1], $date_array[0])) {
            $errors['serviceDate'] = "Invalid Date Format(yyyy/dd/mm)";
        }
    }
    if ($formdata['garageURL'] === NULL || $formdata['garageURL'] === NULL || $formdata['garageURL'] === "") {
        $errors['garageURL'] = "Garage URL is required to create a garage";
    }
}

//
//echo '<pre>';
//print_r($_POST);
////print_r($formdata);
//print_r($errors);
//echo '</pre>';


//if (empty($errors)) {
//    if($page == "edit"){
//    require 'editGarage.php';
//    }
//if(empty($errors)) {
//    require 'createGarage.php';
//    }
// else {
//    require 'viewall.php';
//}
