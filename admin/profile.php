<?php
include('../admin/security.php');
include "../admin/dbconfig.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    // Handling file upload
    $profilePic = $_FILES['profile_pic']['name'];
    $targetDir = "uploads/";  // Directory to save the uploaded files
    $targetFile = $targetDir . basename($profilePic);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['profile_pic']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['profile_pic']['size'] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFile)) {
            $sql = "INSERT INTO register (id, address, email, dob, gender, phone, profile_pic) VALUES ('$id', '$address', '$email', '$dob', '$gender', '$phone', '$profilePic')";
            if ($conn->query($sql) === TRUE) {
                echo "Teacher added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
