<?php

include ('security.php');

if(isset($_POST['dept_cate_deletebtn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM dept_category where id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);


    unlink("upload/departments/".$row['image']);
    $sql = "DELETE FROM dept_category WHERE id = {$dept_id };";


    if($query_run){
        $_SESSION['success'] = "Dept Category is Deleted";
        header('Location: departments.php');
    }

    else{
        $_SESSION['status'] = "Dept Category isn't Deleted";
        header('Location: departments.php');
    }

}

if(isset($_POST['dept_update_btn'])){

    $updating_id = $_POST['updating_id'];
    $edit_name = $_POST['edit_name'];
    $edit_description = $_POST['edit_description'];
    $edit_department = $_POST['edit_department'];
    $edit_dept_cate_img = $_FILES['dept_cate_image']['name'];

    $query = "UPDATE dept_category SET name='$edit_name', description='$edit_description', department='$edit_department' ,image='$edit_dept_cate_img' WHERE id='$updating_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES['dept_cate_image']['tmp_name'],"upload/departments/".$_FILES['dept_cate_image']['name']);
        $_SESSION['success']="Department Category Updated!";
        header('Location: departments.php');
    }

    else{
        $_SESSION['status']= "Department Category not Updated!";
        header('Location: departments.php');
    }
    }

if(isset($_POST['dept_save'])){
    $dept_id=$_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $department = $_POST['department'];
    $images = $_FILES['dept_image']['name'];

    if(file_exists("upload/departments/" . $_FILES['dept_image']['name']))
    {
        $store = $_FILES['dept_image']['name'];
        $_SESSION['status'] = "Image already exists. '.$store'";
        header('Location: departments.php');
    }

    else{
    $query = "INSERT INTO dept_category(`name`,`description`,`department`,`image`) VALUES('$name','$description','$department','$images')";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES['dept_image']['tmp_name'],"upload/departments/".$_FILES['dept_image']['name']);
        $_SESSION['success']="Department Category Added!";
        header('Location: departments.php');
    }

    else{
        $_SESSION['status']= "Department Category not Added!";
        header('Location: departments.php');
    }
    }
}
?>