<?php
include('security.php');
include('includes/header.php'); 
 include('includes/navbar.php'); 


// Fetch courses for the dropdown
$courses_sql = "SELECT * FROM dept_category";
$courses_result = $conn->query($courses_sql);

$name = $email = $course_id = $enrollment_date = "";
$name_err = $email_err = $course_err = $enrollment_date_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty($_POST["course_id"])) {
        $course_err = "Please select a course.";
    } else {
        $course_id = intval($_POST["course_id"]);
    }

    if (empty(trim($_POST["doj"]))) {
        $enrollment_date_err = "Please enter a date of joining.";
    } else {
        $enrollment_date = trim($_POST["doj"]);
    }

    if (empty($name_err) && empty($email_err) && empty($course_err) && empty($enrollment_date_err)) {
        $sql = "INSERT INTO student (name, email, course_id, doj) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssis", $param_name, $param_email, $param_course_id, $param_enrollment_date);

            $param_name = $name;
            $param_email = $email;
            $param_course_id = $course_id;
            $param_enrollment_date = $enrollment_date;

            if ($stmt->execute()) {
                echo "<script>window.location.href = 'display_report.php';</script>";
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>College Management System - Add Student</title>
</head>
<body>

<h2>Add Student</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
<div class="modal-body">
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control"id="name" value="<?php echo $name; ?>">
    <span><?php echo $name_err; ?></span><br>
    </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email"class="form-control" id="email" value="<?php echo $email; ?>">
    <span><?php echo $email_err; ?></span><br>
    </div>
    <div class="form-group">
    <label for="course_id">Course:</label>
    <select name="course_id"class="form-control" id="course_id">
        <option value="">Select Course</option>
        <?php
        if ($courses_result->num_rows > 0) {
            while ($course_row = $courses_result->fetch_assoc()) {
                echo "<option value=\"" . $course_row["id"] . "\"" . ($course_id == $course_row["id"] ? " selected" : "") . ">" . $course_row["name"] . "</option>";
            }
        }
        ?>
    </select>
    <span><?php echo $course_err; ?></span><br></div>
    <div class="form-group">
    <label for="enrollment_date">Date of Joining:</label>
    <input type="date" id="enrollment_date" class="form-control"name="doj" value="<?php echo $enrollment_date; ?>">
    <span><?php echo $enrollment_date_err; ?></span><br>
    </div>
    <button type="submit">Report</button>
    </div>
</form>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>