    <?php include('top-footer/top.php'); ?>

    <div class="container">
        <div class="wrapper">
            <h1>Admini</h1>
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
               
               if(isset($_SESSION['pwd-not-match']))
               {
                   echo $_SESSION['pwd-not-match'];
                   unset($_SESSION['pwd-not-match']);
               }
               
               if(isset($_SESSION['change-pwd']))
               {
                   echo $_SESSION['change-pwd'];
                   unset($_SESSION['change-pwd']);
               }
               
            ?>

            <br><br>

            <a href="admin-adaugare.php" class="btn-primary">Adaugati admin</a>
            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Nume</th>
                    <th>Nume Utilizator</th>
                    <th>Actiuni</th>
                </tr>

                <?php
                        
                    $sql = "SELECT * FROM admin";
                     
                    $res = mysqli_query($conn, $sql);
                        
                    if($res == TRUE)
                    {
                            
                        $count = mysqli_num_rows($res);
                            
                        $sn=1;
                            
                        if($count>0)
                        {
                                
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id=$rows['id'];
                                $nume=$rows['nume'];
                                $username=$rows['username'];
                                
                ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $nume; ?></td>
                    <td><?php echo $username; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/admin-parola.php?id=<?php echo $id; ?>" class="btn-primary">Schimbare Parola</a>
                        <a href="<?php echo SITEURL; ?>admin/admin-stergere.php?id=<?php echo $id; ?>" class="btn-danger">Stergere Admin</a>
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
