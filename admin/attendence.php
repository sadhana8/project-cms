<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="deptmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Attendance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="submit_attendence.php" method="POST">

        <div class="modal-body">

        <?php
        $student = "SELECT * FROM student";
        $dept_run = mysqli_query($conn,$student);

        if(mysqli_num_rows($dept_run)>0){
          ?>
           <div class="form-group">
                <label> Student Name </label>
                <select name="student_id" id="" class="form-control" required>
                    <option value="">Choose Student</option>
                    <?php
                      foreach($dept_run as $row){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
                    <?php
                      }
                    ?>
                </select>
            </div>
            
          <?php
        }
        else{
          echo "No Data Available";
        }
        ?>
        <div class="form-group">
                <label>  Date </label>
                <input type="Date" name="name" class="form-control" placeholder="Enter Date" required>
            </div>
            <!-- <div class="form-group">
                <label>Status</label>
                <input type="text" name="description" class="form-control" placeholder="Enter description" required>
            </div> -->
            <div class="form-group">
                <label>Status</label>
                <!-- <input type="text" name="shift" class="form-control" placeholder="Enter shift"> -->
                <select name="status" id="" class="form-control" required>
                    <option value="">Choose status</option>
                    <option value="Present">Present</option>
                    <option value="Absent" >Absent</option>
                   
                </select>
            </div>
            <?php
        $department = "SELECT * FROM dept_category";
        $dept_run = mysqli_query($conn,$department);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Course</label>
                <!-- <input type="text" name="section" class="form-control" required> -->
                <select name="section" id="" class="form-control" required>
                    <option value="">Choose Course</option>
                    <?php
                      foreach($dept_run as $row){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
                    <?php
                      }
                    ?>
                </select>
            </div>
            <?php
        }
        else{
          echo "No Data Available";
        }
        ?>

<?php
        $semester = "SELECT * FROM semesters";
        $dept_run = mysqli_query($conn,$semester);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Course</label>
                <!-- <input type="text" name="section" class="form-control" required> -->
                <select name="semester" id="" class="form-control" required>
                    <option value="">Choose Semester</option>
                    <?php
                      foreach($dept_run as $row){
                    ?>
                    <option value="<?php echo $row['semester_id'];?>"><?php echo $row['semester_name']; ?></option>
                    <?php
                      }
                    ?>
                </select>
            </div>
            <?php
        }
        else{
          echo "No Data Available";
        }
        ?>

<?php
        $subject = "SELECT * FROM dept_list";
        $dept_run = mysqli_query($conn,$subject);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Subject</label>
                <!-- <input type="text" name="section" class="form-control" required> -->
                <select name="subject" id="" class="form-control" required>
                    <option value="">Choose Subject</option>
                    <?php
                      foreach($dept_run as $row){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
                    <?php
                      }
                    ?>
                </select>
            </div>
            <?php
        }
        else{
          echo "No Data Available";
        }
        ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Student - Attendance
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#deptmodal">
              ADD
            </button>
    </h6>
  </div>

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
    $query = "SELECT * FROM attendance ORDER BY id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
    ?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <th>Student ID</th>
        <th>Date</th>
        <th>Status</th>
        <th>Course</th>
        <th>Semester</th>
        <th>Subject</th>
        
        <th>DELETE</th>
    </tr>
    <?php 
                   while($row = mysqli_fetch_assoc($query_run)){
                    $userid = $row['student_id'];
                    $dpt_std = "SELECT * FROM student WHERE id='$userid'";
                    $dpt_std_run = mysqli_query($conn,$dpt_std);

                    $course = $row['course'];
                    $dpt_cate = "SELECT * FROM dept_category WHERE id='$course'";
                    $dpt_cate_run = mysqli_query($conn,$dpt_cate);

                    $semester = $row["semester"];
                    $dpt_sem = "SELECT * FROM semesters WHERE semester_id='$semester'";
                    $dpt_sem_run = mysqli_query($conn,$dpt_sem);
                    
                    $subject = $row["subject"];
                    $dpt_sub = "SELECT * FROM dept_list WHERE id='$subject'";
                    $dpt_sub_run = mysqli_query($conn,$dpt_sub);
            ?>
      <tr>
                    <td><?php foreach($dpt_std_run as $dpt_row) {echo $dpt_row['name'];} ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php foreach($dpt_cate_run as $dpt_row) {echo $dpt_row['name'];} ?></td>
                    <td><?php foreach($dpt_sem_run as $dpt_row) {echo $dpt_row['semester_name'];} ?></td>
                    <td><?php foreach($dpt_sub_run as $dpt_row) {echo $dpt_row['name'];} ?></td>
                    <!-- <td><?php //echo $row['id']; ?></td> -->
                    <td>      
      <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="showConfirmationModal('<?php echo $row['id']; ?>')">DELETE</button>
      </td>
                </tr>
        <?php
        }
    }
        ?>
       
        

</table>
      <?php
                                      
                                      $sql1 = "SELECT * FROM dept_list";
                                      $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                      if(mysqli_num_rows($result1) >0){
                                       $total_records = mysqli_num_rows($result1);
                                       $limit = 3;
                                       $total_page = ceil( $total_records / $limit);


                   echo '<ul class="pagination">';
                                      if($page >1){
                                       // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                       echo '<li class="page-item disabled"><a href="dept_list.php?page='.($page-1).'">Previous</a></li>';                                       
                                      }                                        
                                       for($i = 1; $i <= $total_page; $i++){
                                           if($i== $page){
                                               $active = "active";
                                           }
                                           else{
                                               $active = "";
                                           }
                                           // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                           echo '<li class="'.$active.'" class="page-item "><a href="dept_list.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                       }
                                       if($total_page >$page){
                                           // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                           echo '<li class="page-item "><a href="dept_list.php?page='.($page+1).'" class="page-link">Next</a></li>';
                                          }
                                       echo '</ul>';
                                      }
                                      ?>   
            </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
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
        <form id="deleteForm" action="submit_attendence.php" method="POST">
          <input type="hidden" name="delete_id" id="delete_id">
          <button type="submit" name="dept_cate_deletebtn" class="btn btn-danger">Delete</button>
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