<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include "dbconfig.php";



if (isset($_POST['submit'])) {
    $teacher_id = $_POST['teacher_id'];
    $subject_id = $_POST['subject_id'];

    $sql = "INSERT INTO allocation (teacher_id, subject_id) VALUES ('$teacher_id', '$subject_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Subject allocated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<head>
    <title>Manage allocation</title>
</head>
<body>
    <!-- <h1>Manage Periods</h1>
    <form method="POST">
        <label>Title:</label><input type="text" name="name"  required><br>
        <label>Start Time:</label><input type="time" name="start_time" required><br>
        <label>End Time:</label><input type="time" name="end_time" required><br>
        <button type="submit">Add Period</button>
    </form> -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subject Allocation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Subject Allocation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class='col-lg-8'>
            
            <!-- Info boxes -->
            <div class="card">
              <div class="card-header py-2">
                <h3 class="card-title">
               Subject Allocation
                </h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive bg-white">
                    <?php
                        include "dbconfig.php";
                        $limit = 3;
                                        
                        if(isset($_GET['page'])){
                           $page = $_GET['page'];
                        }else{
                           $page =1;
                        }
                        $offset = ($page - 1 ) * $limit;
                        $query = "SELECT * FROM allocation ORDER BY id LIMIT {$offset},{$limit}";
                        $query_run = mysqli_query($conn,$query)or die("Query Failed.");
                if(mysqli_num_rows($query_run)>0){
    ?>
 
 <table class="table table-bordered">
    <tr>
        <th>Allocation ID</th>
        <th>Faculty Name</th>
        <th>Subject Name</th>
    </tr>
    <?php
    $sql = "SELECT allocation.id as alloc_id, faculty.name as name, subject.subject_name as subject_name
            FROM allocation
            JOIN faculty ON allocation.teacher_id = faculty.id
            JOIN subject ON allocation.subject_id = subject.subject_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['alloc_id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['subject_name'] . "</td>
                  </tr>";
        }
    } else {
        echo "0 results";
    }
    ?>
</table>

                  <div class="clearfix">
					     <!-- <div class="hint-text">showing <b>5</b> out of <b>25</b></div> -->
					   <?php
                                      }
                                       $sql1 = "SELECT * FROM allocation";
                                       $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                       if(mysqli_num_rows($result1) >0){
                                        $total_records = mysqli_num_rows($result1);
                                        $limit = 3;
                                        $total_page = ceil( $total_records / $limit);


										echo '<ul class="pagination">';
                                       if($page >1){
                                        // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                        echo '<li class="page-item disabled"><a href="create_faculty.php?page='.($page-1).'">Previous</a></li>';                                       
                                       }                                        
                                        for($i = 1; $i <= $total_page; $i++){
                                            if($i== $page){
                                                $active = "active";
                                            }
                                            else{
                                                $active = "";
                                            }
                                            // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                            echo '<li class="'.$active.'" class="page-item "><a href="create_faculty.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                        }
                                        if($total_page >$page){
                                            // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                            echo '<li class="page-item "><a href="create_faculty.php?page='.($page+1).'" class="page-link">Next</a></li>';
                                           }
                                        echo '</ul>';
                                       }
                                       ?>   
					   </div>
 
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- Info boxes -->
            <div class="card">
              <div class="card-header py-1">
                <h3 class="card-title">
                  Add New Subject allocation
                </h3>
              </div>
              <div class="card-body">
              <form method="post" >
                <div>
                <label>Teacher:</label>
    <select name="teacher_id" required class="form-control">
        <option value="">Select teacher</option>
        <?php
        $sql = "SELECT * FROM faculty";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
        }
        ?>
    </select>
    </div>
    <div>
    <label>Subject:</label>
    <select name="subject_id" required class="form-control">
        <option value="">Select Subject</option>
        <?php
        $sql = "SELECT * FROM subject";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['subject_id'] . "'>" . $row['subject_name'] . "</option>";
            }
        }
        ?>
    </select>
    </div><br>
    <div>
    <button type="submit" name="submit" class="btn btn-success float-right">Add Period</button>
    
    <!-- <input type="submit" name="submit" value="Allocate Subject" class="form-control"></div> -->
</form>
              </div>
            </div>
          </div>
         

      </div><!--/. container-fluid -->
    </section>
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>