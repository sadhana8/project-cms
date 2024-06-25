<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include "dbconfig.php";
?>

<h2>All Attendance Records</h2>
<?php $attendance = $conn->query("SELECT * FROM attendance"); ?>

<div class="card-body">
    <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
      echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
      unset($_SESSION['success']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
      unset($_SESSION['status']);
    }
?>

    <div class="table-responsive">
    <div class="col-md-12"> 
    <?php
    include "dbconfig.php";
    $limit = 3;                    
    if(isset($_GET['page'])){
       $page = $_GET['page'];
    }else{
       $page =1;
    }
    $offset = ($page - 1 ) * $limit;
    $query = "SELECT * FROM semesters ORDER BY semester_id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
    ?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <th>User ID</th>
        <th>Date</th>
        <th>Status</th>
        <th>Course</th>
        <th>Semester</th>
        <th>Subject</th>
        <th>Course ID</th>
    </tr>
    <?php 
           while($row = mysqli_fetch_assoc($query_run)){
 
            $course = $row["course"];
            $dpt_cate = "SELECT * FROM dept_category WHERE id='$course'";
            $dpt_cate_run = mysqli_query($conn,$dpt_cate);
            $semester = $row["semester"];
            $dpt_sem = "SELECT * FROM semesters WHERE semester_id='$semester'";
            $dpt_sem_run = mysqli_query($conn,$dpt_sem);
            $subject = $row["subject"];
            $dpt_sub = "SELECT * FROM subject WHERE subject_id='$subject'";
            $dpt_sub_run = mysqli_query($conn,$dpt_sub);
    ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php foreach($dpt_cate_run as $dpt_row) {echo $dpt_row['name'];} ?></td>
            <td><?php foreach($dpt_sem_run as $dpt_row) {echo $dpt_row['semester_name'];} ?></td>
            <td><?php foreach($dpt_sub_run as $dpt_row) {echo $dpt_row['subject_name'];} ?></td>
            <td><?php echo $row['id']; ?></td>
        </tr>
        <?php
        }
    }
        ?>
        

</table>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>