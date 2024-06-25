

<?php

include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Faculty Edit</h6>
        </div>

        <div class="card-body">

        <?php

        if(isset($_POST['faculty_editbtn'])){

            $id = $_POST['edit_id'];

            $query = "SELECT * FROM faculty where id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row){

            ?>

                <form action="facultycode.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="updating_id" value="<?php echo $row['id']?>">

                <div class="form-group">
                <label>Name</label>
                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control">
                </div>
              
                <div class="form-group">
                <label>Description</label>
                <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control">
                </div>
                <div class="form-group">
                <label>Designation</label>
                <input type="text" name="edit_designation" value="<?php echo $row['designation'] ?>" class="form-control">
                </div>

                <div class="form-group">
                <label>Faculty  Image</label>
                <input type="file" name="faculty_image" id="faculty_image" value="<?php echo $row['image'] ?>" class="form-control">
                </div>

                <a href="faculty.php" class="btn-btn danger">CANCEL</a>
                <button type="submit" name="faculty_update_btn" class="btn btn-primary">UPDATE</button>

                </form>

            <?php
            }
            }
            ?>


        </div>

    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>