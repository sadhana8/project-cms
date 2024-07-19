<?php
include('../admin/security.php');
include('header.php'); 
include('navbar.php'); 
include "../admin/dbconfig.php";

// if (isset($_POST['submit'])) {
//     $dept_cate_id = $_POST['dept_cate_id'];
//     $name = $_POST['name'];
//     $description = $_POST['description'];
//     $section = $_POST['section'];

//     $sql = "INSERT INTO dept_list (dept_cate_id, name, description, section) VALUES ('$dept_cate_id', '$name', '$description', '$section')";
//     if ($conn->query($sql) === TRUE) {
//         echo "Department added successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

?>
<head>
    <title>Manage Department List</title>
</head>
<body>
    <!-- <h1>Manage Departments</h1>
    <form method="POST">
        <label>Category ID:</label><input type="text" name="dept_cate_id" required><br>
        <label>Name:</label><input type="text" name="name" required><br>
        <label>Description:</label><input type="text" name="description" required><br>
        <label>Section:</label><input type="text" name="section" required><br>
        <button type="submit">Add Department</button>
    </form> -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Department List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Department List</li>
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
               Department List
                </h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive bg-white">
                    <?php
              
                        $limit = 3;
                                        
                        if(isset($_GET['page'])){
                           $page = $_GET['page'];
                        }else{
                           $page =1;
                        }
                        $offset = ($page - 1 ) * $limit;
                        $query = "SELECT * FROM dept_list ORDER BY id LIMIT {$offset},{$limit}";
                        $query_run = mysqli_query($conn,$query)or die("Query Failed.");
                if(mysqli_num_rows($query_run)>0){
    ?>
 
 <table class="table table-bordered">
    <tr>
        <th>Department ID</th>
        <th>Category ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Section</th>
    </tr>
    <?php
    while ($row = $query_run->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['dept_cate_id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['description'] . "</td>
                <td>" . $row['section'] . "</td>
              </tr>";
    }
    ?>
</table>

                  <div class="clearfix">
					     <!-- <div class="hint-text">showing <b>5</b> out of <b>25</b></div> -->
					   <?php
                                      }
                                       $sql1 = "SELECT * FROM dept_list";
                                       $result1 = mysqli_query($conn,$sql1) or die("Query Failed.");

                                       if(mysqli_num_rows($result1) >0){
                                        $total_records = mysqli_num_rows($result1);
                                        $limit = 3;
                                        $total_page = ceil( $total_records / $limit);


										echo '<ul class="pagination">';
                                       if($page >1){
                                        echo '<li class="page-item"><a href="manage_department.php?page='.($page-1).'">Previous</a></li>';                                       
                                       }                                        
                                        for($i = 1; $i <= $total_page; $i++){
                                            if($i== $page){
                                                $active = "active";
                                            }
                                            else{
                                                $active = "";
                                            }
                                            echo '<li class="'.$active.' page-item"><a href="manage_department.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
                                        }
                                        if($total_page >$page){
                                            echo '<li class="page-item"><a href="manage_department.php?page='.($page+1).'" class="page-link">Next</a></li>';
                                           }
                                        echo '</ul>';
                                       }
                                       ?>   
					   </div>
 
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="col-lg-4">
             <div class="card">
              <div class="card-header py-1">
                <h3 class="card-title">
                  Add New Department
                </h3>
              </div>
              <div class="card-body">
              <form method="post" >
                <div>
                <label>Category ID:</label>
    <input type="text" name="dept_cate_id" required class="form-control">
    </div>
    <div>
    <label>Name:</label>
    <input type="text" name="name" required class="form-control">
    </div>
    <div>
    <label>Description:</label>
    <input type="text" name="description" required class="form-control">
    </div>
    <div>
    <label>Section:</label>
    <input type="text" name="section" required class="form-control">
    </div><br>
    <div>
    <button type="submit" name="submit" class="btn btn-success float-right">Add Department</button>
</form>
              </div>
            </div>
          </div> -->
         

      </div><!--/. container-fluid -->
    </section>
    <?php
include('scripts.php');
include('footer.php');
?>
