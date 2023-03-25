<?php
    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/produse/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Imaginea nu a putut fi stearsa.</div>";
                header('location:'.SITEURL.'admin/produse.php');
                die();
            }

        }
        
        $sql = "DELETE FROM produse WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Produsul a fost sters.</div>";
            header('location:'.SITEURL.'admin/produse.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Produsul nu a fost sters.</div>";
            header('location:'.SITEURL.'admin/produse.php');
        }

        

    }

?>
