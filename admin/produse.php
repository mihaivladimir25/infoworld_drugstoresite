<?php include('top-footer/top.php'); ?>

<div class="container">
    <div class="wrapper">
        <h1>Produse</h1>

        <br /><br />

        <a href="<?php echo SITEURL; ?>admin/produse-adaugare.php" class="btn-primary">Adaugati Produse</a>

        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Denumire</th>
                <th>Descriere</th>
                <th>Gramaj</th>
                <th>Imagine</th>
                <th>Pret</th>
                <th>Stoc</th>
                <th>Actiuni</th>
            </tr>

            <?php
                $sql = "SELECT * FROM produse";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn=1;

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $denumire = $row['denumire'];
                        $descriere = $row['descriere'];
                        $gramaj = $row['gramaj'];
                        $image_name = $row['image_name'];
                        $pret = $row['pret'];
                        $stoc = $row['stoc'];
                        ?>

            <tr>
                <td><?php echo $sn++; ?>. </td>
                <td><?php echo $denumire; ?></td>
                <td><?php echo $descriere; ?></td>
                <td><?php echo $gramaj; ?></td>
                <td>
                    <?php
                        if($image_name=="")
                        {
                            echo "<div class='error'>Imagine lipsa.</div>";
                        }
                        else
                        {
                    ?>
                    <img src="<?php echo SITEURL; ?>images/produse/<?php echo $image_name; ?>" width="100px">
                    <?php
                        }
                    ?>
                </td>
                <td><?php echo $pret; ?></td>
                <td><?php echo $stoc; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/produse-editare.php?id=<?php echo $id; ?>" class="btn-secondary">Editare</a>
                    <a href="<?php echo SITEURL; ?>admin/produse-stergere.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Sterge</a>
                </td>
            </tr>

            <?php
                        }
                    }
                    else
                    {
                        echo "<tr> <td colspan='7' class='error'> Nu exista produse adaugate. </td> </tr>";
                    }

            ?>


        </table>
    </div>

</div>

<?php include('top-footer/footer.php'); ?>
