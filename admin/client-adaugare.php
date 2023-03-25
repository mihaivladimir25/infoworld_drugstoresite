<?php include('top-footer/top.php'); ?>

<div class="container">
    <div class="wrapper">
        <h1>Adaugati Client</h1>
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
                    <td>Prenume: </td>
                    <td>
                    <input type="text" name="prenume">
                    </td>
                </tr>
                
                <tr>
                    <td>CNP: </td>
                    <td>
                    <input type="text" name="cnp" pattern="[0-9]{13}" required>
                    </td>
                </tr>
                
                <tr>
                    <td>Adresa: </td>
                    <td>
                        <input type="text" name="adresa">
                    </td>
                </tr>
                
                <tr>
                    <td>Numar Telefon: </td>
                    <td>
                        <input type="text" name="nr_telefon" pattern="[0-9]{10}" required>
                    </td>
                </tr>
                
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" id="email" name="email">
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
        $prenume = $_POST['prenume'];
        $cnp = $_POST['cnp'];
        $adresa = $_POST['adresa'];
        $nr_telefon = $_POST['nr_telefon'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
       $sql = "INSERT INTO client SET
            nume='$nume',
            prenume='$prenume',
            cnp='$cnp',            
            adresa='$adresa',            
            nr_telefon='$nr_telefon',            
            email='$email',           
            username='$username',           
            password='$password'           
       ";
        
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        if($res == TRUE)
        {

        $_SESSION['add'] = "Clientul a fost adaugat";
        header("location:".SITEURL.'admin/client.php');
            
        }
        else   
        {
            
        $_SESSION['add'] = "EROARE";
        header("location:".SITEURL.'admin/client-adaugare.php');
        
        }
    }
?>


<?php include('top-footer/footer.php'); ?>