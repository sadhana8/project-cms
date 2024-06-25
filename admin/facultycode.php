<?php 

session_start();
include "dbconfig.php";

if(isset($_POST['savefaculty'])){

    $name = $_POST['name'];
    $description= $_POST['description'];
    $design = $_POST['designation'];
    $image = $_FILES['image']['name'];

    if(file_exists("upload/" . $_FILES["image"]["name"])){
        $store = $_FILES["image"] ["name"];
        $_SESSION['status'] = " Image already exists. '.$store' ";
        header('Location: faculty.php');
    }

    else{

    $query = "INSERT INTO faculty (`name`,`description`, `designation`,`image`) VALUES('$name','$description','$design','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/faculty/".$_FILES["image"]["name"]);
        $_SESSION['success']="Faculty Added!";
        header('Location: faculty.php');
    }

    else{
        $_SESSION['status']= "Faculty not added";
        header('Location: faculty.php');
    }
    }

}



if(isset($_POST['faculty_deletebtn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM faculty where id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['success'] = "Faculty is Deleted";
        header('Location: faculty.php');
    }

    else{
        $_SESSION['status'] = "Faculty isn't Deleted";
        header('Location: faculty.php');
    }

}

if(isset($_POST['faculty_update_btn'])){

    $updating_id = $_POST['updating_id'];
    $edit_name = $_POST['edit_name'];
    $edit_description = $_POST['edit_description'];
    $edit_design = $_POST['edit_designation'];
    $edit_faculty_img = $_FILES['faculty_image']['name'];

    $query = "UPDATE faculty SET name='$edit_name', description='$edit_description',designation='$edit_design', image='$edit_faculty_img' WHERE id='$updating_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES['faculty_image']['tmp_name'],"upload/faculty/".$_FILES['faculty_image']['name']);
        $_SESSION['success']="Faculty Updated!";
        header('Location: faculty.php');
    }

    else{
        $_SESSION['status']= "Faculty not Updated!";
        header('Location: faculty.php');
    }
    }
?>
