<?php include('top-footer/top.php'); ?>

<div class="dashboard">
    <div class="row">
        <br><br>

        <div class="col-md-4 text-center">

            <?php
                $sql = "SELECT * FROM produse";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>

            <h1><?php echo $count; ?></h1>
            <br />
            Produse
        </div>

        <div class="col-md-4 text-center">

            <?php 
                $sql2 = "SELECT * FROM client";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Clienti
        </div>

        <div class="col-md-4 text-center">

            <?php
                $sql3 = "SELECT * FROM comanda";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Comenzi
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php include('top-footer/footer.php'); ?>
