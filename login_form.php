<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
        <!--all styles and scripts will be contained in these php scripts-->
        <?php require 'utilities/styles.php'; ?>
        <?php require 'utilities/scripts.php'; ?>
        
    </head>
    <body>
        <div class="row">
                <?php require 'utilities/header.php'; ?>
                <?php require 'utilities/toolbar.php'; ?>
        </div>
        <div class="container">
            <div class="row col-lg-offset-4 col-lg-6">
                <!--opening form-->
                <form  action="login.php" method="POST">
                    <input type="text" name="username" value="<?php if (isset($formdata['username'])) echo $formdata['username']; ?>" />
                    <span class="errors">
                        <!--errors for username will come in here-->
                    </span>

                    <input type="password" name="password" value="<?php if (isset($formdata['password'])) echo $formdata['password']; ?>" />
                    <span class="errors">
                        <!--errors will output here-->
                    </span>

                    <input type="submit" value="Login">


                </form>
                <!--closing form-->
                <p><a href="register_form.php">Register Here</a></p>
            </div>
            <!--closing row-->
        </div>
        <?php require 'utilities/footer.php'; ?>
    </body>
</html>
