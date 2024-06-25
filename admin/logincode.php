<?php
include('security.php');
include('dbconfig.php');


if(isset($_POST['login_btn'])){
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($conn,$query);
    $usertypes = mysqli_fetch_array($query_run);


    if($usertypes['usertype']=="admin")
    {
        $_SESSION['username']= $email_login;
        header('Location: index.php');
    }
   else if($usertypes['usertype']=="student"){
    $_SESSION['username']= $email_login;
    header('Location: ../student/student-admin.php');
   }
  else if($usertypes['usertype']=="teacher"){
    $_SESSION['username']= $email_login;
    header('Location: ../teacher/teacher-admin.php');
  }
  else if($usertypes['usertype']=="parent"){
    $_SESSION['username']= $email_login;
    header('Location: ../parent/parent-admin.php');
  }
    else {
        $_SESSION['status']= 'Email id or Password is invalid';
        header('Location: login.php');
    }
}
?>