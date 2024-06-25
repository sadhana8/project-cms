<?php include '../admin/dbconfig.php'; ?>
<table>
    <tr>
        <th>Allocation ID</th>
        <th>Faculty Name</th>
        <th>Subject Name</th>
    </tr>
    <?php
    $sql = "SELECT allocation.id as alloc_id, faculty.name as name, subject.subject_name as subject_name
            FROM allocation
            JOIN faculty ON allocation.teacher_id = faculty.id
            JOIN subject ON allocation.subject_id = subject.subject_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['alloc_id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['subject_name'] . "</td>
                  </tr>";
        }
    } else {
        echo "0 results";
    }
    ?>
</table>
