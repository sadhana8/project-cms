


<?php

include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Guardian Edit</h6>
        </div>

        <div class="card-body">

        <?php

        if(isset($_POST['edit_btn'])){

            $id = $_POST['edit_guardian_id'];

            $query = "SELECT * FROM guardians where guardian_id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row){

            ?>

                <form action="gurdian_update.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="updating_guardian_id" value="<?php echo $row['guardian_id']?>">

                <div class="form-group">
                <label>Name</label>
                <input type="text" name="edit_name" value="<?php echo $row['guardian_name'] ?>" class="form-control">
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
               

          
                <a href="student.php" class="btn-btn danger">CANCEL</a>
                <button type="submit" name="edit_btn" class="btn btn-primary">UPDATE</button>

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