<ul>
    <?php
    require_once 'utilities/functions.php';
    
    echo '<li><a href"home.php">Tour Bus Massacre</a></li>';
    if (!is_logged_in()){
        echo '<li><a href="login_form.php">Login</a></li>';
    }
    else {
        echo '<li><a href="landing.php">Home</a></li>';
    }
    
    
    ?>
    
    
</ul>

