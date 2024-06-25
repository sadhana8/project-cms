<?php
include 'dbconfig.php'; // Include your database connection

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_guardian'])) {
    // Collect form data
    // $guardian_id = $_POST['guardian_id'];
    // $guardian_name = $_POST['guardian_name'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $address = $_POST['address'];
    // $student_id = $_POST['student_id']; // Assuming you get this from the form

    // SQL query to update guardians table
//     $sql = "UPDATE guardians SET guardian_name=?, email=?, phone=?, address=?, student_id=?
//             WHERE guardian_id=?";

//     if ($stmt = $conn->prepare($sql)) {
//         // Bind parameters
//         $stmt->bind_param("ssssii", $guardian_name, $email, $phone, $address, $student_id, $guardian_id);

//         // Execute the statement
//         if ($stmt->execute()) {
//             echo "Guardian record updated successfully.";
//         } else {
//             echo "Error updating guardian record: " . $conn->error;
//         }

//         // Close statement
//         $stmt->close();
//     } else {
//         echo "Error preparing statement: " . $conn->error;
//     }
// }

// Close connection

?>
<?php
 // Include your database connection


 if(isset($_POST['delete_btn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM guardians where guardian_id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['success'] = "guardian is Deleted";
        header('Location: parent.php');
    }

    else{
        $_SESSION['status'] = "guardian isn't Deleted";
        header('Location: parent.php');
    }

}?>


