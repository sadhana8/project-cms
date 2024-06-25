<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include "dbconfig.php";
?>



<head>
    <title>Attendance Records</title>
</head>
<body>
<div class="table-responsive">
<div class="col-md-12">
    <h1>Attendance Records</h1>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Date</th>
                <th>Student Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
          include '../admin/dbconfig.php';

            $sql = "SELECT attendance.date, student.name, attendance.status FROM attendance
                    JOIN student ON attendance.student_id = student.id
                    ORDER BY attendance.date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    </div>
    </div>
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>