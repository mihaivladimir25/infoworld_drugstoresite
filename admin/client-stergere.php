<?php

include('../config/constants.php');

$id = $_GET['id'];
$sql = "DELETE FROM client WHERE id=$id";
$res = mysqli_query($conn, $sql);

if($res == true)
{
    $_SESSION['delete'] = "<div class='succes'> Clientul a fost sters. </div>";
    header('location:'.SITEURL.'admin/client.php');
}
else
{
    $_SESSION['delete'] = "<div class='error'> EROARE </div>";
    header('location:'.SITEURL.'admin/client.php');
}

?>