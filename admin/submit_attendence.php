<?php
include '../admin/dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = date('Y-m-d');
    foreach ($_POST['status'] as $student_id => $status) {
        $sql = "INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $student_id, $date, $status);
        $stmt->execute();
    }

    echo "Attendance recorded successfully!";
    header("Location: display-attendence.php");
}

$conn->close();
?>