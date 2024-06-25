<?php

include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Session Edit</h6>
        </div>

        <div class="card-body">

        <?php

        if(isset($_POST['dept_cate_editbtn'])){

            $id = $_POST['edit_id'];

            $query = "SELECT * FROM session where session_id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row){

            ?>

                <form action="sessioncode.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="updating_session_id" value="<?php echo $row['session_id']?>">

                <div class="form-group">
                <label>Shift</label>
                <!-- <input type="text" name="shift" class="form-control" placeholder="Enter shift"> -->
                <select name="edit_shift" id="" class="form-control" required>
            
                    <option value="">Choose shift</option>
                    <option value="Morning">Morning shift</option>
                    <option value="Day" >Day shift</option>
                   
                </select>
            </div>
            <?php
        $semester = "SELECT * FROM dept_category";
        $dept_run = mysqli_query($conn,$semester);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Course</label>
                <!-- <input type="text" name="course" class="form-control" placeholder="Enter course"> -->
                <select name="edit_course" id="" class="form-control" required>
                    <option value="">Choose Course</option>
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
            <?php
        $semester = "SELECT * FROM semesters";
        $dept_run = mysqli_query($conn,$semester);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Semester</label>
                <!-- <input type="text" name="semester" class="form-control" placeholder="semester"> -->
                <select name="edit_semester" id="" class="form-control" required>
                    <option value="">Choose Semester</option>
                    <?php
                      foreach($dept_run as $row){
                    ?>
                    <option value="<?php echo $row['semester_id'];?>"><?php echo $row['semester_name']; ?></option>
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
                <label>Start Time</label>
                <input type="time" name="edit_start_time" class="form-control" value='<?php echo $row["start_time"];?>'>
            </div>
            <div class="form-group">
                <label>End Time</label>
                <input type="time" name="edit_end_time" class="form-control" value='<?php echo $row["end_time"];?>'>
            </div>
            <?php
        $semester = "SELECT * FROM faculty";
        $dept_run = mysqli_query($conn,$semester);

        if(mysqli_num_rows($dept_run)>0){
          ?>
            <div class="form-group">
                <label>Teacher</label>
                <!-- <input type="text" name="faculty" class="form-control" placeholder="teacher"> -->
                <select name="edit_faculty" id="" class="form-control" required>
                    <option value="">Choose Teacher</option>
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

                <a href="session_create.php" class="btn-btn danger">CANCEL</a>
                <button type="submit" name="dept_update_btn" class="btn btn-primary">UPDATE</button>

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