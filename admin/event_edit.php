

<?php

include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Event Edit</h6>
        </div>

        <div class="card-body">

        <?php

        if(isset($_POST['event_editbtn'])){

            $id = $_POST['edit_id'];

            $query = "SELECT * FROM event where id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row){

            ?>

                <form action="eventcode.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="updating_id" value="<?php echo $row['id']?>">

                <div class="form-group">
                <label>Date</label>
                <input type="date" name="edit_date" value="<?php echo $row['date'] ?>" class="form-control">
                </div>
              
                <div class="form-group">
                <label>Title</label>
                <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control">
                </div>
                <div class="form-group">
                <label>Description</label>
                <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control">
                </div>

                <div class="form-group">
                <label>Event  Image</label>
                <input type="file" name="event_image" id="event_image" value="<?php echo $row['image'] ?>" class="form-control">
                </div>

                <a href="event.php" class="btn-btn danger">CANCEL</a>
                <button type="submit" name="event_update_btn" class="btn btn-primary">UPDATE</button>

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