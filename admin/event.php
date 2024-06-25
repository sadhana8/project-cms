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
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="eventcode.php" method="POST" enctype="multipart/form-data" >

        <div class="modal-body">

            <div class="form-group">
                <label> Date </label>
                <input type="date" name="date" class="form-control" placeholder="Enter date">
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
           <input type="hidden" name="usertype" value="admin">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="saveevent" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Event
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
    $query = "SELECT * FROM event ORDER BY id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!-- <th> ID </th> -->
            <th>Date</th>
            <th> Title</th>
            <th> Description</th>
            <th> Images</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php
          while($row = mysqli_fetch_assoc($query_run)){
        ?>
            <tr>
         
            <td><?php  echo $row['date']; ?></td>
            <td><?php  echo $row['title']; ?></td>
            <td><?php  echo $row['description']; ?></td>
            <td> <?php  echo '<img src="upload/event/' .$row['image'].'" width="100px"; height="100px">'; ?> </td>

            <td>
              <form action="event_edit.php" method="POST">
                <input type="hidden" name="edit_id"  value="<?php echo $row['id']?>">
                <button type="submit" name="event_editbtn" class="btn btn-success">EDIT</button>
              </form>
            </td>

            <td>
              <form action="eventcode.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                <button type="submit" name="event_deletebtn" class="btn btn-danger">DELETE</button>

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
                                      
                                      $sql1 = "SELECT * FROM event";
                                      $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                      if(mysqli_num_rows($result1) >0){
                                       $total_records = mysqli_num_rows($result1);
                                       $limit = 3;
                                       $total_page = ceil( $total_records / $limit);


                   echo '<ul class="pagination">';
                                      if($page >1){
                                       // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                       echo '<li class="page-item disabled"><a href="event.php?page='.($page-1).'">Previous</a></li>';                                       
                                      }                                        
                                       for($i = 1; $i <= $total_page; $i++){
                                           if($i== $page){
                                               $active = "active";
                                           }
                                           else{
                                               $active = "";
                                           }
                                           // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                           echo '<li class="'.$active.'" class="page-item "><a href="event.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                       }
                                       if($total_page >$page){
                                           // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                           echo '<li class="page-item "><a href="event.php?page='.($page+1).'" class="page-link">Next</a></li>';
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
