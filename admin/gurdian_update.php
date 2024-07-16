<?php
include 'dbconfig.php'; // Include your database connection

 if(isset($_POST['delete_btn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM guardians where guardian_id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['success'] = "guardian is Deleted";
        header('Location: parent.php');
    }

    else{
        $_SESSION['status'] = "guardian isn't Deleted";
        header('Location: parent.php');
    }

}

if(isset($_POST['edit_btn'])){

    $updating_id = $_POST['updating_guardian_id'];
    $edit_name = $_POST['edit_name'];
    $edit_address = $_POST['edit_address'];
    $edit_email = $_POST['edit_email'];
    $edit_phone= $_POST['edit_phone'];


    $query = "UPDATE guardians SET guardian_name='$edit_name', address='$edit_address', email='$edit_email', phone='$edit_phone' WHERE guardian_id='$updating_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['success'] = "guardian is Updated";
        header('Location: parent.php');
    }

    else{
        $_SESSION['status'] = "guardian isn't Updated";
        header('Location: parent.php');
    }

}
?>


