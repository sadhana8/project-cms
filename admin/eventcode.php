<?php 

session_start();
include "dbconfig.php";

if(isset($_POST['saveevent'])){

    $date = $_POST['date'];
    $title= $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if(file_exists("upload/" . $_FILES["image"]["name"])){
        $store = $_FILES["image"] ["name"];
        $_SESSION['status'] = " Image already exists. '.$store' ";
        header('Location: event.php');
    }

    else{

    $query = "INSERT INTO event (`date`,`title`, `description`,`image`) VALUES('$date','$title','$description','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/event/".$_FILES["image"]["name"]);
        $_SESSION['success']="Event Added!";
        header('Location: event.php');
    }

    else{
        $_SESSION['status']= "Event not added";
        header('Location: event.php');
    }
    }

}
if(isset($_POST['event_deletebtn'])){
    $id = $_POST['delete_id'];
    $query= "DELETE FROM event WHERE id='$id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['success']="Data is deleted";
        header('Location: event.php');
    }
    else{
        $_SESSION['status']= "Data isn't deleted";
        header('Location: event.php');
    }
}

if(isset($_POST['event_update_btn'])){
    $updating_id = $_POST['edit_id'];
    $edit_date = $_POST['edit_date'];
     $edit_title = $_POST['edit_title'];
    $edit_description = $_POST['edit_description'];
    $edit_event_img = $_FILES['event_image']['name'];

    $query = "UPDATE event SET date= '$edit_date' ,title='$edit_title', description='$edit_description', image='$edit_event_img' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES['event_image']['tmp_name'],"upload/event/".$_FILES['event_image']['name']);
        $_SESSION['success']="Event Updated!";
        header('Location: event.php');
    }

    else{
        $_SESSION['status']= "Event not Updated!";
        header('Location: event.php');
    }
    }
?>