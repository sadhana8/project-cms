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
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="studentcode.php" method="POST" enctype="multipart/form-data" >

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter Phone">
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
           <input type="hidden" name="usertype" value="admin">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="savestudent" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Student
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
    $query = "SELECT * FROM student ORDER BY id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>Student Name</th>
            <th> Address</th>
            <th> Email</th>
            <th> Phone</th>
            <th> DOB</th>
            <th> Image</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php
          while($row = mysqli_fetch_assoc($query_run)){
        ?>
            <tr>
            <td><?php  echo $row['id']; ?> </td>
            <td> <?php  echo $row['name']; ?></td>
            <td><?php  echo $row['address']; ?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  echo $row['phone']; ?></td>
            <td><?php  echo $row['dob']; ?></td>
            <td> <?php  echo '<img src="upload/student/' .$row['image'].'" width="100px"; height="100px">'; ?> </td>

            <td>
              <form action="student_edit.php" method="POST">
                <input type="hidden" name="edit_id"  value="<?php echo $row['id']?>">
                <button type="submit" name="student_editbtn" class="btn btn-success">EDIT</button>
              </form>
            </td>

            <td>
              <form action="studentcode.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                <button type="submit" name="student_deletebtn" class="btn btn-danger">DELETE</button>

              </form>
            </td>
          
            </tr>

        <?php
        }
          }
        ?>
        
        
        </tbody>
      </table>
      <?php
                                      
                                      $sql1 = "SELECT * FROM student";
                                      $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                      if(mysqli_num_rows($result1) >0){
                                       $total_records = mysqli_num_rows($result1);
                                       $limit = 3;
                                       $total_page = ceil( $total_records / $limit);


                   echo '<ul class="pagination">';
                                      if($page >1){
                                       // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                       echo '<li class="page-item disabled"><a href="student.php?page='.($page-1).'">Previous</a></li>';                                       
                                      }                                        
                                       for($i = 1; $i <= $total_page; $i++){
                                           if($i== $page){
                                               $active = "active";
                                           }
                                           else{
                                               $active = "";
                                           }
                                           // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                           echo '<li class="'.$active.'" class="page-item "><a href="student.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                       }
                                       if($total_page >$page){
                                           // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                           echo '<li class="page-item "><a href="student.php?page='.($page+1).'" class="page-link">Next</a></li>';
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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>