<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cylons Technical University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		
    			
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="" height="70" width="90">Cylons.<span > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Technical University</span></a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
							<?php
                       include "../admin/dbconfig.php";
                              $query = "SELECT * FROM setting";
                                 $query_run = mysqli_query($conn,$query);
  
                            if(mysqli_num_rows($query_run)>0){
								while($row = mysqli_fetch_assoc($query_run)){
                                   ?>
					    		<span>Email</span>
						    	<span><?php echo $row['email'] ?></span>
						    </div>
							
							<?php
                                     }
									}
                                          ?>
        
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
							<?php
                       include "../admin/dbconfig.php";
                              $query = "SELECT * FROM setting";
                                 $query_run = mysqli_query($conn,$query);
  
                            if(mysqli_num_rows($query_run)>0){
								while($row = mysqli_fetch_assoc($query_run)){
                                   ?>
						    	<span>Call</span>
						    	<span>Call Us: <?php echo $row['phone'] ?></span>
						    </div>
							<?php
                                     }
									}
                                          ?>
					    </div>
					    <!-- <div class="col-md topper d-flex align-items-center justify-content-end">
					    	<p class="mb-0">
					    		<a href="../admin/login.php" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
					    			<span>Login</span>
					    		</a>
					    	</p>
					    </div> -->
						
				    </div>
			    </div>
		    </div>
		  </div>
    </div>