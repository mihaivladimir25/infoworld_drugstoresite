<?php include('top-footer-front/top.php'); ?>

<?php 

        if(isset($_GET['produse_id']))
        {
            $produse_id = $_GET['produse_id'];
            
            $sql = "SELECT * FROM produse WHERE id=$produse_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);

                $denumire = $row['denumire'];
                $pret = $row['pret'];
                $image_name = $row['image_name'];
            }
            else
            {
                header('location:'.SITEURL);
            }
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>

<div class="produse-comanda">

        <form action="" method="POST" class="comanda">
            <fieldset>
                <legend>Produse selectate: </legend>

                <div class="produse-img">
                    <?php 

                        if($image_name=="")
                        {
                            echo "<div class='error'>Imaginea nu a fost valabila.</div>";
                        }
                        else
                        {
                    ?>
                    <img src="<?php echo SITEURL; ?>../images/produse/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                    <?php
                        }
                        
                    ?>

                </div>

                <div class="produse-desc">
                    <h3><?php echo $denumire; ?></h3>
                    <input type="hidden" name="produs" value="<?php echo $denumire; ?>">

                    <p class="produs-pret">Lei <?php echo $pret; ?></p>
                    <input type="hidden" name="pret" value="<?php echo $pret; ?>">

                    <div class="comanda">Cantitate</div>
                    <input type="number" name="cantitate" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Detalii livrare</legend>
                <div class="comanda">Nume Complet</div>
                <input type="text" name="nume_client" class="input-responsive" required>

                <div class="comanda">Numar de telefon</div>
                <input type="text" name="nr_telefon" pattern="[0-9]{10}" required>

                <div class="comanda">Email</div>
                <input type="email" name="email_client" placeholder="" class="input-responsive" required>

                <div class="comanda">Adresa</div>
                <textarea name="adresa_client" rows="10" placeholder="" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
            </fieldset>

        </form>

        <?php 

                if(isset($_POST['submit']))
                {

                    $produs = $_POST['produs'];
                    $pret = $_POST['pret'];
                    $cantitate = $_POST['cantitate'];

                    $total = $pret * $cantitate;

                    $data = date("Y-m-d h:i:sa");

                    $status = "In asteptare";

                    $nume_client = $_POST['nume_client'];
                    $email_client = $_POST['email_client'];
                    $adresa_client = $_POST['adresa_client'];


                    $sql2 = "INSERT INTO comanda SET 
                        produs = '$produs',
                        pret = $pret,
                        cantitate = $cantitate,
                        total = $total,
                        data = '$data',
                        status = '$status',
                        nume_client = '$nume_client',
                        email_client = '$email_client',
                        adresa_client = '$adresa_client'
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['order'] = "<div class='success text-center'>Comanda a fost plasata cu succes.</div>";
                        header('location:'.SITEURL.'user/index.php');
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>Comanda nu a fost plasata.</div>";
                        header('location:'.SITEURL.'user/index.php');
                    }

                }
            
            ?>

</div>

<?php include('top-footer-front/footer.php'); ?>
