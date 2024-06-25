
<?php
         include "header.php";
    
         include ("../admin/dbconfig.php");
         $error = "";
         $msg = "";
         if (isset($_POST['send'])) {
           $name = $_POST['name'];
           $email = $_POST['email'];
           $phone = $_POST['phone'];
           $subject = $_POST['subject'];
           $message = $_POST['message'];
         
           if (!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
         
             $sql = "INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
             $result = mysqli_query($conn, $sql);
             if ($result) {
               $msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
             } else {
               $error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
             }
           } else {
             $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
           }
         }

?>

	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center px-4">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
	        	<li class="nav-item"><a href="teacher.php" class="nav-link">Staff</a></li>
	        	<li class="nav-item"><a href="event.php" class="nav-link">Events</a></li>
	          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
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
            <h1 class="mb-2 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
    <?php
                       include "../admin/dbconfig.php";
                              $query = "SELECT * FROM setting";
                                 $query_run = mysqli_query($conn,$query);
  
                            if(mysqli_num_rows($query_run)>0){
								while($row = mysqli_fetch_assoc($query_run)){
                                   ?>
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Address</h3>
	            <p><?php echo $row['address'] ?></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Contact Number</h3>
	            <p><?php echo $row['phone'] ?></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
            
          		<h3 class="mb-4">Email Address</h3>
	            <p><?php echo $row['email'] ?></p>
           
            </div>
          </div>
          <!-- <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">yoursite.com</a></p>
	          </div>
          </div> -->
        </div>
      </div>
      <?php
                                     }
									}
                                          ?>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
      
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
					<form class="w-100" action="#" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="name"placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Your Email"required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="phone"placeholder="Your phone"required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject"placeholder="Subject"required>
              </div>
              <div class="form-group">
                <textarea  id="" cols="30" rows="7" class="form-control"name="message" placeholder="Message"required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" name="send" class="btn btn-primary py-3 px-5">
              </div>
            </form>
					</div>
          
					<div class="col-md-6 p-4 d-flex align-items-stretch">
          <iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5644.408542716626!2d-117.1523848363907!3d32.73426737275872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80d95495497f80c9%3A0x5df0f4372635e247!2sSan%20Diego%20Zoo!5e0!3m2!1sen!2snp!4v1658568764228!5m2!1sen!2snp"
				width="500" height="600" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</section>


		
    
<?php
         include "footer.php";
         ?>