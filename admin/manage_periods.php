<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include "dbconfig.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $stmt = $conn->prepare("INSERT INTO periods (name, start_time, end_time) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $start_time, $end_time);
    $stmt->execute();
    $stmt->close();
}
?>

<head>
    <title>Manage Periods</title>
</head>
<body>
    <!-- <h1>Manage Periods</h1>
    <form method="POST">
        <label>Title:</label><input type="text" name="name"  required><br>
        <label>Start Time:</label><input type="time" name="start_time" required><br>
        <label>End Time:</label><input type="time" name="end_time" required><br>
        <button type="submit">Add Period</button>
    </form> -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Periods</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Periods</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class='col-lg-8'>
            
            <!-- Info boxes -->
            <div class="card">
              <div class="card-header py-2">
                <h3 class="card-title">
                Periods
                </h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive bg-white">
                    <?php
                        include "dbconfig.php";
                        $limit = 3;
                                        
                        if(isset($_GET['page'])){
                           $page = $_GET['page'];
                        }else{
                           $page =1;
                        }
                        $offset = ($page - 1 ) * $limit;
                        $query = "SELECT * FROM periods ORDER BY id LIMIT {$offset},{$limit}";
                        $query_run = mysqli_query($conn,$query)or die("Query Failed.");
                if(mysqli_num_rows($query_run)>0){
    ?>
 
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Start time</th>
                        <th>End Time</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
          while($row = mysqli_fetch_assoc($query_run)){
        ?>
                     
                      <tr>
                        <td><?php  echo $row['id']; ?></td>
                        <td><?php  echo $row['name']; ?> </td>
                        <td><?php  echo $row['start_time']; ?></td>
                        <td><?php  echo $row['end_time']; ?></td>
                        <!-- <td>
              <form action="periods_edit.php" method="POST">
                <input type="hidden" name="edit_id"  value="<?php echo $row['id']?>">
                <button type="submit" name="faculty_editbtn" class="btn btn-success">EDIT</button>
              </form>
            </td>

            <td>
              <form action="periodcode.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                <button type="submit" name="faculty_deletebtn" class="btn btn-danger">DELETE</button>

              </form>
            </td>
                -->
                      </tr>

                      <?php
                        }       
        ?>
        

                    </tbody>


                  </table>
                  <div class="clearfix">
					     <!-- <div class="hint-text">showing <b>5</b> out of <b>25</b></div> -->
					   <?php
                                      }
                                       $sql1 = "SELECT * FROM periods";
                                       $result1 = mysqli_query($conn,$sql1) or die("Query FAiled.");

                                       if(mysqli_num_rows($result1) >0){
                                        $total_records = mysqli_num_rows($result1);
                                        $limit = 3;
                                        $total_page = ceil( $total_records / $limit);


										echo '<ul class="pagination">';
                                       if($page >1){
                                        // echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                                        echo '<li class="page-item disabled"><a href="manage_periods.php?page='.($page-1).'">Previous</a></li>';                                       
                                       }                                        
                                        for($i = 1; $i <= $total_page; $i++){
                                            if($i== $page){
                                                $active = "active";
                                            }
                                            else{
                                                $active = "";
                                            }
                                            // echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                                            echo '<li class="'.$active.'" class="page-item "><a href="manage_periods.php?page='.$i.'"class="page-link">'.$i.'</a></li>';
                                        }
                                        if($total_page >$page){
                                            // echo '<li><a  href="users.php?page='.($page+1).'">Next</a></li>';
                                            echo '<li class="page-item "><a href="manage_periods.php?page='.($page+1).'" class="page-link">Next</a></li>';
                                           }
                                        echo '</ul>';
                                       }
                                       ?>   
					   </div>
 
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- Info boxes -->
            <div class="card">
              <div class="card-header py-1">
                <h3 class="card-title">
                  Add New Period
                </h3>
              </div>
              <div class="card-body">
              <form method="POST">
              <div > <label>Title:</label><input type="text" name="name"  required class="form-control"><br></div>
              <div ><label>Start Time:</label><input type="time" name="start_time" required class="form-control"><br></div>
              <div ><label>End Time:</label><input type="time" name="end_time" required class="form-control"><br></div>
        <button type="submit" class="btn btn-success float-right">Add Period</button>
               </form>
              </div>
            </div>
          </div>
         

      </div><!--/. container-fluid -->
    </section>
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>