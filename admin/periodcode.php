<?php

session_start();
include "dbconfig.php";
if(isset($_POST['faculty_deletebtn'])){

$delete_id = $_POST['delete_id'];

$query = "DELETE FROM periods where id ='$delete_id'";
$query_run = mysqli_query($conn,$query);

if($query_run){
    $_SESSION['success'] = "Periods is Deleted";
    header('Location: manage_periods.php');
}

else{
    $_SESSION['status'] = "Periods isn't Deleted";
    header('Location: manage_periods.php');
}

}
?>
<?php

session_start();
include "dbconfig.php";
if(isset($_POST['faculty_deletebtn'])){

$delete_id = $_POST['delete_id'];

$query = "DELETE FROM timetable where id ='$delete_id'";
$query_run = mysqli_query($conn,$query);

if($query_run){
    $_SESSION['success'] = "Periods is Deleted";
    header('Location: create_timetable.php');
}

else{
    $_SESSION['status'] = "Periods isn't Deleted";
    header('Location: create_timetable.php');
}

}
?>