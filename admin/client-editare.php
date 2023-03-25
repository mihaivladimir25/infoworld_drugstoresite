<?php include('top-footer/top.php'); ?>


<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        
        $sql2 = "SELECT * FROM client WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);
        
        $row2 = mysqli_fetch_assoc($res2);
        $nume = $row2['nume'];
        $prenume = $row2['prenume'];
        $username = $row2['username'];
        $password = $row2['password'];
        $cnp = $row2['cnp'];
        $adresa = $row2['adresa'];
        $nr_telefon = $row2['nr_telefon'];
        $email = $row2['email'];
    }
    else
    {
        header('location:'.SITEURL.'admin/client.php');
    }
?>

<div class="container">
    <div class="wrapper">
        <h1>Editare Client</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Nume: </td>
                <td>
                    <input type="text" name="nume" value="<?php echo $nume; ?>">
                </td>
            </tr>

            <tr>
                <td>Prenume: </td>
                <td>
                    <input type="text" name="prenume" value="<?php echo $prenume; ?>">
                </td>
            </tr>

            <tr>
                <td>Nume Utilizator: </td>
                <td>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>

            <tr>
                <td>Parola: </td>
                <td>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                </td>
            </tr>

            <tr>
                <td>CNP: </td>
                <td>
                    <input type="text" name="cnp" pattern="[0-9]{13}" required"<?php echo $cnp; ?>">
                </td>
            </tr>

            <tr>
                <td>Adresa: </td>
                <td>
                    <input type="text" name="adresa" value="<?php echo $adresa; ?>">
                </td>
            </tr>

            <tr>
                <td>Numar Telefon: </td>
                <td>
                    <input type="text" name="nr_telefon" pattern="[0-9]{10}" required value="<?php echo $nr_telefon; ?>">
                </td>
            </tr>
            
            <tr>
                <td>Email: </td>
                <td>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <input type="submit" name="submit" value="Update Client" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $nume = $_POST['nume'];
                $prenume = $_POST['prenume'];
                $cnp = $_POST['cnp'];
                $adresa = $_POST['adresa'];
                $nr_telefon = $_POST['nr_telefon'];
                $email = $_POST['email'];

                $sql3 = "UPDATE client SET 
                    nume = '$nume',
                    prenume = '$prenume',
                    cnp = $cnp,
                    adresa = '$adresa',
                    nr_telefon = '$nr_telefon',
                    email = '$email'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>Clientul a fost editat cu succes.</div>";
                    header('location:'.SITEURL.'admin/client.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>EROARE</div>";
                    header('location:'.SITEURL.'admin/client.php');
                }   
            }
        ?>

    </div>
</div>

<?php include('top-footer/footer.php'); ?>
