<?php
include 'dbconfig.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $guardian_name = $_POST['guardian_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $student_id = $_POST['student_id']; // Assuming you get this from the form

    // SQL query to insert into guardians table
    $sql = "INSERT INTO guardians (guardian_name, email, phone, address, student_id) 
            VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ssssi", $guardian_name, $email, $phone, $address, $student_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Guardian record inserted successfully.";
        } else {
            echo "Error inserting guardian record: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>



<?php
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

<!-- <if(isset($_POST['guardian_update_btn'])){

    $updating_id = $_POST['updating_id'];
    $edit_name = $_POST['edit_name'];
    $edit_description = $_POST['edit_description'];
    $edit_design = $_POST['edit_designation'];
    $edit_guardian_img = $_FILES['guardian_image']['name'];

    $query = "UPDATE guardian SET name='$edit_name', description='$edit_description',designation='$edit_design', image='$edit_guardian_img' WHERE guardian_id='$updating_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES['guardian_image']['tmp_name'],"upload/guardian/".$_FILES['guardian_image']['name']);
        $_SESSION['success']="guardian Updated!";
        header('Location: parent.php');
    }

    else{
        $_SESSION['status']= "guardian not Updated!";
        header('Location: parent.php');
    }
    } -->
?>