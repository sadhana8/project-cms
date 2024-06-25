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
        <h5 class="modal-title" id="exampleModalLabel">Add setting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="settingcode.php" method="POST" enctype="multipart/form-data" >

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
            </div> 
          <div class="form-group">
                <label>phone</label>
                <input type="phone" name="phone" class="form-control" value="<?php echo $row['phone'];?>">
            </div>
          <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>">
            </div>
          <div class="form-group">
                <label>Footer</label>
                <input type="text" name="footer" class="form-control" value="<?php echo $row['footer'];?>">
            </div>
            <!-- <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div> -->
           <input type="hidden" name="usertype" value="admin">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="savesetting" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Frontend Setting
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add 
            </button> -->
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
    <?php
    include "dbconfig.php";
    $query = "SELECT * FROM setting";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>College Name</th>
            <th>College Email</th>
            <th>College Phone</th>
            <th> College Address</th>
            <th> Footer</th>
            <th>EDIT </th>
          
          </tr>
        </thead>
        <tbody>

        <?php
          while($row = mysqli_fetch_assoc($query_run)){
        ?>
            <tr>
            <td><?php  echo $row['name']; ?> </td>
            <td> <?php  echo $row['email']; ?></td>
            <td><?php  echo $row['phone']; ?></td>
            <td><?php  echo $row['address']; ?></td>
            <td><?php  echo $row['footer']; ?></td>
            <!-- <td> <?php  
            // echo '<img src="upload/setting/' .$row['image'].'" width="100px"; height="100px">'; 
            ?> </td> -->

            <td>
              <form action="setting_edit.php" method="POST">
                <input type="hidden" name="edit_id"  value="<?php echo $row['id']?>">
                <button type="submit" name="setting_editbtn" class="btn btn-success">EDIT</button>
              </form>
            </td>

            <!-- <td>
              <form action="settingcode.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                <button type="submit" name="setting_deletebtn" class="btn btn-danger">DELETE</button>

              </form>
            </td>
           -->
            </tr>

        <?php
        }
          }
        ?>
        
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>