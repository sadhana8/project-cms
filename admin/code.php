<?php
session_start();


include "dbconfig.php";
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password',' $usertype')";
            $query_run = mysqli_query($conn, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}
if(isset($_POST['update-btn'])){
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['update_usertype'];



    $query = "UPDATE register SET username='$username',email='$email',password='$password',usertype='$usertype' WHERE id='$id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
          $_SESSION['success'] = "Your Data is Updated.";
          header('Location: register.php' );
    }
    else{
        $_SESSION['status'] = "Your Data is Not Updated.";
        header('Location: register.php' );
    }
}




if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];
    // $username = $_POST['delete_username'];
    // $email = $_POST['delete_email'];
    // $password = $_POST['delete_password'];



    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
          $_SESSION['success'] = "Your Data is DELETED.";
          header('Location: register.php' );
    }
    else{
        $_SESSION['status'] = "Your Data is Not DELETED.";
        header('Location: register.php' );
    }
}
?>
