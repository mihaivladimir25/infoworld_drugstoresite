<?php 

    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Va rugam sa va conectati.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }

?>