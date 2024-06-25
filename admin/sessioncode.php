<?php
include ('dbconfig.php');
if(isset($_POST['dept_cate_editbtn'])){

$updating_session_id = $_POST['updating_session_id'];
$edit_shift = $_POST['edit_shift'];
$edit_course = $_POST['edit_course'];
$edit_semester = $_POST['edit_semester'];
$edit_start_time = $_POST['edit_start_time'];
$edit_end_time = $_POST['edit_end_time'];
$edit_faculty = $_POST['edit_faculty'];


$query = "UPDATE session SET shift='$edit_shift', course='$edit_course', semester='$edit_semester' ,start_time='$edit_start_time', end_time='$edit_end_time',edit_faculty='$edit_faculty' WHERE session_id='$updating_session_id'";
$query_run = mysqli_query($conn,$query);
if($query_run){
    $_SESSION['success'] = "Session is Add.";
    header('Location: session_create.php' );
}
else{
  $_SESSION['status'] = "Session is Not Add.";
  header('Location: session_create.php' );
}

}


if(isset($_POST['savesession'])){
    // $session_id = $_POST['session_id'];
    $shift = $_POST['shift'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $faculty = $_POST['faculty'];


$query = "INSERT INTO session (`shift`,`course`,`semester`,`start_time`,`end_time`,`faculty`) VALUES('$shift','$course','$semester','$start_time','$end_time','$faculty')";
$query_run = mysqli_query($conn,$query);


if($query_run){
    $_SESSION['success'] = "Your Data is Add.";
    header('Location: session_create.php' );
}
else{
  $_SESSION['status'] = "Your Data is Not Add.";
  header('Location: session_create.php' );
}
}



if(isset($_POST['dept_cate_deletebtn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM session where session_id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);


    // unlink("upload/departments/".$row['image']);
    // $sql = "DELETE FROM dept_category WHERE id = {$dept_id };";


    if($query_run){
        $_SESSION['success'] = "Session is Deleted";
        header('Location: session_create.php');
    }

    else{
        $_SESSION['status'] = "Session isn't Deleted";
        header('Location: session_create.php');
    }

}
?>