<?php include('top-footer/top.php'); ?>

<?php  
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM produse WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);
        $denumire = $row2['denumire'];
        $descriere = $row2['descriere'];
        $gramaj = $row2['gramaj'];
        $current_image = $row2['image_name'];
        $pret = $row2['pret'];
        $stoc = $row2['stoc'];

    }
    else
    {
        header('location:'.SITEURL.'admin/produse.php');
    }
?>


<div class="container">
    <div class="wrapper">
        <h1>Editati Produsele</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Denumire: </td>
                    <td>
                        <input type="text" name="denumire" value="<?php echo $denumire; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Descriere: </td>
                    <td>
                        <textarea name="descriere" cols="30" rows="10"><?php echo $descriere; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Gramaj: </td>
                    <td>
                        <input type="number" name="gramaj" value="<?php echo $gramaj; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Imagine Curenta: </td>
                    <td>
                        <?php 
                        if($current_image == "")
                        {
                            echo "<div class='error'>Imaginea nu este disponibila.</div>";
                        }
                        else
                        {
                            ?>
                        <img src="<?php echo SITEURL; ?>../images/produse/<?php echo $current_image; ?>" width="150px">
                        <?php
                        }
                    ?>
                    </td>
                </tr>

                <tr>
                    <td>Selectati o imagine noua: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Pret: </td>
                    <td>
                        <input type="number" name="pret" value="<?php echo $pret; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Stoc: </td>
                    <td>
                        <input type="number" name="stoc" value="<?php echo $stoc; ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type="submit" name="submit" value="Submit" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $denumire = $_POST['denumire'];
                $descriere = $_POST['descriere'];
                $gramaj = $_POST['gramaj'];
                $current_image = $_POST['current_image'];
                $pret = $_POST['pret'];
                $stoc = $_POST['stoc'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Produs-".rand(0000, 9999).'.'.$ext;
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../images/produse/".$image_name;
                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Imaginea nu a fost schimbata.</div>";
                            header('location:'.SITEURL.'admin/produse.php');
                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path = "../images/produse/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                $_SESSION['remove-failed'] = "<div class='error'>Imaginea veche nu a fost stearsa.</div>";
                                header('location:'.SITEURL.'admin/produse.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                $sql3 = "UPDATE produse SET 
                    denumire = '$denumire',
                    descriere = '$descriere',
                    gramaj = '$gramaj',
                    image_name = '$image_name',
                    pret = '$pret',
                    stoc = '$stoc'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>Produsul a fost editat.</div>";
                    header('location:'.SITEURL.'admin/produse.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Produsul nu a fost editat.</div>";
                    header('location:'.SITEURL.'admin/produse.php');
                }

                
            }
        
        ?>

    </div>
</div>

<?php include('top-footer/footer.php'); ?>
