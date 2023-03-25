<?php include('top-footer-front/top.php'); ?>

<?php

    if(isset($_SESSION['comanda']))
    {
        echo $_SESSION['comanda'];
        unset($_SESSION['comanda']);
    }

?>
<br><br><br>

<div class="produse-prezentare">
        <?php
        
        $sql = "SELECT * FROM produse";
        
        $res = mysqli_query($conn, $sql);
        
        $count = mysqli_num_rows($res);
        
        if($count > 0)
        {
             while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $denumire = $row['denumire'];
                    $descriere = $row['descriere'];
                    $gramaj = $row['gramaj'];
                    $image_name = $row['image_name'];
                    $pret = $row['pret'];
        ?>

        <div class="produse-prezentare-shop">
            <div class="produse-prezentare-img">
                <?php 
                    if($image_name=="")
                    {
                        echo "<div class='error'>Eroare Imagine.</div>";
                    }
                    else
                    {
                    ?>
                <img src="<?php echo SITEURL; ?>images/produse/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                <?php
                    }
                ?>

            </div>

            <div class="produse-prezentare-desc">
                <h4><?php echo $denumire; ?></h4>
                <p class="produse-pret">Lei <?php echo $pret; ?></p>
                <p class="produse-detalii">
                    <?php echo $descriere; ?>
                </p>
                <br>

                <a href="<?php echo SITEURL; ?>user/comanda.php?produse_id=<?php echo $id; ?>" class="btn btn-primary">Cumpara</a>
            </div>
        </div>

        <?php
                }
            }
            
            ?>

</div>

<?php include('top-footer-front/footer.php'); ?>
