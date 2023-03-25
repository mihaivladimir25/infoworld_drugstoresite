<?php 

include('../config/constants.php');

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
    <div class="register">
        <h1 class="text-center">Inregistrati-va</h1>
        <br><br>

        <?php
               if(isset($_SESSION['add']))
               {
                   echo $_SESSION['add'];
                   unset($_SESSION['add']);
               }
            ?>

        <form action="" method="POST" class="text-center">
            Nume:<br>
            <input type="text" name="nume"><br><br>

            Prenume: <br>
            <input type="text" name="prenume"><br><br>

            Nume Utilizator: <br>
            <input type="text" name="username"><br><br>

            Parola: <br>
            <input type="password" name="password"><br><br>

            CNP: <br>
            <input type="text" name="cnp" pattern="[0-9]{13}" required><br><br>

            Adresa: <br>
            <input type="text" name="adresa"><br><br>

            Numar Telefon: <br>
            <input type="text" name="nr_telefon" pattern="[0-9]{10}" required><br><br>

            Email: <br>
            <input type="email" id="email" name="email"><br><br>

            <input type="submit" name="submit" value="Submit" class="btn-primary">
        </form>
    </div>

    <?php

    if(isset($_POST['submit']))
    {
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cnp = $_POST['cnp'];
        $adresa = $_POST['adresa'];
        $nr_telefon = $_POST['nr_telefon'];
        $email = $_POST['email'];
        
       $sql = "INSERT INTO client SET
            nume='$nume',
            prenume='$prenume',
            username='$username',
            password='$password', 
            cnp='$cnp',            
            adresa='$adresa',            
            nr_telefon='$nr_telefon',            
            email='$email'           
       ";
        
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        if($res == TRUE)
        {

        $_SESSION['add'] = "Clientul a fost adaugat";
        header("location:".SITEURL.'user/index.php');
            
        }
        else   
        {
            
        $_SESSION['add'] = "EROARE";
        header("location:".SITEURL.'user/index.php');
        
        }
    }
?>
