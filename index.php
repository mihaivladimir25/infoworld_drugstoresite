<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoWorld</title>

    <link rel="stylesheet" href="user/css/style.css">
</head>

<body>
    <div class="page">
        <div class="row">
            <div class="col-md-4">
                <ul class="navigation">
                    <a href="index.php"><img src="images/logo.png" alt=""></a>
                </ul>
            </div>
            <div class="col-md-8">
                <ul class="navigation">
                    <li><a href="<?php echo SITEURL; ?>user/index.php"> Home </a></li>
                    <li><a href="<?php echo SITEURL; ?>user/produse.php"> Produse </a></li>
                    <li><a href="<?php echo SITEURL; ?>user/contact.php"> Contact </a></li>
                    <li><a href="<?php echo SITEURL; ?>user/login.php"> Login </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="slide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="images/infoworld1.png" class="medic" alt="" id="medic">
                    <script>
                        let medic = document.getElementById('medic');

                        function on() {
                            medic.src = "images/infoworld1.png"
                        }

                        function off() {
                            medic.src = "images/infoworld2.png"
                        }

                        medic.addEventListener('mouseover', on);
                        medic.addEventListener('click', off);

                    </script>
                </div>
<br><br><br>
                
<div class="produse-prezentare">
        <?php
        
        $sql = "SELECT * FROM produse ORDER BY RAND() LIMIT 6";
        
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
                
                <br><br><br>

                <div class="icon">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="titlu">
                                <img src="images/cafea.jpg" alt="">



                                <p><b>In ce conditii nu ne afecteaza inima consumul de cafea?</b></p>
                                <p> Potrivit studiilor pe care le-au făcut, consumul de cafea nu afectează bătăile regulate ale inimii, cu o condiție: să nu se consume mai mult de o ceașcă pe zi.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="titlu">
                                <img src="images/farmacie.png" alt="">



                                <p><b>A inceput vaccinarea antrigripala!</b></p>
                                <p>Incepand de astazi, vaccinarea impotriva gripei este posibila in farmaciile din Romania autorizate de Ministerul Sanatatii in cadrul unui program pilot.</p>


                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="titlu">
                                <img src="images/alimente.jpg" alt="">


                                <p><b>Alimente care ajuta memoria si sanatatea creierului!</b></p>
                                <p>Alimentele pe care le consumam pot avea un impact mare asupra structurii si sanatatii creierului nostru. </p>
                            </div>
                        </div>

                    </div>
                </div>


<?php include('user/top-footer-front/footer.php'); ?>
