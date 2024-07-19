<?php
include 'dbconfig.php';
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 



// Function to sanitize input data
function sanitize($data)
{
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($data)));
}

// Initialize variables
$roleid = '';
$usertype = '';
$action = 'add'; // Default action is to add a new role

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $roleid = sanitize($_POST['roleid']);
    $usertype = sanitize($_POST['usertype']);

    // Check if roleid is provided
    if (empty($roleid)) {
        die('Role ID is required.');
    }

    // Check if usertype is valid
    if (!in_array($usertype, ['student', 'teacher'])) {
        die('Invalid role type.');
    }

    // Check if action is edit or add
    if (isset($_POST['action']) && $_POST['action'] == 'edit') {
        // Update existing role
        $sql = "UPDATE tbl_roles SET usertype='$usertype' WHERE roleid='$roleid'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            echo "Role updated successfully.";
        } else {
            echo "Error updating role: " . $conn->error;
        }
    } else {
        // Insert new role
        $sql = "INSERT INTO tbl_roles (roleid, usertype) VALUES ('$roleid', '$usertype')";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            echo "Role added successfully.";
        } else {
            echo "Error adding role: " . $conn->error;
        }
    }
}

// Delete role if requested
if (isset($_GET['delete'])) {
    $roleid = sanitize($_GET['delete']);
    $sql = "DELETE FROM tbl_roles WHERE roleid='$roleid'";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Role deleted successfully.";
    } else {
        echo "Error deleting role: " . $conn->error;
    }
}

// Filter roles by type if requested
$filter = '';
if (isset($_GET['filter'])) {
    $filter = sanitize($_GET['filter']);
    if ($filter !== 'student' && $filter !== 'teacher') {
        $filter = ''; // Reset filter if invalid value
    }
}

// Fetch roles based on filter or all roles
$sql = "SELECT * FROM tbl_roles";
if ($filter) {
    $sql .= " WHERE usertype='$filter'";
}
$result = $conn->query($sql);

// Search functionality
$search = '';
if (isset($_GET['search'])) {
    $search = sanitize($_GET['search']);
    $sql = "SELECT * FROM tbl_roles WHERE roleid LIKE '%$search%' OR usertype LIKE '%$search%'";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Roles</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h2 {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        form {
            margin-top: 20px;
        }

        form input[type="text"],
        form select {
            padding: 8px;
            width: 200px;
        }

        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #3498db;
        }
        .navbar a {
            display: inline-block;
            /* Display links inline with block-level properties */
            padding: 10px 20px;
            /* Padding inside each link */
            margin: 5px;
            /* Margin around each link */
            background-color: #f0f0f0;
            /* Background color */
            color: #333;
            /* Text color */
            text-decoration: none;
            /* Remove underline */
            border: 1px solid #ccc;
            /* Border around links */
            border-radius: 4px;
            /* Rounded corners */
            transition: background-color 0.3s, color 0.3s;
            /* Smooth transition for hover effect */
        }

        .navbar a:hover {
            background-color: #ccc;
            /* Background color on hover */
            color: #333;
            /* Text color on hover */
        }
    </style> -->
</head>

<body>
<!-- <h3>Admin Locator</h3> -->
    <!-- <div class="navbar">
        <a href="adminindex.php">Users</a>
        <a href="../teacher/teacherindex.php">Assignment</a>
        <a href="roleassign.php"> roles</a>
    </div> -->
    
    <h2 class="modal-title" id="exampleModalLabel">Manage Roles</h2>

    <!-- Search form -->
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="modal-body">
        
        <input type="text" name="search" placeholder="Search by Role ID or Role Type">
        <input type="submit" value="Search">
        </div>
    </form>

    <!-- Filter links -->
    <div class="modal-body">
    <div style="margin-top: 10px;">
        <a href="?filter=student">Filter Students</a> |
        <a href="?filter=teacher">Filter Teachers</a> |
        <a href="?">Show All</a>
    </div>
    </div>

    <!-- Display roles -->
    <?php if ($result->num_rows > 0) : ?>
        <div class="table-responsive">
        <div class="col-md-12"> 
        
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>Role ID</th>
                <th>Role Type</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['roleid']); ?></td>
                    <td><?php echo htmlspecialchars($row['usertype']); ?></td>
                    <td>
                        <a href="?edit=<?php echo htmlspecialchars($row['roleid']); ?>">Edit</a> |
                        <a href="?delete=<?php echo htmlspecialchars($row['roleid']); ?>" onclick="return confirm('Are you sure you want to delete this role?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        </div> </div>
    <?php else : ?>
        <p>No roles found.</p>
    <?php endif; ?>

    <!-- Form for adding/editing roles -->
    <h2><?php echo ($action == 'edit') ? 'Edit Role' : 'Add New Role'; ?></h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        Role ID: <input type="text" name="roleid" value="<?php echo htmlspecialchars($roleid); ?>"><br><br>
        Role Type:
        <select name="usertype">
            <option value="student" <?php echo ($usertype == 'student') ? 'selected' : ''; ?>>Student</option>
            <option value="teacher" <?php echo ($usertype == 'teacher') ? 'selected' : ''; ?>>Teacher</option>
        </select><br><br>
        <input type="submit" value="<?php echo ($action == 'edit') ? 'Update Role' : 'Add Role'; ?>">
    </form>
</body>

</html>

<?php
// Close database connection
$conn->close();
?>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>