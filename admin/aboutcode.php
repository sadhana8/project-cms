<?php
session_start();
include "dbconfig.php";
if(isset($_POST['about_delete_btn'])){
    $id = $_POST['delete_id'];
    $query= "DELETE FROM aboutus WHERE id='$id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['success']="Data is deleted";
        header('Location: aboutus.php');
    }
    else{
        $_SESSION['status']= "Data isn't deleted";
        header('Location: aboutus.php');
    }
}
if(isset($_POST['update_btn'])){
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];
    $query = "UPDATE aboutus SET title='$title', subtitle= '$subtitle' , description='$description', links='$links' WHERE id=$id";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['success']="About us added";
        header('Location: aboutus.php');
    }
    else{
        $_SESSION['status']= "About us not added";
        header('Location: aboutus.php');
    }
}
if(isset($_POST['registerbtn'])){
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];
    $query = "INSERT INTO aboutus (title,subtitle,description,links) VALUES('$title','$subtitle','$description','$links')";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['success']="About us added";
        header('Location: aboutus.php');
    }
    else{
        $_SESSION['status']= "About us not added";
        header('Location: aboutus.php');
    }
}
?>



