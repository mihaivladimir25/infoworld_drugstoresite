<?php include('top-footer/top.php'); ?>

<div class="container">
    <div class="wrapper">
        <h1>Adaugati Admin</h1>
        <br><br>

        <?php
               if(isset($_SESSION['add']))
               {
                   echo $_SESSION['add'];
                   unset($_SESSION['add']);
               }
            ?>

        <form action="" method="POST">
            <table class="page">
                <tr>
                    <td>Nume: </td>
                    <td>
                        <input type="text" name="nume">
                    </td>
                </tr>

                <tr>
                    <td>Nume Utilizator: </td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>

                <tr>
                    <td>Parola: </td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['submit']))
    {
       $nume = $_POST['nume'];
       $username = $_POST['username'];
       $password = $_POST['password'];
        
       $sql = "INSERT INTO admin SET
            nume='$nume',
            username='$username',
            password='$password'            
       ";
        
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        if($res == TRUE)
        {

        $_SESSION['add'] = "Admin a fost adaugat";
        header("location:".SITEURL.'admin/admin.php');
            
        }
        else   
        {
            
        $_SESSION['add'] = "EROARE";
        header("location:".SITEURL.'admin/admin-adaugare.php');
        
        }
        
        
    }

?>


<?php include('top-footer/footer.php'); ?>
