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
	        	<li class="nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
	        	<li class="nav-item"><a href="teacher.php" class="nav-link">Staff</a></li>
	        	<li class="nav-item active"><a href="event.php" class="nav-link">Events</a></li>
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
            <h1 class="mb-2 bread">Recent Events</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Events<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
        <div class="row">
				<?php
    include "../admin/dbconfig.php";
    $query = "SELECT * FROM event";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
		while($row = mysqli_fetch_assoc($query_run)){
    ?>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="event-single.php" class="block-20 d-flex align-items-end" >
             
								<div class="meta-date text-center p-2">
                <img src="../admin/upload/event/<?php echo $row['image']; ?>" style="height:200px; width:250px;">
                  <span class="day"><?php  echo $row['date']; ?></span>
                  <!-- <span class="mos">June</span>
                  <span class="yr">2019</span> -->
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="#"><?php  echo $row['title']; ?></a></h3>
                <p><?php  echo $row['description']; ?></p>
                <div class="d-flex align-items-center mt-4">
	                <!-- <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p> -->
	                <!-- <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2">Admin</a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p> -->
                </div>
              </div>
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