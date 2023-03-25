<?php

    include('../config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM admin WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res == true)
    {
        $_SESSION['delete'] = " <div class='succes'>Stergerea a fost realizata cu succes. </div>";
        header('location:'.SITEURL.'admin/admin.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>EROARE</div>";
        header('location:'.SITEURL.'admin/admin.php');
    }

    

?>