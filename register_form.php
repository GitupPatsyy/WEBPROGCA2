<!DOCTYPE HTML >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register Form</title>
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php require 'utilities/header.php'; ?>
            <?php
            if (isset($errorMessage))
                echo "<p>$errorMessage</p>";
            ?>

            <div class="row home_content">
                <hr>
                <h4 class="center-content">Register Form</h4>
                <hr>
                <form action="register.php" method="POST" class="col-lg-push-2 col-lg-8 col-lg-pull-2">
                    <div class="form-group">
                        <br>
                        <label for="username">Username: </label>
                        <input type="text"
                               id="username"
                               name="username"
                               class="form-control"
                               value="<?php if (isset($username)) echo $username; ?>"
                               />
                        <span class="error">
                            <?php if (isset($errors['username'])) echo $errors['username']; ?>
                        </span>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               value=""
                               />
                        <span class="error">
                            <?php if (isset($errors['password'])) echo $errors['password']; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword">Password: </label>
                        <input type="password"
                               id="confirmpassword"
                               name="confirmpassword"
                               class="form-control"
                               value=""
                               />
                        <span class="error">
                            <?php if (isset($errors['confirmpassword'])) echo $errors['confirmpassword']; ?>
                        </span>
                    </div>
                    <br/>
                    <input type="submit" 
                           class="form-contro btn btn-info"
                           value="Register"
                           />
                    <p><a href="login_form.php" class="btn btn-default">Login</a></p>
                </form>
            </div>
        </div><!--Closing container-->
        <?php require 'utilities/footer.php'; ?>
    </body>
</html>

