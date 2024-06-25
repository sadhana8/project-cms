<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
                <?php
                       include "../admin/dbconfig.php";
                              $query = "SELECT * FROM setting";
                                 $query_run = mysqli_query($conn,$query);
  
                            if(mysqli_num_rows($query_run)>0){
								while($row = mysqli_fetch_assoc($query_run)){
                                   ?>
	                <li><span class="icon icon-map-marker"></span><span class="text"> <?php echo $row['address'] ?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text"> <?php echo $row['phone'] ?></span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"> <?php echo $row['email'] ?></span></a></li>
                  <?php
                                     }
									}
                                          ?>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Events</h2>
              <?php
    include "../admin/dbconfig.php";
    $query = "SELECT * FROM event";
    $query_run = mysqli_query($conn,$query);
  
    if(mysqli_num_rows($query_run)>0){
		while($row = mysqli_fetch_assoc($query_run)){
    ?>
              <div class="block-21 mb-4 d-flex">
        
                <a class="blog-img mr-4" ><img src="../admin/upload/event/<?php echo $row['image']; ?>" style="height:80px; width:80px;"></a>
                <div class="text">
                  <h3 class="heading"><a href="#"><?php  echo $row['title']; ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span><?php  echo $row['date']; ?></a></div>
                    
                  </div>
                </div>
          

              </div>
              <?php
        }
          }
        ?>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="about.php"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="event.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
                <li><a href="course.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Deparments</a></li>
                <li><a href="contact.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <!-- <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Feedback!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="email" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Message">
                  <input type="submit" value="Send" class="form-control submit px-3">
                  
                  
                </div>
              </form>
            </div> -->
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                
                <li class="ftco-animate"><a href="https://www.facebook.com/"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="https://github.com/"><span class="icon-github"></span></a></li>
                
                <li class="ftco-animate"><a href="https://web.whatsapp.com/"><span class="icon-whatsapp"></span></a></li>
                
                
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
          <?php
                       include "../admin/dbconfig.php";
                              $query = "SELECT * FROM setting";
                                 $query_run = mysqli_query($conn,$query);
  
                            if(mysqli_num_rows($query_run)>0){
								while($row = mysqli_fetch_assoc($query_run)){
                                   ?>
            <p>  <?php echo $row['footer'] ?></a>   </p>
            <!-- <p>  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Welcome to Cylons Technical University <i class="icon-heart" aria-hidden="true"></i> <a href="https://www.cylons.com" target="_blank">Nepal</a> -->

          </div>
          <?php
                                     }
									}
                                          ?>
					    </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.min.js"></script>
<script>
  new DataTable('#example');
</script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>