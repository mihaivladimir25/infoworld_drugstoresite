<?php include('top-footer/top.php'); ?>


<div class="container">
    <div class="wrapper">
        <h1>Stergere</h1>
        <br>

        <?php
            
              if(isset($_SESSION['add']))
               {
                   echo $_SESSION['add'];
                   unset($_SESSION['add']);
               }
               
               if(isset($_SESSION['delete']))
               {
                   echo $_SESSION['delete'];
                   unset($_SESSION['delete']);
               }
            
            ?>
        <br><br>
        <br><br><br>
        <form method="post" action="stergere-selectii.php">
            <table class="tbl-full">
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>CNP</th>
                    <th>Adresa</th>
                    <th>Telefon</th>
                    <th>Email</th>
                </tr>

                <?php
                
                    $sql = "SELECT * FROM client";
                     
                    $res = mysqli_query($conn, $sql);
                
                if($res == TRUE)
                {
                    $count = mysqli_num_rows($res);
                    
                    $sn = 1;
                    
                    if($count > 0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id = $rows['id'];
                            $nume = $rows['nume'];
                            $prenume = $rows['prenume'];
                            $cnp = $rows['cnp'];
                            $adresa = $rows['adresa'];
                            $nr_telefon = $rows['nr_telefon'];
                            $email = $rows['email'];
                        ?>

                <tr>
                    <td><input type="checkbox" name="delete[]" value="<?php echo $rows['id']; ?>"></td>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $nume; ?></td>
                    <td><?php echo $prenume; ?></td>
                    <td><?php echo $cnp; ?></td>
                    <td><?php echo $adresa; ?></td>
                    <td><?php echo $nr_telefon; ?></td>
                    <td><?php echo $email; ?></td>
                </tr>


                <?php
                        }
                    }
                }
                ?>

            </table>

            <br><br><br><br>
            <table class="tbl-full">
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Denumire</th>
                    <th>Descriere</th>
                    <th>Gramaj</th>
                    <th>Imagine</th>
                    <th>Pret</th>
                    <th>Stoc</th>
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
                    <td><input type="checkbox" name="delete[]" value="<?php echo $rows['id']; ?>"></td>
                    <td><?php echo $sn++; ?>. </td>
                    <td><?php echo $denumire; ?></td>
                    <td><?php echo $descriere; ?></td>
                    <td><?php echo $gramaj; ?></td>
                    <td>
                        <?php
                            if($image_name=="")
                                {
                                    echo "<div class='error'>Imaginea nu a fost adaugata.</div>";
                                }
                                else
                                {
                        ?>
                        <img src="<?php echo SITEURL; ?>../images/produse/<?php echo $image_name; ?>" width="100px">
                        <?php
                                }
                            ?>
                    </td>
                    <td><?php echo $pret; ?></td>
                    <td><?php echo $stoc; ?></td>
                </tr>

                <?php
                            }
                        }
                        else
                        {
                            echo "<tr> <td colspan='7' class='error'> Nu au fost adaugate produse. </td> </tr>";
                        }

                    ?>
            </table>

            <button type="submit" name="submit" class="btn-primary">Stergeti selectiile</button>
        </form>
    </div>

</div>


<?php include('top-footer/footer.php'); ?>
