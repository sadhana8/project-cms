<?php 

session_start();
include "dbconfig.php";

// if(isset($_POST['savesetting'])){

//     $name = $_POST['name'];
//     $address= $_POST['address'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $dob = $_POST['dob']; 
//     $image = $_FILES['image']['name'];

//     if(file_exists("upload/" . $_FILES["image"]["name"])){
//         $store = $_FILES["image"] ["name"];
//         $_SESSION['status'] = " Image already exists. '.$store' ";
//         header('Location: setting.php');
//     }

//     else{

//     $query = "INSERT INTO setting (`name`,`address`, `email`,`phone`,`dob`,`image`) VALUES('$name','$address','$email','$phone','$dob','$image')";
//     $query_run = mysqli_query($conn,$query);

//     if($query_run){
//         move_uploaded_file($_FILES["image"]["tmp_name"],"upload/setting/".$_FILES["image"]["name"]);
//         $_SESSION['success']="setting Added!";
//         header('Location: setting.php');
//     }

//     else{
//         $_SESSION['status']= "setting not added";
//         header('Location: setting.php');
//     }
//     }

// }



// if(isset($_POST['setting_deletebtn'])){

//     $delete_id = $_POST['delete_id'];

//     $query = "DELETE FROM setting where id ='$delete_id'";
//     $query_run = mysqli_query($conn,$query);

//     if($query_run){
//         $_SESSION['success'] = "setting is Deleted";
//         header('Location: setting.php');
//     }

//     else{
//         $_SESSION['status'] = "setting isn't Deleted";
//         header('Location: setting.php');
//     }

// }

if(isset($_POST['setting_update_btn'])){

    $updating_id = $_POST['updating_id'];
    $edit_name = $_POST['edit_name'];
    $edit_email = $_POST['edit_email'];
    $edit_phone = $_POST['edit_phone'];
    $edit_address = $_POST['edit_address'];
    $edit_footer = $_POST['edit_footer'];
    
    // $edit_setting_img = $_FILES['setting_image']['name'];

    $query = "UPDATE setting SET name='$edit_name',email='$edit_email',phone='$edit_phone', address='$edit_address',  footer='$edit_footer' WHERE id='$updating_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        // move_uploaded_file($_FILES['setting_image']['tmp_name'],"upload/setting/".$_FILES['setting_image']['name']);
        $_SESSION['success']="setting Updated!";
        header('Location: setting.php');
    }

    else{
        $_SESSION['status']= "setting not Updated!";
        header('Location: setting.php');
    }
    }
?>
