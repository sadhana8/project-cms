<?php
include '../admin/dbconfig.php';

$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

$results = [];

// Search users table
$sql = "SELECT 'user' AS type, id, name AS title, email AS content FROM register WHERE name LIKE ? OR email LIKE ?";
$stmt = $conn->prepare($sql);
$searchTermLike = "%$searchTerm%";
$stmt->bind_param("ss", $searchTermLike, $searchTermLike);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

// Search posts table
$sql = "SELECT 'course' AS type, id, name, department FROM dept_category WHERE name LIKE ? OR department LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $searchTermLike, $searchTermLike);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

// Search comments table
$sql = "SELECT 'student' AS type, id, name AS content FROM student WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $searchTermLike);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $results[] = $row;
}

$stmt->close();
$conn->close();

// Output results
foreach ($results as $result) {
    echo "<div>";
    echo "<h2>" . ucfirst($result['type']) . ": " . $result['name'] . "</h2>";
    echo "<p>" . $result['student'] . "</p>";
    echo "</div>";
}
?>