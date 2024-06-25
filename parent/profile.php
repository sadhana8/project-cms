<?php
include '../admin/dbconfig.php';

$user_id = $_GET['id'];  // Get the user ID from the URL parameter

$sql = "SELECT id, name, address, phone, email, gender, dob FROM register WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
} else {
    echo "No user found.";
    exit();
}
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        .profile-container {
            width: 50%;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .profile-container h2 {
            text-align: center;
        }
        .profile-container p {
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>User Profile</h2>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($row['id']); ?></p>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($row['address']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender']); ?></p>
    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($row['dob']); ?></p>
</div>

</body>
</html>