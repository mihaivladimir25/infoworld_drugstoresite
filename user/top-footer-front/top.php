<?php 

include('../config/constants.php'); 
include('login-check.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoWorld</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page">
    <div class="row">
        <div class="col-md-4">
            <ul class="navigation">
                <a href="index.php"><img src="../images/logo.png" alt=""></a>
            </ul>
        </div>
        <div class="col-md-8">
            <ul class="navigation">
                <li><a href="<?php echo SITEURL; ?>user/index.php" > Home </a></li>
                <li><a href="<?php echo SITEURL; ?>user/produse.php"> Produse </a></li>
                <li><a href="<?php echo SITEURL; ?>user/contact.php"  > Contact </a></li>
                <li><a href="<?php echo SITEURL; ?>user/logout.php"  > Logout </a></li>
            </ul>
        </div>
    </div>
</div>