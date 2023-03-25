<?php include('top-footer/top.php'); ?>

<section class="client-cautare text-center">
    <div class="container">
        <?php 
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>
        <h2>Clothes on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>

<table class="tbl-full">
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Nume Utilizator</th>
        <th>Parola</th>
        <th>CNP</th>
        <th>Telefon</th>
        <th>Adresa</th>
        <th>Email</th>
        <th>Actiuni: </th>
    </tr>
    
<?php
    
    $sql = "SELECT * FROM client WHERE nume LIKE '%$search%' OR prenume LIKE '%$search%' OR cnp LIKE '%$search%'";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE)
    {
        $count = mysqli_num_rows($res);
                    
        $sn = 1;
                    
        if($count > 0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
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

<?php include('top-footer/footer.php'); ?>
