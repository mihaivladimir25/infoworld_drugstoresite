<?php

include('../config/constants.php');

if(isset($_POST['submit'])) {
  if(!empty($_POST['delete'])) {
    $selected_rows = $_POST['delete'];
    foreach ($selected_rows as $selected_id) {
      $sql = "DELETE FROM client WHERE id = $selected_id";
      mysqli_query($conn, $sql);
      
      $sql = "DELETE FROM produse WHERE id = $selected_id";
      mysqli_query($conn, $sql);
    }
    
    $_SESSION['delete'] = "Stergerea s-a realizat cu succes!";
    header('location: stergere.php');
  }
  else {
    $_SESSION['delete'] = "Va rugam sa selectati cel putin o inregistrare pentru a fi stearsa!";
    header('location: stergere.php');
  }
}
?>