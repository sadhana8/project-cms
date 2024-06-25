<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

?>


<div class="modal fade" id="addaboutus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="aboutcode.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Title </label>
                <input type="text" name="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label>Sub Title</label>
                <input type="tetx" name="subtitle" class="form-control" placeholder="Enter subtitle">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="password" name="description" class="form-control" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label>Links</label>
                <input type="link" name="links" class="form-control" placeholder="Enter links">
            </div>
           <input type="hidden" name="usertype" value="admin">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">About US
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addaboutus">
              Add About Us
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
    $query = "SELECT * FROM aboutus ORDER BY id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query( $conn,$query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Sub Title</th>
            <th> Description</th>
            <th> Links</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
       
        <?php 
        if(mysqli_num_rows( $query_run ) > 0)
        {
            while($row = mysqli_fetch_assoc($query_run)){
            
        
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['subtitle']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['links']; ?></td>

            <td>
            <form action="about_edit.php" method="POST">

            <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">   
            <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
            </form>
            </td>

            <td>
            <form action="aboutcode.php" method="POST">

            <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">   
            <button type="submit" name="about_delete_btn" class="btn btn-danger">DELETE</button>
            </form>
            </td>
        </tr>    
        <?php
            }
        }
        else{
            echo "No Data Found";
        }
        ?>
        
        </tbody>
      </table>
      <?php
                                      
                                      $sql1 = "SELECT * FROM aboutus";
                                      $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                      if(mysqli_num_rows($result1) >0){
                                       $total_records = mysqli_num_rows($result1);
                                       $limit = 3;
                                       $total_page = ceil( $total_records / $limit);


                   echo '<ul class="pagination">';
                                      if($page >1){
                                       // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                       echo '<li class="page-item disabled"><a href="aboutus.php?page='.($page-1).'">Previous</a></li>';                                       
                                      }                                        
                                       for($i = 1; $i <= $total_page; $i++){
                                           if($i== $page){
                                               $active = "active";
                                           }
                                           else{
                                               $active = "";
                                           }
                                           // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                           echo '<li class="'.$active.'" class="page-item "><a href="aboutus.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                       }
                                       if($total_page >$page){
                                           // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                           echo '<li class="page-item "><a href="aboutus.php?page='.($page+1).'" class="page-link">Next</a></li>';
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