<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include "dbconfig.php";
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add session</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="sessioncode.php" method="POST" enctype="multipart/form-data" >

        <div class="modal-body">

            <!-- <div class="form-group">
                <label> Session Id </label>
                <input type="text" name="session_id" class="form-control" placeholder="Enter session id">
            </div> -->
            <div class="form-group">
                <label>Shift</label>
                <!-- <input type="text" name="shift" class="form-control" placeholder="Enter shift"> -->
                <select name="shift" id="" class="form-control" required>
                    <option value="">Choose shift</option>
                    <option value="Morning">Morning shift</option>
                    <option value="Day" >Day shift</option>
                   
                </select>
            </div>
            <?php
        $semester = "SELECT * FROM dept_category";
        $dept_run = mysqli_query($conn,$semester);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Course</label>
                <!-- <input type="text" name="course" class="form-control" placeholder="Enter course"> -->
                <select name="course" id="" class="form-control" required>
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
                <label>Semester</label>
                <!-- <input type="text" name="semester" class="form-control" placeholder="semester"> -->
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
            <div class="form-group">
                <label>Start Time</label>
                <input type="time" name="start_time" class="form-control" placeholder="start_time">
            </div>
            <div class="form-group">
                <label>End Time</label>
                <input type="time" name="end_time" class="form-control" placeholder="start_time">
            </div>
            <?php
        $semester = "SELECT * FROM faculty";
        $dept_run = mysqli_query($conn,$semester);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Teacher</label>
                <!-- <input type="text" name="faculty" class="form-control" placeholder="teacher"> -->
                <select name="faculty" id="" class="form-control" required>
                    <option value="">Choose Teacher</option>
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
           <input type="hidden" name="sessiontype" value="admin">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="savesession" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">session
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add 
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
    $query = "SELECT * FROM session ORDER BY session_id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query($conn,$query)or die("Query Failed.");
  
    if(mysqli_num_rows($query_run)>0){
    ?>
 
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           
            <th>Session Id</th>
            <th> Shift</th>
            <th> Course</th>
            <th> Semester</th>
            <th> Start Time</th>
            <th> End Time</th>
            <th> Teacher</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php
           
           while($row = mysqli_fetch_assoc($query_run)){
 
             $course = $row["course"];
             $dpt_cate = "SELECT * FROM dept_category WHERE id='$course'";
             $dpt_cate_run = mysqli_query($conn,$dpt_cate);

             $semester = $row["semester"];
             $dpt_sem = "SELECT * FROM semesters WHERE semester_id='$semester'";
             $dpt_sem_run = mysqli_query($conn,$dpt_sem);

             $faculty = $row["faculty"];
             $dpt_fact = "SELECT * FROM faculty WHERE id='$faculty'";
             $dpt_fact_run = mysqli_query($conn,$dpt_fact);
         
        ?>
            <tr>
            <td><?php  echo $row['session_id']; ?> </td>
          <td><?php  echo $row['shift']; ?></td>          
            <td><?php foreach($dpt_cate_run as $dpt_row) {echo $dpt_row['name'];} ?></td>
            <td><?php foreach($dpt_sem_run as $dpt_row) {echo $dpt_row['semester_name'];} ?></td>
            <td><?php  echo $row['start_time']; ?></td>
            <td><?php  echo $row['end_time']; ?></td>
            <td><?php foreach($dpt_fact_run as $dpt_row) {echo $dpt_row['name'];} ?></td>
        

            <td>
              <form action="session_edit.php" method="POST">
                <input type="hidden" name="edit_id"  value="<?php echo $row['session_id']?>">
                <button type="submit" name="dept_cate_editbtn" class="btn btn-success">EDIT</button>
              </form>
            </td>

            <td>
            <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="showConfirmationModal('<?php echo $row['session_id']; ?>')">DELETE</button>
             
            </td>
          
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
                                       $sql1 = "SELECT * FROM session";
                                       $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                       if(mysqli_num_rows($result1) >0){
                                        $total_records = mysqli_num_rows($result1);
                                        $limit = 3;
                                        $total_page = ceil( $total_records / $limit);


										echo '<ul class="pagination">';
                                       if($page >1){
                                        // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                        echo '<li class="page-item disabled"><a href="session.php?page='.($page-1).'">Previous</a></li>';                                       
                                       }                                        
                                        for($i = 1; $i <= $total_page; $i++){
                                            if($i== $page){
                                                $active = "active";
                                            }
                                            else{
                                                $active = "";
                                            }
                                            // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                            echo '<li class="'.$active.'" class="page-item "><a href="session.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                        }
                                        if($total_page >$page){
                                            // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                            echo '<li class="page-item "><a href="session.php?page='.($page+1).'" class="page-link">Next</a></li>';
                                           }
                                        echo '</ul>';
                                       }
                                       ?>   
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
        <form id="deleteForm" action="sessioncode.php" method="POST">
                <input type="hidden" name="delete_id" id="delete_id"  value="<?php echo $row['session_id']?>">
                <button type="submit" name="dept_cate_deletebtn" class="btn btn-danger">DELETE</button>

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