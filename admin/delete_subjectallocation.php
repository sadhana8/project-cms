<?php


include "dbconfig.php";
include ('security.php');
if(isset($_POST['dept_cate_deletebtn'])){

$delete_id = $_POST['delete_id'];

$query = "DELETE FROM allocation where id ='$delete_id'";
$query_run = mysqli_query($conn,$query);




if($query_run){
    $_SESSION['success'] = "Attendance is Deleted";
    header('Location: subject_allocation.php');
}

else{
    $_SESSION['status'] = "Attendance isn't Deleted";
    header('Location: subject_allocation.php');
}

}
?>