


<?php

include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Student Edit</h6>
        </div>

        <div class="card-body">

        <?php

        if(isset($_POST['student_editbtn'])){

            $id = $_POST['edit_id'];

            $query = "SELECT * FROM student where id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row){

            ?>

                <form action="studentcode.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="updating_id" value="<?php echo $row['id']?>">

                <div class="form-group">
                <label>Name</label>
                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control">
                </div>
              
                <div class="form-group">
                <label>Address</label>
                <input type="text" name="edit_address" value="<?php echo $row['address'] ?>" class="form-control">
                </div>
                <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                <label>Phone</label>
                <input type="number" name="edit_phone" value="<?php echo $row['phone'] ?>" class="form-control">
                </div>
                <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="edit_dob" value="<?php echo $row['dob'] ?>" class="form-control">
                </div>
                <!-- <div class="form-group">
                <label>Gender</label>
                <input type="" name="edit_gender" value="<?php echo $row['dob'] ?>" class="form-control">
                </div> -->

                <div class="form-group">
                <label>Student Image</label>
                <input type="file" name="student_image" id="student_image" value="<?php echo $row['image'] ?>" class="form-control">
                </div>

                <a href="student.php" class="btn-btn danger">CANCEL</a>
                <button type="submit" name="student_update_btn" class="btn btn-primary">UPDATE</button>

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