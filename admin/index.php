<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="index-report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div> -->

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="register.php">Total Register Profile</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
         <?php
         include "dbconfig.php";
          $query = "SELECT id FROM register ORDER BY id='id'";
          $query_run = mysqli_query($conn,$query);

          $row = mysqli_num_rows($query_run);
          echo '<h4>Total Profile: '.$row.'</h4>';
         ?>
               

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="student.php">Total Students</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?php
         include "dbconfig.php";
          $query = "SELECT id FROM student ORDER BY id='id'";
          $query_run = mysqli_query($conn,$query);

          $row = mysqli_num_rows($query_run);
          echo '<h4>Total Student: '.$row.'</h4>';
         ?>
            </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="faculty.php">Total Teacher</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?php
         include "dbconfig.php";
          $query = "SELECT id FROM faculty ORDER BY id='id'";
          $query_run = mysqli_query($conn,$query);

          $row = mysqli_num_rows($query_run);
          echo '<h4>Total Teacher: '.$row.'</h4>';
         ?>
            </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="departments.php">Total Course</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?php
         include "dbconfig.php";
          $query = "SELECT id FROM dept_category ORDER BY id='id'";
          $query_run = mysqli_query($conn,$query);

          $row = mysqli_num_rows($query_run);
          echo '<h4>Total Course: '.$row.'</h4>';
         ?>
            </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
   
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>