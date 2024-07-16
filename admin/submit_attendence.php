<?php
// include '../admin/dbconfig.php';

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $date = date('Y-m-d');
//     foreach ($_POST['status'] as $student_id => $status) {
//         $sql = "INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("iss", $student_id, $date, $status);
//         $stmt->execute();
//     }

//     echo "Attendance recorded successfully!";
//     header("Location: display-attendence.php");
// }

// $conn->close();

include "dbconfig.php";
include ('security.php');

if(isset($_POST['submit'])) {
    $userid = $_POST['student_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];

    $query = "INSERT INTO attendance (student_id, date, status, course, semester, subject) VALUES ('$userid', '$date', '$status', '$course', '$semester', '$subject')";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $_SESSION['success'] = "Record added successfully";
    } else {
        $_SESSION['status'] = "Record addition failed";
    }

    header('Location: submit_attendence.php');  // Redirect to the main page
}


if(isset($_POST['dept_cate_deletebtn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM attendance where id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);




    if($query_run){
        $_SESSION['success'] = "Attendance is Deleted";
        header('Location: attendence.php');
    }

    else{
        $_SESSION['status'] = "Attendance isn't Deleted";
        header('Location: attendence.php');
    }

}
?>