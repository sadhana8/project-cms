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
        <h5 class="modal-title" id="exampleModalLabel">Add guardians</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="parentcode.php" method="post">
      <div class="modal-body">
      <div class="form-group">
        <label>Guardian Name:</label><br>
        <input type="text" name="guardian_name" class="form-control"required>
      </div>
      <div class="form-group">
        <label>Email:</label><br>
        <input type="email" name="email"class="form-control"></div>
        <div class="form-group">
        <label>Phone:</label><br>
        <input type="text" name="phone"class="form-control"></div>
        <div class="form-group">
        <label>Address:</label><br>
        <input type="text" name="address" class="form-control"></div>
        <div class="form-group">
        <label>Student ID:</label><br>
        <input type="number" name="student_id"class="form-control" required></div>
        
  
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="saveguardians" class="btn btn-primary">Save</button>
        </div>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Guardians
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
    $query = "SELECT * FROM guardians ORDER BY guardian_id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Guardian Name</th>
            <th> Address</th>
            <th> Email</th>
            <th> Phone</th>
            <!-- <th> guardians Name</th> -->
            <!-- <th> Created</th> -->
            <th>EDIT </th>
            <!-- <th>DELETE </th> -->
          </tr>
        </thead>
      
       
        <button id="toggleButton" class="btn btn-primary">Show/Hide Information</button>
         <div id="toggleContent" class="mt-3" style="display: none;">
             <div class="card">
                 <div class="card-body">
                       <?php
 
                        $sql = "SELECT * FROM student";

                           $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
                                   while ($row = $result->fetch_assoc()) {
       
                                    echo "Student ID: " . $row['id'] . "<br>";
                                     echo "Student name: " . $row['name'] . "<br>";
        
                                          echo "<hr>";
                                           }
                                    } else {
                                  echo "No guardians found.";
                                      }  
                                    ?>
            </div>
          </div>
        </div>

      
    <tbody>
    <?php
 if(mysqli_num_rows($query_run)>0){
    while($row = mysqli_fetch_assoc($query_run)){
    ?>
       <tr>
      <td><?php  echo $row['guardian_id'];   ?> </td>
      <td> <?php  echo $row['guardian_name'];   ?></td>
      <td><?php  echo $row['email'];   ?></td>
      <td> <?php  echo $row['phone'];   ?> </td>
      <td> <?php  echo $row['address'];   ?> </td>
      <td>
          <form action="guardianedit.php" method="post">
              <input type="hidden" name="edit_guardian_id" value="<?php echo $row['guardian_id']; ?>">
              <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
          </form>
      </td>
      <!-- <td>
      
      <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="showConfirmationModal('<?php //echo $row['guardian_id']; ?>')">DELETE</button>
            
           
      </td> -->
    </tr>
    <?php
    }
 }
 else{
  echo "No record found";
 }
 ?>
 
  
</tbody>
        
        
         </table>
      <?php                }
                                      
                                      $sql1 = "SELECT * FROM guardians";
                                      $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                      if(mysqli_num_rows($result1) >0){
                                       $total_records = mysqli_num_rows($result1);
                                       $limit = 3;
                                       $total_page = ceil( $total_records / $limit);


                   echo '<ul class="pagination">';
                                      if($page >1){
                                       // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                       echo '<li class="page-item disabled"><a href="parent.php?page='.($page-1).'">Previous</a></li>';                                       
                                      }                                        
                                       for($i = 1; $i <= $total_page; $i++){
                                           if($i== $page){
                                               $active = "active";
                                           }
                                           else{
                                               $active = "";
                                           }
                                           // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                           echo '<li class="'.$active.'" class="page-item "><a href="parent.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                       }
                                       if($total_page >$page){
                                           // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                           echo '<li class="page-item "><a href="parent.php?page='.($page+1).'" class="page-link">Next</a></li>';
                                          }
                                       echo '</ul>';
                                      }
                                      ?>   
            </div>
    </div>
  </div>
</div>

</div>
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
        <form id="deleteForm" action="gurdian_update.php" method="POST">
          <input type="hidden" name="delete_id" id="delete_id">
          <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#toggleButton').click(function() {
                $('#toggleContent').toggle();
            });
        });
    </script>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>