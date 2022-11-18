<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
      <!-- PAGE TITLE -->
      <title>Home - Coral Yachts</title>

      <!-- META-DATA -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="" >
      <meta name="keywords" content="" >

      <!-- FAVICON -->
      <?php include_once('./favicon.php')?>

      <!-- CSS:: FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

      <!-- CSS:: MAIN -->
      <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      <link rel="stylesheet" type="text/css" id="r-color-roller" href="assets/color-files/color-08.css">

      <?php
      include_once('./includes/connection.php');
      include_once('./includes/yacht.php');

      $yacht = new Yacht;
      $yachts = $yacht->fetch_all();
      ?>
  </head>
  <body> 
      <div class="r-wrapper">
        <header>
          <div class="r-header r-header-inner">
          <div class="r-header-strip">
              <div class="container">
                <div class="row clearfix">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="r-logo">
                      <a href="index.php" class="d-inline-block"><img src="assets/afbeeldingen/logo_large.png" class="img-fluid d-block" alt=""></a>
                    </div>
                    <a href="javaScript:void(0)" class="menu-icon"> <i class="fa fa-bars"></i> </a>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="r-header-action float-right">
                      <a href="login-register.php"> <i class="fa fa-lock"></i> <span>Login</span></a>
                    </div>
                    <div class="r-nav-section float-right">
                      <nav>
                        <ul>
                          <li class="r-has-child">
                            <a href="index.php">HOME</a>
                          </li>
                          <li class="r-has-child">
                            <a href="about.php">ABOUT US</a>
                          </li>
                          <li class="r-has-child">
                            <a href="yacht-listing.php">YACHTS</a>
                          </li>
                          <li><a href="yacht-ports.php">YACHT PORTS</a></li>
                          </li>
                          <li><a href="contact.php">CONTACT US</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="r-header-inner-banner">
              <div class="r-header-in-over">
                <h1> <b>Yachts</b> </h1>
                <div class="r-breadcrum">
                  <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><span>YACHTS</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </header>

        <section class="r-car-showcase-wrapper">
          <div class="r-best-vehicles">
            <div class="container">
              <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12">

                  <div class="r-car-showcase">
                    <div class="row clearfix r-best-offer-list">
                      
                      <?php 
                      foreach ($yachts as $yacht) { ?>
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="r-best-offer-single">
                          <div class="r-best-offer-in">
                            <div class="r-offer-img">
                              <a class="d-inline-block" href="#"><img style="height:284px; width:512px;"src="<?php echo $yacht['yacht_img']; ?>" class="img-fluid d-block m-auto" alt=""></a>
                              <a href="yacht.php?id=<?php echo $yacht['yacht_id'];?>">
                                <div class="r-offer-img-over">
                                  <i class="fa fa-search"></i>
                                </div>
                              </a>
                            </div>
                            <div class="r-best-offer-content">
                              <a href="yacht.php?id=<?php echo $yacht['yacht_id']; ?>">
                                <?php echo $yacht['yacht_name']; ?>
                              </a>
                              <br>
                              <small><b>
                                  <?php echo date('M l jS')?>
                              </b></small>
                            </div>
                            <a href="yacht.php?id=<?php echo $yacht['yacht_id'];?>"><div class="r-offer-rewst-this">
                              <span class="text-uppercase">Rent this yacht</span>
                            </div></a>
                          </div>
                        </div>
                      </div>
                      <?php } ?>


                </div>
              </div>
            </div>
          </div>
        </section>
        <footer>
          <div class="r-footer">
            <div class="container">
              <div class="row clearfix">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <img src="assets/afbeeldingen/logo_small.png" class="d-block img-fluid" alt="">
                    <p>
                      We know the difference is in the details and that’s why our Yachtrental services, in the tourism and business industry, stand out for their quality.
                    </p>
                    <form action="#">
                      <div class="r-newsletter">
                        <input type="email" placeholder="Subscribe Newsletter">
                        <button class="btn"><i class="fa fa-envelope"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <div class="r-footer-widget r-footer-phone">
                      <span><i class="fa fa-phone"></i> CALL US ON LINE 1</span>
                      <h5>100.1212.2000</h5>
                    </div>
                    <div class="r-footer-widget r-footer-nav">
                      <h6>USEFUL LINK</h6>
                      <nav>
                        <ul>
                          <li><a href="#">Private Policy</a></li>
                          <li><a href="#">Term & Conditions</a></li>
                          <li><a href="#">Copyright Notification</a></li>
                          <li><a href="#">Register for New Member</a></li>
                          <li><a href="#">Press Release</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <div class="r-footer-widget r-footer-phone">
                      <span><i class="fa fa-phone"></i> CALL US ON LINE 2</span>
                      <h5>100.2424.2000</h5>
                    </div>
                    <div class="r-footer-widget r-footer-nav">
                      <h6>OUR INFO</h6>
                      <nav>
                        <ul>
                          <li><a href="#">About Coral Yachts</a></li>
                          <li><a href="#">Our Mission & Strategy</a></li>
                          <li><a href="#">Our Vision</a></li>
                          <li><a href="#">Coral YachtsAdvantages</a></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              <div class="row clearfix r-footer-strip">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 ©2018 Created by jThemes Studio
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <ul>
                   <li><a href="#"><i class="fa fa-facebook"></i>. <span>Facebook</span></a></li>
                   <li><a href="#"><i class="fa fa-twitter"></i>.<span>Twitter</span></a></li>
                   <li><a href="#"><i class="fa fa-instagram"></i>.<span>Instagram</span></a></li>
                 </ul>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div id="r-to-top" class="r-to-top"><i class="fa fa-angle-up"></i></div>
      <!-- JQUERY:: JQUERY.JS -->
      <script src="assets/js/jquery.min.js"></script>

      <!-- JQUERY:: APPEAR.JS -->
      <script src="assets/js/plugins/appear/appear.js"></script>

      <!-- JQUERY:: COUNTER.JS -->
      <script src="assets/js/plugins/counter/jquery.easing.min.js"></script>
      <script src="assets/js/plugins/counter/counter.min.js"></script>


      <!-- JQUERY:: BOOTSTRAP.JS -->
      <script src="assets/js/tether.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>

      <!-- JQUERY:: DATEPICKER.JS -->
      <script src="assets/js/plugins/datepicker/moment-with-locales.min.js"></script>
      <script src="assets/js/plugins/datepicker/moment-timezone.js"></script>
      <script src="assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>

      <!-- JQUERY:: PLUGINS -->
      <script src="assets/js/plugins/owl/owl.carousel.min.js"></script>
      <script src="assets/js/plugins/lightcase/lightcase.js"></script>
      <script src="assets/js/plugins/owl/owl.carousel2.thumbs.js"></script>

      <!-- JQUERY:: MAP -->
      <script src="assets/js/map.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl-EDTJ5_uU3zBIX7-wNTu-qSZr1DO5Dw"></script>


      <!-- JQUERY:: CUSTOM.JS -->
      <script src="assets/js/custom.js"></script>
  </body>
</html>
