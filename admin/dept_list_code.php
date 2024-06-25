<?php
include('security.php');
// include "dbconfig.php";

if(isset($_POST['dept_catelist_save'])){
    $dept_cate_id = $_POST['dept_cate_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $section = $_POST['section'];

    $query = "INSERT INTO dept_list (`dept_cate_id`,`name`,`description`,`section`) VALUES ('$dept_cate_id','$name','$description','$section')";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
       
        $_SESSION['success']="Subject List is  Added!";
        header('Location: dept_list.php');
    }

    else{
        $_SESSION['status']= "Subject List is not Added!";
        header('Location: dept_list.php');
    }

}

if(isset($_POST['dept_update_btn'])){

    $updating_id = $_POST['updating_id'];
    $edit_dept_cate_id = $_POST['edit_dept_cate_id'];
    $edit_name = $_POST['edit_name'];
    $edit_description = $_POST['edit_description'];
    $edit_section = $_POST['edit_section'];
    // $edit_dept_cate_img = $_FILES['dept_cate_image']['name'];

    $query = "UPDATE dept_list SET dept_cate_id='$edit_dept_cate_id', name='$edit_name', description='$edit_description', section='$edit_section' WHERE id='$updating_id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
       
        $_SESSION['success']="Subject List is  Added!";
        header('Location: dept_list.php');
    }

    else{
        $_SESSION['status']= "Subject List is not Added!";
        header('Location: dept_list.php');
    }
   
    }

    if(isset($_POST['dept_cate_deletebtn'])){

        $delete_id = $_POST['delete_id'];
    
        $query = "DELETE FROM dept_list where id ='$delete_id'";
        $query_run = mysqli_query($conn,$query);
    
        if($query_run){
       
            $_SESSION['success']="Subject List is  Deleted!";
            header('Location: dept_list.php');
        }
    
        else{
            $_SESSION['status']= "Subject List is not Deleted!";
            header('Location: dept_list.php');
        }
    
       
    
    }
?>