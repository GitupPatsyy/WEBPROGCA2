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
        <div class="container-fluid">
            <!--gets rid of the border radiuse around the jumbotron-->
            <div class="row">
                <?php require 'utilities/header.php'; ?>
            </div>
            <div class="row page-header home_content">
                <!--opening form-->        <br>
                <hr>
                <h4 class="center-content">Login</h4>
                <hr>

                <form  action="login.php" method="POST" class="col-lg-push-2 col-lg-8 col-lg-pull-2">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" value="<?php if (isset($formdata['username'])) echo $formdata['username']; ?>" />
                        <span class="errors">
                            <!--errors for username will come in here-->
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password"  class="form-control" name="password" value="<?php if (isset($formdata['password'])) echo $formdata['password']; ?>" />
                        <span class="errors">
                            <!--errors will output here-->
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="submit"  
                               class="form-control btn btn-success" 
                               value="Login">

                    </div>
                </form>
                <!--closing form-->
                <p><a href="register_form.php" class="btn btn-info">Register Here</a></p>
            </div>
            <!--closing row-->
        </div>
        <?php require 'utilities/footer.php'; ?>
    </body>
</html>
