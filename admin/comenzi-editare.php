<?php include('top-footer/top.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Editare Comanda</h1>
        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];

                $sql = "SELECT * FROM comanda WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $produs = $row['produs'];
                    $pret = $row['pret'];
                    $cantitate = $row['cantitate'];
                    $status = $row['status'];
                    $nume_client = $row['nume_client'];
                    $email_client = $row['email_client'];
                    $adresa_client= $row['adresa_client'];
                    
                    $sql2 = "SELECT stoc FROM produse WHERE denumire='$produs'";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $stoc = $row2['stoc'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/comanda.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/comanda.php');
            }
        
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Produs</td>
                    <td><b> <?php echo $produs; ?> </b></td>
                </tr>

                <tr>
                    <td>Pret</td>
                    <td>
                        <b> <?php echo $pret; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Cantitate</td>
                    <td>
                        <input type="number" name="cantitate" value="<?php echo $cantitate; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <button type="button" onclick="verificareStoc()">Verificare Stoc</button>
                        <span id="statusMsg"></span>
                        <br><br>
                        <select name="status">
                            <option <?php if($status=="In asteptare"){echo "selected";} ?> value="In asteptare">In asteptare</option>
                            <option <?php if($status=="Aprobata"){echo "selected";} ?> value="Aprobata">Aprobata</option>
                            <option <?php if($status=="Respinsa"){echo "selected";} ?> value="Respinsa">Respinsa</option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td>Nume: </td>
                    <td>
                        <input type="text" name="nume_client" value="<?php echo $nume_client; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email_client" value="<?php echo $email_client; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Adresa: </td>
                    <td>
                        <textarea name="adresa_client" cols="30" rows="5"><?php echo $adresa_client; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="pret" value="<?php echo $pret; ?>">

                        <input type="submit" name="submit" value="Editati" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>



        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $pret = $_POST['pret'];
                $cantitate = $_POST['cantitate'];

                $total = $pret * $cantitate;

                $status = $_POST['status'];

                $nume_client = $_POST['nume_client'];
                $email_client = $_POST['email_client'];
                $adresa_client = $_POST['adresa_client'];

                $sql2 = "UPDATE comanda SET 
                cantitate = $cantitate,
                total = $total,
                status = '$status',
                nume_client = '$nume_client',
                email_client = '$email_client',
                adresa_client = '$adresa_client'
                WHERE id=$id
                ";
                
                $sql3 = "UPDATE produse SET stoc = $stoc WHERE denumire=$produs";

                $res2 = mysqli_query($conn, $sql2);
                
                $res3 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>SUCCES.</div>";
                    header('location:'.SITEURL.'admin/comenzi.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>EROARE.</div>";
                    header('location:'.SITEURL.'admin/comenzi.php');
                }
            }
        ?>


    </div>
</div>

<script>
    function verificareStoc() {
        var cantitate = <?php echo $cantitate; ?>;
        var stoc = <?php echo $stoc; ?>;
        var status = "<?php echo $status; ?>";

        if (cantitate > stoc) {
            statusMsg.innerHTML = "Stoc insuficient";
        } else {
            statusMsg.innerHTML = "Stoc valabil";
            <?php

                $stoc = $stoc - $cantitate;
            
            ?>
        }
    }

</script>


<?php include('top-footer/footer.php'); ?>
