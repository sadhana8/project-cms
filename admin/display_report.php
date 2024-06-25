<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 


// Fetch students
$students_sql = "SELECT * FROM student";
$students_result = $conn->query($students_sql);

// Fetch courses
$courses_sql = "SELECT * FROM dept_category";
$courses_result = $conn->query($courses_sql);

// Create an associative array of courses
$courses = array();
if ($courses_result->num_rows > 0) {
    while ($course_row = $courses_result->fetch_assoc()) {
        $courses[$course_row['id']] = $course_row['name'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>College Management System - Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>College Management System - Report</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Enrollment Date</th>
    </tr>
    <?php
    if ($students_result->num_rows > 0) {
        while ($student_row = $students_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $student_row["id"] . "</td>";
            echo "<td>" . $student_row["name"] . "</td>";
            echo "<td>" . $student_row["email"] . "</td>";
            // Fetch the course name
            $course_id = $student_row["course_id"];
            $course_name = isset($courses[$course_id]) ? $courses[$course_id] : 'N/A';

            // Display the course name
            echo "<td>" . $course_name . "</td>";
            echo "<td>" . $student_row["doj"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found</td></tr>";
    }
    $conn->close();
    ?>
</table>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>