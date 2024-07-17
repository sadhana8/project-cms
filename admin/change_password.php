<?php
session_start();
require 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        echo "All fields are required.";
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo "New password and confirmation do not match.";
        exit;
    }

    $id = $_SESSION['id'];

    $stmt = $conn->prepare("SELECT password FROM register WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($current_password, $hashed_password)) {
        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE register SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $new_hashed_password, $id);

        if ($stmt->execute()) {
            echo "Password successfully changed.";
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Current password is incorrect.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
