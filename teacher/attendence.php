<?php
include('../admin/security.php');
include('header.php'); 
include('navbar.php'); 
include "../admin/dbconfig.php";
?>



    <h1>Student Attendance</h1>
    <form action="submit_attendence.php" method="POST">
    <div class="table-responsive">
    <div class="col-md-12">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch students from the database
                // $conn = new mysqli('localhost', 'username', 'password', 'college');
                // if ($conn->connect_error) {
                //     die("Connection failed: " . $conn->connect_error);
                // }
           

                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>";
                        echo "<input type='radio' name='status[" . $row['id'] . "]' value='Present'> Present";
                        echo "      ";
                        echo "<input type='radio' name='status[" . $row['id'] . "]' value='Absent'> Absent";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No students found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <input type="submit" value="Submit Attendance">
    </div>   
    </div>   
    </form>


<!-- /.container-fluid -->

<?php
include('scripts.php');
include('footer.php');
?>