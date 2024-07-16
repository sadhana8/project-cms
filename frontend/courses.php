<?php
         include "header.php";
         ?>

    
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center px-4">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <!-- <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form> -->
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item active"><a href="courses.php" class="nav-link">Courses</a></li>
	        	<li class="nav-item"><a href="teacher.php" class="nav-link">Staff</a></li>
	        	<li class="nav-item"><a href="event.php" class="nav-link">Events</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Courses</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
			<div class="container-fluid px-4">
				<div class="row">
				<?php
    include "../admin/dbconfig.php";
    $query = "SELECT * FROM dept_category";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
		while($row = mysqli_fetch_assoc($query_run)){
		
    ?>
					<div class="col-md-3 course ftco-animate">
						<div class="img"><img src="../admin/upload/departments/<?php echo $row['image']; ?>" style="height:300px; width:300px;"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-note mr-2"></i><?php  echo $row['department']; ?> </span>
								<span><i class="icon-table mr-2"></i>8 Semester</span>
								<span><i class="icon-calendar mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#"> <?php  echo $row['name']; ?></a></h3>
							<p><?php  echo $row['description']; ?></p>
							<!-- <p><a href="#" class="btn btn-primary">Syllabus</a></p> -->
						</div>
					</div>
					<?php
            }
            }
            ?>		
				</div>
			</div>
		</section>

		
        <?php
         include "footer.php";
         ?>

    