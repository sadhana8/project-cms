
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../login/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login-link">
            <div class="logo">
                <i class='bx bx-pencil' ></i>
               <a href="../index.php"> <span class="text">Cylons University</span></a>
            </div>
            <p class="side-big-heading">Create your account</p>
            <p class="primary-bg-text">To keep track on your dashboard please login with your personal info</p>
            <a href="../login/registration.php" class="loginbtn">Register now</a>
            <a href="http://localhost/cms/frontend/index.php" class="loginbtn">Back Home</a>
        </div>
        <!-- <form action="logincheck.php" method="POST" class="signup-form-container"> -->
        <form  action="logincode.php" method ="POST" class="signup-form-container">
            <p class="big-heading">Login to your account</p>
            <?php

if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
{
    echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
    unset($_SESSION['status']);
}
?>
            <!-- <div class="social-media-platform">
                <a href="https://mail.google.com/mail"><i class='bx bx-sm bxl-gmail' ></i></a>
                <a href="https://www.facebook.com/"><i class='bx bx-sm bxl-facebook' ></i></a>
                <a href="https://www.instagram.com/"><i class='bx bx-sm bxl-instagram' ></i></a>
                <a href="https://github.com/"><i class='bx bx-sm bxl-github' ></i></a>
            </div><br> -->
            <br>
            <div class="login-form-contents">
              
                <div class="text-fields email">
                    <label for="email"><i class='bx bx-envelope' ></i></label>
                    <input type="text" name="email" id="email" placeholder="Enter your email id" required>
                </div>
                <div class="text-fields password">
                    <label for="password"><i class='bx bx-lock-alt' ></i></label>
                    <input type="password" name="password" id="password" placeholder="Enter password" required>
                </div>
            </div>
            <input type="submit" value="login" name="login_btn" class="nextPage">
            </form>
           
</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>
