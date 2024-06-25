<?php
include('security.php');
// include "dbconfig.php";

if(isset($_POST['dept_catelist_save'])){
    $dept_cate_id = $_POST['dept_cate_id'];
    $semester_name = $_POST['semester_name'];
    

    $query = "INSERT INTO semesters (`dept_cate_id`,`semester_name`) VALUES ('$dept_cate_id','$semester_name')";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
       
        $_SESSION['success']="Semester List is  Added!";
        header('Location: semester.php');
    }

    else{
        $_SESSION['status']= "Semester List is not Added!";
        header('Location: semester.php');
    }

}
if(isset($_POST['dept_update_btn'])){

    $updating_semester_id = $_POST['updating_semester_id'];
    $edit_dept_cate_id = $_POST['edit_dept_cate_id'];
    $edit_semester_name = $_POST['edit_semester_name'];
    
    // $edit_dept_cate_img = $_FILES['dept_cate_image']['name'];

    $query = "UPDATE semesters SET dept_cate_id='$edit_dept_cate_id', semester_name='$edit_semester_name' WHERE semester_id='$updating_semester_id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
       
        $_SESSION['success']="Semester List is  Added!";
        header('Location: semester.php');
    }

    else{
        $_SESSION['status']= "Semester List is not Added!";
        header('Location: semester.php');
    }
   
    }

    if(isset($_POST['dept_cate_deletebtn'])){

        $delete_id = $_POST['delete_id'];
    
        $query = "DELETE FROM semesters where semester_id ='$delete_id'";
        $query_run = mysqli_query($conn,$query);
    
        if($query_run){
       
            $_SESSION['success']="Semester List is  Deleted!";
            header('Location: semester.php');
        }
    
        else{
            $_SESSION['status']= "Semester List is not Deleted!";
            header('Location: semester.php');
        }
    
       
    
    }
?>