<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include "dbconfig.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $period_id = $_POST['period_id'];
      $day_of_week = $_POST['day_of_week'];
      $course_name = $_POST['course_name'];
      $subject_name = $_POST['subject_name'];
      $Teacher_name = $_POST['Teacher_name'];

      $stmt = $conn->prepare("INSERT INTO timetable (period_id, day_of_week, course_name,subject_name, Teacher_name) VALUES (?, ?, ?, ?, ?)");
         $stmt->bind_param("issss", $period_id, $day_of_week, $course_name,$subject_name, $Teacher_name);
         $stmt->execute();
         $stmt->close();
        //  header('Location: create_timetable.php');
      }
?>

<head>
    <title>Manage Timetable</title>
</head>
<body>
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage TimeTable</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Timetable</li>
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
                Timetable
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
                        $query = "SELECT * FROM timetable ORDER BY id LIMIT {$offset},{$limit}";
                        $query_run = mysqli_query($conn,$query)or die("Query Failed.");
                if(mysqli_num_rows($query_run)>0){
    ?>
 
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                       <th>Period</th>
                       <th>Day of the Week</th>
                       <th>Course Name</th>
                       <th>Subject Name</th>
                       <th>Teacher Name</th>
                       <th>DELETE</th>
           
                     </tr>
                    </thead>

                    <tbody>
                    <?php
          while($row = mysqli_fetch_assoc($query_run)){
        ?>
                     
                      <tr>
                      <td><?php echo $row['period_id'] ?></td>
                    <td><?php echo $row['day_of_week'] ?></td>
                    <td><?php echo $row['course_name'] ?></td>
                    <td><?php echo $row['subject_name'] ?></td>
                    <td><?php echo $row['Teacher_name'] ?></td>
                    <td><button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="showConfirmationModal('<?php echo $row['id']; ?>')">DELETE</button></td>
                    
                       
               
                      </tr>

                      <?php
                        }       
        ?>
        

                    </tbody>


                  </table>
                  <div class="clearfix">
					     <!-- <div class="hint-text">showing <b>5</b> out of <b>25</b></div> -->
					   <?php
                                      }
                                       $sql1 = "SELECT * FROM timetable";
                                       $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                       if(mysqli_num_rows($result1) >0){
                                        $total_records = mysqli_num_rows($result1);
                                        $limit = 3;
                                        $total_page = ceil( $total_records / $limit);


										echo '<ul class="pagination">';
                                       if($page >1){
                                        // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                        echo '<li class="page-item disabled"><a href="create_timetable.php?page='.($page-1).'">Previous</a></li>';                                       
                                       }                                        
                                        for($i = 1; $i <= $total_page; $i++){
                                            if($i== $page){
                                                $active = "active";
                                            }
                                            else{
                                                $active = "";
                                            }
                                            // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                            echo '<li class="'.$active.'" class="page-item "><a href="create_timetable.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                        }
                                        if($total_page >$page){
                                            // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                            echo '<li class="page-item "><a href="create_timetable.php?page='.($page+1).'" class="page-link">Next</a></li>';
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
                  Add New Period
                </h3>
              </div>
              <div class="card-body">
              <form method="POST">
        <label>Period:</label>
        <select name="period_id" required class="form-control">
        <option value="">Choose Periods</option>
            <?php
            $result = $conn->query("SELECT id, name FROM periods");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select><br>
        <label>Day of the Week:</label>
        <select name="day_of_week" required class="form-control">
        <option value="">Choose day of week</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select><br>
        <label>Course Name:</label>
        <select name="course_name" required class="form-control" >
        <option value="">Choose Course</option>
            <?php
            $result = $conn->query("SELECT  name FROM dept_category");
            while ($row = $result->fetch_assoc()) {
                
                echo "<option >" . $row['name'] . "</option>";
            }
            ?>
        </select><br>
        
        <label>Subject Name:</label>
        <select name="subject_name" required class="form-control">
        <option value="">ChooseSubject</option>
            <?php
            $result = $conn->query("SELECT  name FROM dept_list");
            while ($row = $result->fetch_assoc()) {
                echo "<option >" . $row['name'] . "</option>";
            }
            ?>
        </select><br>
        <label>Teacher Name:</label>
        <select name="Teacher_name" required class="form-control">
        <option value="">Choose Teacher</option>
            <?php
            $result = $conn->query("SELECT  name FROM faculty");
            while ($row = $result->fetch_assoc()) {
                echo "<option >" . $row['name'] . "</option>";
            }
            ?>
        </select><br>
        
        <button type="submit">Create Timetable</button>
    </form>
              </div>
            </div>
          </div>
         

      </div><!--/. container-fluid -->
    </section>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this record? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       
        <form id="deleteForm" action="periodcode.php" method="POST">
                <input type="hidden"  name="delete_id" id="delete_id" value="<?php echo $row['id']?>">
                <button type="submit" name="faculty_deletebtn" class="btn btn-danger">DELETE</button>

              </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function showConfirmationModal(id) {
    $('#delete_id').val(id);
    $('#deleteModal').modal('show');
  }
</script>
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>