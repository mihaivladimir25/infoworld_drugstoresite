<?php include('../config/constants.php'); ?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        <br><br>

        <form action="" method="POST" class="text-center">
            Nume Utilizator: <br>
            <input type="text" name="username"><br><br>

            Parola: <br>
            <input type="password" name="password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
        </form>
    </div>
</body>

</html>


<?php 

    if(isset($_POST['submit']))
    {
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = $_POST['password'];
        $password = mysqli_real_escape_string($conn, $raw_password);

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Conectare reusita!</div>";
            $_SESSION['user'] = $username;

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Nume Utilizator sau Parola gresita.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>
