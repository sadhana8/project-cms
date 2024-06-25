<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control    check_mail"  placeholder="Enter Username">
                <small class="error_email" style="color:red;"></small>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
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
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
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
    // $limit = 3;
                    
    // if(isset($_GET['page'])){
    //    $page = $_GET['page'];
    // }else{
    //    $page =1;
    // }
    // $offset = ($page - 1 ) * $limit;
    $query = "SELECT * FROM register ";
    $query_run = mysqli_query($conn,$query);
    ?>

<div class="container1">
<table id="example" class="display nowrap" style="width:100%">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>Usertype</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
          <?php
       if(mysqli_num_rows($query_run)>0){
          while($row = mysqli_fetch_assoc($query_run)){
          ?>
             <tr>
            <td><?php  echo $row['id'];   ?> </td>
            <td> <?php  echo $row['username'];   ?></td>
            <td><?php  echo $row['email'];   ?></td>
            <td> <?php  echo $row['password'];   ?> </td>
            <td> <?php  echo $row['usertype'];   ?> </td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
               <form action="code.php" method="post">
                   <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form> 
             
                <!-- <button class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal"> DELETE</button> -->
                <!-- <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Delete </a> -->
            </td>
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
</div>
      <div class="clearfix">
					     <!-- <div class="hint-text">showing <b>5</b> out of <b>25</b></div> -->
					   <?php
                                      
                                       $sql1 = "SELECT * FROM register";
                                       $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                    //                    if(mysqli_num_rows($result1) >0){
                    //                     $total_records = mysqli_num_rows($result1);
                    //                     $limit = 3;
                    //                     $total_page = ceil( $total_records / $limit);


										// echo '<ul class="pagination">';
                    //                    if($page >1){
                                        // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                      //   echo '<li class="page-item disabled"><a href="register.php?page='.($page-1).'">Previous</a></li>';                                       
                                      //  }                                        
                                      //   for($i = 1; $i <= $total_page; $i++){
                                      //       if($i== $page){
                                      //           $active = "active";
                                      //       }
                                      //       else{
                                      //           $active = "";
                                      //       }
                                            // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                        //     echo '<li class="'.$active.'" class="page-item "><a href="register.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                        // }
                                        // if($total_page >$page){
                                            // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                      //       echo '<li class="page-item "><a href="register.php?page='.($page+1).'" class="page-link">Next</a></li>';
                                      //      }
                                      //   echo '</ul>';
                                      //  }
                                       ?>   
					   </div>
  </div>

    </div>
  </div>
</div>

</div>
<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are You Sure To Delete</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Delete" below if you are ready to delete this row.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="code.php" method="POST"> 
          <input type="hidden" name="delete_id" value="<?php //echo $row['id']; ?>">
            <button type="submit" name="delete_btn" class="btn btn-primary">Delete</button>
          </form>


        </div>
      </div>
    </div>
  </div> -->
<!-- /.container-fluid -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html>




<?php
// include('includes/scripts.php');
include('includes/footer.php');
?>