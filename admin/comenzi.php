<?php include('top-footer/top.php'); ?>

<div class="container">
    <div class="wrapper">
        <h1>Comenzi</h1>

        <br><br><br>

        <?php 
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Produse</th>
                <th>Pret</th>
                <th>Cantitate</th>
                <th>Total</th>
                <th>Data comenzii</th>
                <th>Status</th>
                <th>Nume client</th>
                <th>Email</th>
                <th>Adresa</th>
                <th>Actiuni</th>
            </tr>

            <?php
                $sql = "SELECT * FROM comanda ORDER BY id DESC";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $produs = $row['produs'];
                        $pret = $row['pret'];
                        $cantitate = $row['cantitate'];
                        $total = $row['total'];
                        $data = $row['data'];
                        $status = $row['status'];
                        $nume_client = $row['nume_client'];
                        $email_client = $row['email_client'];
                        $adresa_client = $row['adresa_client'];
                                
                ?>

            <tr>
                <td><?php echo $sn++; ?>. </td>
                <td><?php echo $produs; ?></td>
                <td><?php echo $pret; ?></td>
                <td><?php echo $cantitate; ?></td>
                <td><?php echo $total; ?></td>
                <td><?php echo $data; ?></td>

                <td>
                    <?php 

                        if($status=="In asteptare")
                        {
                            echo "<label>$status</label>";
                        }
                        elseif($status=="Aprobata")
                        {
                            echo "<label style='color: orange;'>$status</label>";
                        }
                        elseif($status=="Respinsa")
                        {
                            echo "<label style='color: red;'>$status</label>";
                        }
                    ?>
                </td>

                <td><?php echo $nume_client; ?></td>
                <td><?php echo $email_client; ?></td>
                <td><?php echo $adresa_client; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/comenzi-editare.php?id=<?php echo $id; ?>" class="btn-secondary">Editati/Verificati</a>
                </td>
            </tr>

            <?php

                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='12' class='error'>Nu exista comenzi</td></tr>";
                    }
            ?>


        </table>
    </div>

</div>

<?php include('top-footer/footer.php'); ?>
