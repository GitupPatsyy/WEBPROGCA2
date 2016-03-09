<!DOCTYPE HTML >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register Form</title>
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>
    </head>
    <body>
        <div class="row header_style">
            <?php require 'utilities/header.php'; ?>
            <?php require 'utilities/toolbar.php'; ?>
        </div>
        <?php
        if (isset($errorMessage))
            echo "<p>$errorMessage</p>";
        ?>
        <div class="container">
            <form action="register.php" method="POST">
                <div class="form-group">
                    <br>
                    <label for="username">Username: </label>
                    <input type="text"
                           id="username"
                           name="username"
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
                           value=""
                           />
                    <span class="error">
                        <?php if (isset($errors['confirmpassword'])) echo $errors['confirmpassword']; ?>
                    </span>
                </div>
                <br/>
                <input type="submit" value="Register" />
                <p><a href="login_form.php">Login</a></p>
            </form>
        </div><!--Closing container-->
        <?php require 'utilities/footer.php'; ?>
    </body>
</html>

