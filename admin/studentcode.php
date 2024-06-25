<?php 

session_start();
include "dbconfig.php";

if(isset($_POST['savestudent'])){

    $name = $_POST['name'];
    $address= $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob']; 
    $image = $_FILES['image']['name'];

    if(file_exists("upload/" . $_FILES["image"]["name"])){
        $store = $_FILES["image"] ["name"];
        $_SESSION['status'] = " Image already exists. '.$store' ";
        header('Location: student.php');
    }

    else{

    $query = "INSERT INTO student (`name`,`address`, `email`,`phone`,`dob`,`image`) VALUES('$name','$address','$email','$phone','$dob','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/student/".$_FILES["image"]["name"]);
        $_SESSION['success']="Student Added!";
        header('Location: student.php');
    }

    else{
        $_SESSION['status']= "Student not added";
        header('Location: student.php');
    }
    }

}



if(isset($_POST['student_deletebtn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM student where id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['success'] = "Student is Deleted";
        header('Location: student.php');
    }

    else{
        $_SESSION['status'] = "Student isn't Deleted";
        header('Location: student.php');
    }

}

if(isset($_POST['student_update_btn'])){

    $updating_id = $_POST['updating_id'];
    $edit_name = $_POST['edit_name'];
    $edit_address = $_POST['edit_address'];
    $edit_email = $_POST['edit_email'];
    $edit_phone= $_POST['edit_phone'];
    $edit_dob = $_POST['edit_dob'];
    $edit_student_img = $_FILES['student_image']['name'];

    $query = "UPDATE student SET name='$edit_name', address='$edit_address', email='$edit_email', phone='$edit_phone',  dob='$edit_dob',image='$edit_student_img' WHERE id='$updating_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES['student_image']['tmp_name'],"upload/student/".$_FILES['student_image']['name']);
        $_SESSION['success']="student Updated!";
        header('Location: student.php');
    }

    else{
        $_SESSION['status']= "student not Updated!";
        header('Location: student.php');
    }
    }
?>
