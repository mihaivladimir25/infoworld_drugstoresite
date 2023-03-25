<?php include('top-footer/top.php'); ?>

<div class="container">
    <div class="wrapper">
        <h1>Clienti</h1>
        <br>

        <section class="clienti-cautare text-center">
            <div class="container">

                <form action="<?php echo SITEURL; ?>admin/client-cautare.php" method="POST">
                    <input type="search" name="search" required>
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
                </form>

            </div>
        </section>


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
        <a href="client-adaugare.php" class="btn-primary">Adaugati Client</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Nume Utilizator</th>
                <th>Parola</th>
                <th>CNP</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Actiuni </th>
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
                            $username = $rows['username'];
                            $password = $rows['password'];
                            $cnp = $rows['cnp'];
                            $adresa = $rows['adresa'];
                            $nr_telefon = $rows['nr_telefon'];
                            $email = $rows['email'];
                        ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nume; ?></td>
                <td><?php echo $prenume; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $cnp; ?></td>
                <td><?php echo $adresa; ?></td>
                <td><?php echo $nr_telefon; ?></td>
                <td><?php echo $email; ?></td>

                <td>
                    <a href="<?php echo SITEURL; ?>admin/client-editare.php?id=<?php echo $id; ?>" class="btn-secondary">Editati Client</a>
                    <a href="<?php echo SITEURL; ?>admin/client-stergere.php?id=<?php echo $id; ?>" class="btn-secondary">Stergere Client</a>
                </td>
            </tr>


            <?php
                        }
                    }
                }
                ?>

        </table>
    </div>
</div>

<?php include('top-footer/footer.php'); ?>
