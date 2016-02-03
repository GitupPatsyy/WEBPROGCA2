
window.onload = function () {
    //Function for a valid date
    function isValidDateFormat(date) {
        var re = /^\d{4}\/\d{2}\/\d{2}$/;
        return re.test(date);
    }
//Function for the date to be for this year and for the future
    function isDate(date) {
        var parts = date.split("/");
        var day = parseInt(parts[1], 10);
        var month = parseInt(parts[2], 10);
        var year = parseInt(parts[0], 10);

        var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        if (year % 400 === 0 || (year % 100 !== 0 && year % 4 === 0)) {
            monthLength[2] = 29;
        }

        return(year >= 2015 && year <= 2150
                && month >= 1 && month <= 12 &&
                day >= 1 && day <= monthLength[month - 1]);

    }
//Regular expression for validating email
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

//Regular expression for validating URL
    function validateURL(url) {
        var re = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        return re.test(url);
    }


    var submitButton = document.getElementById('addgarage');

    submitButton.addEventListener("click", function (event) {

        //Correct will stay true while the JS validation has no errors
        var correct = true;

        //Getting the ID of The Span tags
        var addressErrorElement = document.getElementById("addresssError");
        var phoneErrorElement = document.getElementById("phoneError");
        var mannameErrorElement = document.getElementById("mnameError");
        var gnameErrorElement = document.getElementById("garagenameError");
        var dateErrorElement = document.getElementById("dateError");
        var emailErrorElement = document.getElementById("emailError");
        var urlErrorElement = document.getElementById("urlError");

        //Clearing previous validation errors if any
        addressErrorElement.innerHTML = "";
        phoneErrorElement.innerHTML = "";
        mannameErrorElement.innerHTML = "";
        gnameErrorElement.innerHTML = "";
        dateErrorElement.innerHTML = "";
        emailErrorElement.innerHTML = "";
        urlErrorElement.innerHTML = "";


        //Get references to inputs
        var addressField = document.getElementById('garageAdd');
        var phoneField = document.getElementById('phoneNo');
        var mnameField = document.getElementById('managerName');
        var gnameField = document.getElementById('garageName');
        var dateField = document.getElementById('serviceDate');
        var emailField = document.getElementById('manEmail');
        var urlField = document.getElementById('gURL');

        //Retrieve the input from the respective fields
        var address = addressField.value;
        var phone = phoneField.value;
        var managername = mnameField.value;
        var garagename = gnameField.value;
        var sdate = dateField.value;
        var memail = emailField.value;
        var gurl = urlField.value;

        //ALL FIELDS ARE REQUIRED
        //Address is required
        if (address === "") {
            addressErrorElement.innerHTML = "A Garage address is required";
            correct = false;
        }

        //Phone No is required
        if (phone === "") {
            phoneErrorElement.innerHTML = "A Phone number is required to create a garage";
            correct = false;
        }

        //Manager Name is Required
        if (managername === "") {
            mannameErrorElement.innerHTML = "A Manager is required to create a garage";
            correct = false;
        }

        //Garage Name is Required
        if (garagename === "") {
            gnameErrorElement.innerHTML = "A Name for the Garage is required to create a garage";
            correct = false;
        }

//        //Date Is Required but needs to be in the future
        if (sdate !== "" && !isValidDateFormat(sdate)) {
            dateErrorElement.innerHTML = "Format = (yyyy/dd/mm)";
            correct = false;
        }
        else if (sdate !== "" && !isDate(sdate)) {
            dateErrorElement.innerHTML = "Service Date must be in the future";
            correct = false;
        }

        //Email must have a required format
        if (memail !== "" && !validateEmail(memail)) {
            emailErrorElement.innerHTML = "Email format required";
            correct = false;
        }
        //URL format is required
        if (gurl !== "" && !validateURL(gurl)) {
            urlErrorElement.innerHTML = "We must be able to view your stuff";
            correct = false;
        }



        //If there are some JS validatin errors the form will not submit
        if (!correct) {
            event.preventDefault();
        }



    });


};


