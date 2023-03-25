<?php 

    include('../config/constants.php'); 
    include('login-check.php');

?> 
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InfoWorld - Admin</title>
    
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="produse.php">Produse</a></li>
                    <li><a href="comenzi.php">Comenzi</a></li>
                    <li><a href="client.php">Clienti</a></li>
                    <li><a href="stergere.php">Stergere</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
