<?php include('top-footer/top.php'); ?>

<div class="container">
    <div class="wrapper">
        <br><br>

        <?php
        
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        
        ?>

        <form action="" method="POST">

            <table class="col-md-4">
                <tr>
                    <td>Parola actuala: </td>
                    <td>
                        <input type="password" name="parola_actuala">
                    </td>
                </tr>

                <tr>
                    <td>Parola Noua: </td>
                    <td>
                        <input type="password" name="parola_noua">
                    </td>
                </tr>

                <tr>
                    <td>Confirmati Parola: </td>
                    <td>
                        <input type="password" name="confirm_parola">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
        $id=$_POST['id'];
        $parola_actuala = $_POST['parola_actuala'];
        $parola_noua = $_POST['parola_noua'];
        $confirm_parola = $_POST['confirm_parola'];
    
        $sql="SELECT * FROM admin WHERE id=$id AND password='$parola_actuala'";
        
        $res = mysqli_query($conn, $sql);
        
        if($res == true)
        {
            $count = mysqli_num_rows($res);
            
            if($count == 1)
            {
                if($parola_noua==$confirm_parola)
                {
                    $sql2 = "UPDATE admin SET
                        password = '$parola_noua'
                        WHERE id=$id
                        ";
                    
                    $res = mysqli_query($conn, $sql2);
                    
                    if($res == true)
                    {
                        
                        $_SESSION['change-pwd'] = "<div class='succes'> Parola a fost schimbata. </div>";
                        header('location:'.SITEURL.'admin/admin.php');
                        
                    }
                }
                else
                {
                    $_SESSION['pwd-not-match'] = "<div class='error'> Parolele nu coincid. </div>";
                    header('location:'.SITEURL.'admin/admin.php');
                }
            }
            
            
        }
    
    }

?>

<?php include('top-footer/footer.php'); ?>
