<?php
include('../admin/security.php');
// session_reset();
include('header.php'); 
include('navbar.php'); 
include "../admin/dbconfig.php";



?>
    <h2>View Attendance</h2>
    <form method="post" action="">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>
        <input type="submit" name="view_attendance" value="View Attendance">
    </form>

    <?php
    if (isset($_POST['view_attendance'])) {
       

        $student_id = $_POST['student_id'];

        $sql = "SELECT date, status FROM attendance WHERE student_id='$student_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Attendance Records for Student ID: $student_id</h3>";
            echo "<table class='table table-bordered' border='1'><tr><th>Date</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["date"] . "</td><td>" . $row["status"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No attendance records found for Student ID: $student_id";
        }

        $conn->close();
    }
    ?>
</body>
</html>

<?php
include('scripts.php');
include('footer.php');
?>