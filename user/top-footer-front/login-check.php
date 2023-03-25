<?php 

    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Va rugam sa va conectati pentru a face o comanda!</div>";
        header('location:'.SITEURL.'user/login.php');
    }

?>