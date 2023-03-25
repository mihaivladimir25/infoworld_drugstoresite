<?php include('top-footer/top.php'); ?>

<div class="container">
    <div class="wrapper">
        <h1>Adaugati Produse: </h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Denumire: </td>
                    <td>
                        <input type="text" name="denumire">
                    </td>
                </tr>

                <tr>
                    <td>Descriere: </td>
                    <td>
                        <textarea name="descriere" cols="30" rows="10"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Gramaj: </td>
                    <td>
                        <input type="number" name="gramaj">
                    </td>
                </tr>

                <tr>
                    <td>Selectati Imaginea: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Pret: </td>
                    <td>
                        <input type="number" name="pret">
                    </td>
                </tr>

                <tr>
                    <td>Stoc: </td>
                    <td>
                        <input type="number" name="stoc">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Adaugati Produsul" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


        <?php 

            if(isset($_POST['submit']))
            {
                $denumire = $_POST['denumire'];
                $descriere = $_POST['descriere'];
                $gramaj = $_POST['gramaj'];
                $pret = $_POST['pret'];
                $stoc = $_POST['stoc'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Produs-".rand(0000,9999).".".$ext;

                        $src = $_FILES['image']['tmp_name'];

                        $dst = "../images/produse/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Imaginea nu a fost adaugata.</div>";
                            header('location:'.SITEURL.'admin/produse-adaugare.php');
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = "";
                }

                $sql2 = "INSERT INTO produse SET 
                    denumire = '$denumire',
                    descriere = '$descriere',
                    gramaj = $gramaj,
                    image_name = '$image_name',
                    pret = '$pret',
                    stoc = '$stoc'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Produsul a fost adaugat.</div>";
                    header('location:'.SITEURL.'admin/produse.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Produsul nu a fost adaugat.</div>";
                    header('location:'.SITEURL.'admin/produse.php');
                }

                
            }

        ?>


    </div>
</div>

<?php include('top-footer/footer.php'); ?>
