<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">About Us Page Edit  </h6>
  </div>
  <div class="card-body">
    <?php
include "dbconfig.php";
if(isset($_POST['edit_btn'])){
  $id = $_POST['edit_id'];
   
  $query = "SELECT * FROM aboutus WHERE id='$id' ";
  $query_run = mysqli_query($conn,$query);
  foreach($query_run as $row){
    ?>
    <form action="aboutcode.php" method="POST">

       <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">

            <div class="form-group">
                <label> Title </label>
                <input type="text" name="edit_title" value="<?php echo $row['title']?>" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label>Sub Title</label>
                <input type="text" name="edit_subtitle" value="<?php echo $row['subtitle']?>" class="form-control" placeholder="Enter subtitle">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="edit_description" value="<?php echo $row['description']?>" class="form-control" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label>Links</label>
                <input type="text" name="edit_links" value="<?php echo $row['links']?>" class="form-control" placeholder="Enter links">
            </div>
    
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
        </div>
      </form>
   



         
    <?php
  }
}

?>
  
  </div>
</div>

</div>
<!-- /.container-fluid -->

  <div class="card-body">


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>