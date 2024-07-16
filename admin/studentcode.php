<?php
include('../admin/security.php');
include "../admin/dbconfig.php";

if (isset($_POST['register_btn'])) {
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_phone = $_POST['student_phone'];
    $student_address = $_POST['student_address'];
    $student_gender = $_POST['student_gender'];
    $student_image = $_POST['student_image'];
    $student_dob = $_POST['student_dob'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_email = $_POST['guardian_email'];
    $guardian_phone = $_POST['guardian_phone'];
    $guardian_address = $_POST['guardian_address'];

    $conn->autocommit(FALSE); // Turn off auto-commit

    try {
        // Insert student details
        $student_query = "INSERT INTO student (name, email, phone, address,gender,image,dob) VALUES (?, ?, ?,?,?,?, ?)";
        $stmt = $conn->prepare($student_query);
        $stmt->bind_param("sssssss", $student_name, $student_email, $student_phone, $student_address,$student_gender, $student_image,$student_dob);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $student_id = $conn->insert_id;

        // Insert guardian details
        $guardian_query = "INSERT INTO guardians (guardian_name, email, phone, address, student_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($guardian_query);
        $stmt->bind_param("ssssi", $guardian_name, $guardian_email, $guardian_phone, $guardian_address, $student_id);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        $conn->commit(); // Commit the transaction
        $_SESSION['success'] = "Student and Guardian added successfully!";
    } catch (Exception $e) {
        $conn->rollback(); // Rollback the transaction on error
        $_SESSION['status'] = "Failed to add student and guardian: " . $e->getMessage();
    }

    $conn->autocommit(TRUE); // Turn auto-commit back on
    header('Location: student.php');
}



if(isset($_POST['student_deletebtn'])){

    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM student where id ='$delete_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['success'] = "Student is Deleted";
        header('Location: student.php');
    }

    else{
        $_SESSION['status'] = "Student isn't Deleted";
        header('Location: student.php');
    }

}

if(isset($_POST['student_update_btn'])){

    $updating_id = $_POST['updating_id'];
    $edit_name = $_POST['edit_name'];
    $edit_address = $_POST['edit_address'];
    $edit_email = $_POST['edit_email'];
    $edit_phone= $_POST['edit_phone'];
    $edit_dob = $_POST['edit_dob'];
    $edit_student_img = $_FILES['student_image']['name'];

    $query = "UPDATE student SET name='$edit_name', address='$edit_address', email='$edit_email', phone='$edit_phone',  dob='$edit_dob',image='$edit_student_img' WHERE id='$updating_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        move_uploaded_file($_FILES['student_image']['tmp_name'],"upload/student/".$_FILES['student_image']['name']);
        $_SESSION['success']="student Updated!";
        header('Location: student.php');
    }

    else{
        $_SESSION['status']= "student not Updated!";
        header('Location: student.php');
    }
    }
?>
