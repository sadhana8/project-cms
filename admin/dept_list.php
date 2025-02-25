<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="deptmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="dept_list_code.php" method="POST">

        <div class="modal-body">

        <?php
        $department = "SELECT * FROM dept_category";
        $dept_run = mysqli_query($conn,$department);

        if(mysqli_num_rows($dept_run)>0){
          ?>
           <div class="form-group">
                <label> Dept List Name </label>
                <select name="dept_cate_id" id="" class="form-control" required>
                    <option value="">Choose Your Subject</option>
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
                <label>  Subject Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter description" required>
            </div>
            <?php
        $department = "SELECT * FROM session";
        $dept_run = mysqli_query($conn,$department);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Section</label>
                <!-- <input type="text" name="section" class="form-control" required> -->
                <select name="section" id="" class="form-control" required>
                    <option value="">Choose Your Section</option>
                    <?php
                      foreach($dept_run as $row){
                    ?>
                    <option value="<?php echo $row['session_id'];?>"><?php echo $row['shift']; ?></option>
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
            <button type="submit" name="dept_catelist_save" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Course - Departments (Subject)
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
    $query = "SELECT * FROM dept_list ORDER BY id LIMIT {$offset},{$limit}";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Dept Name</th>
            <th> Subject Name</th>
            <th> Description</th>
            <th> section</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

        <?php
          while($row = mysqli_fetch_assoc($query_run)){

            $dpt_cate_id = $row["dept_cate_id"];
            $dpt_cate = "SELECT * FROM dept_category WHERE id='$dpt_cate_id'";
            $dpt_cate_run = mysqli_query($conn,$dpt_cate);

            $dpt_sess_id = $row["section"];
            $dpt_sess = "SELECT * FROM session WHERE session_id='$dpt_sess_id'";
            $dpt_sess_run = mysqli_query($conn,$dpt_sess);

        ?>
            <tr>
            <td><?php  echo $row['id']; ?> </td>
            <td>
              <?php foreach($dpt_cate_run as $dpt_row) {echo $dpt_row['name'];} ?>
            </td>
            <td> <?php  echo $row['name']; ?></td>
            <td><?php  echo $row['description']; ?></td>
            <td> <?php foreach($dpt_sess_run as $dpt_row) {echo $dpt_row['shift'];} ?></td>
            
            <td>
              <form action="dept_edit_list.php" method="POST">
                <input type="hidden" name="edit_id"  value="<?php echo $row['id']?>">
                <button type="submit" name="dept_cate_editbtn" class="btn btn-success">EDIT</button>
              </form>
            </td>

            <td>
              <form action="dept_list_code.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                <button type="submit" name="dept_cate_deletebtn" class="btn btn-danger">DELETE</button>

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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>