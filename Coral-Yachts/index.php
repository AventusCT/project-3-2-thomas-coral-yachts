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

      <!-- CSS:: DATEPICKER -->
      <link rel="stylesheet" type="text/css" href="assets/css/plugins/datepicker/datepicker.css">

      <!-- CSS:: ANIMATE -->
      <link rel="stylesheet" type="text/css" href="assets/css/plugins/animate/animate.css">

      <!-- CSS:: MAIN -->
      <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      <link rel="stylesheet" type="text/css" id="r-color-roller" href="assets/color-files/color-08.css">

      <?php
      include_once('includes/connection.php');
      include_once('includes/yacht.php');

      $yacht = new Yacht;
      $yachts = $yacht->fetch_all();
      ?>
  </head>
  <body>
      <div class="r-wrapper">
        <header>
          <div class="r-header r-header-inner r-header-strip-02">
            <div class="r-header-strip">
              <div class="container">
                <div class="row clearfix">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="r-logo">
                      <a href="#" class="d-inline-block"><img src="assets/afbeeldingen/logo_large.png" class="img-fluid d-block" alt=""></a>
                    </div>
                    <a href="javaScript:void(0)" class="menu-icon"> <i class="fa fa-bars"></i> </a>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 pr-0">
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
            <div class="r-slider r-slider-02">  
              <div class="r-slider owl-carousel" id="defaultHomeSlider">
              <?php 
                      $count = 1;
                      foreach ($yachts as $yacht) {
                        if($count > 3) break; ?>
                <div class="r-slider-item">
                  <img style="height:1100px; width:100%;"src="<?php echo $yacht['yacht_img'];?>" class="img-fluid d-block m-auto" alt="">
                  <div class="container">
                    <div class="r-slider-top-content">
                      <h1 class="animated fadeInDown">Mega Yacht <span><?php echo $yacht['yacht_name'];?></span></h1>
                      <h4 class="animated fadeInLeft">FOR RENT <strong>$50</strong> PER DAY</h4>
                      <a href="yacht.php?id=<?php echo $yacht['yacht_id'];?>" class="btn btn-outlined animated fadeInUp"> View Yachts Now</a>
                    </div>
                  </div>
                </div>
                <?php
                      $count++;
                    } ?>
            </div>
          </div>
        </header>
        <section id="r-advantages-part" class="r-advantages-part">
          <div class="r-advantage-main-part r-advantage-main-part-white">
            <div class="container clearfix">
              <div class="advantage-head">
                <div class="row clearfix">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                    <span>120+ YACHTS TYPE &amp; BRANDS</span>
                    <h2>Coral Yachts <b>Advantages.</b></h2>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">
                    <p class="r-sub-head-text">
                      We know the difference is in the details and that’s why our Yachtrental services, in the tourism and business industry, stand out for their quality and good taste.
                    </p>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="r-advantages-box">
                     <div class="icon"> <img src="assets/afbeeldingen/boat-icon-60px.png" alt=""> </div>
                     <div class="head">24/7 Customer Online Support</div>
                     <div class="sub-text">Call us Anywhere Anytime</div>
                   </div>
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="r-advantages-box">
                     <div class="icon"> <img src="assets/afbeeldingen/boat-icon-60px.png" alt=""> </div>
                     <div class="head">Reservation Anytime You Wants</div>
                     <div class="sub-text">24/7 Online Reservation</div>
                   </div>
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="r-advantages-box">
                     <div class="icon"> <img src="assets/afbeeldingen/boat-icon-60px.png" alt=""> </div>
                     <div class="head">Lots of Picking Locations</div>
                     <div class="sub-text">250+ Locations</div>
                   </div>
                 </div>
              </div>
            </div>
          </div>
        </section>
        <section id="r-who-royal">
          <div class="r-who-royal">
            <div class="container">
              <div class="row clearfix">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="r-about-info-content">
                    <div class="r-sec-head r-sec-head-left r-sec-head-line r-sec-head-w pt-0">
                      <span>KNOW MORE ABOUT US</span>
                      <h2>Who <b>Coral Yachts</b> Are.</h2>
                    </div>
                    <p>
                      We know the difference is in the details and that’s why our Yachtrental services, in the tourism and business industry, stand out for their quality and good taste.
                    </p>
                    <ul class="mb-0 pl-0">
                      <li><i class="fa fa-check-circle"></i> We working since 1980 with 4.000 customers</li>
                      <li><i class="fa fa-check-circle"></i> All brand &amp; type yachts in our ports</li>
                      <li><i class="fa fa-check-circle"></i> 1.000+ picking locations around the world</li>
                    </ul>
                    <a href="./yacht-listing.php" class="btn-primary">VIEW ALL YACHTS</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="r-best-offer">
          <div class="r-best-vehicles">
            <div class="r-sec-head r-accent-color r-sec-head-v">
              <span>FEATURED YACHTS</span>
              <h2>Our <b>Best Offers.</b></h2>
            </div>
            <div class="container">
              <div class="row clearfix r-best-offer-list owl-theme owl-carousel" id="r-best-offers">
              <?php 
                      $count = 1;
                      foreach ($yachts as $yacht) {
                        if($count > 6) break; ?>
                <div class="">
                  <div class="r-best-offer-single">
                    <div class="r-best-offer-in">
                      <div class="r-offer-img">
                        <a class="d-inline-block" href="#"><img style="height:156px; width:256px;" src="<?php echo $yacht['yacht_img'];?>" class="img-fluid d-block m-auto" alt=""></a>
                        <a href="yacht.php?id=<?php echo $yacht['yacht_id'];?>" class="d-block">
                          <div class="r-offer-img-over">
                            <i class="fa fa-search"></i> 
                          </div>
                        </a>
                      </div>
                      <div class="r-best-offer-content">
                        <a href="#">Mega Yacht <b><?php echo $yacht['yacht_name'];?></b></a>
                        <p>Start at <b>45.00 USD</b> per day</p>
                        <ul class="pl-0 mb-0">
                          <li><i class="fa fa-car"></i><span>2017</span></li>
                          <li><i class="fa fa-cogs"></i><span>MANUAL</span></li>
                          <li><i class="fa fa-beer"></i><span>PETROL</span></li>
                          <li><i class="fa fa-road"></i><span>2.3k CC</span></li>
                        </ul>
                      </div>
                      <a href="yacht.php?id=<?php echo $yacht['yacht_id'];?>">
                        <div class="r-offer-rewst-this">
                          <span class="text-uppercase">Rent this yacht</span>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <?php
                      $count++;
                    } ?>
              </div>
            </div>
          </div>
        </section>
        <div id="r-quote">
          <div class="r-quote">
            <div class="container">
              <div class="row">
                  <div class="col-md-12" data-wow-delay="0.2s">
                      <div id="r-quote-carousel" class="carousel slide">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item">
                             <p>“This was our first time renting from Coral Yachts and we were very pleased with the whole experience. Your price was lower than other companies. Our rental experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
                          </div>
                          <div class="carousel-item active">
                            <p>“This was our first time renting from Coral Yachts and we were very pleased with the whole experience. Your price was lower than other companies. Our rental experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
                          </div>
                          <div class="carousel-item">
                             <p>“This was our first time renting from Coral Yachts and we were very pleased with the whole experience. Your price was lower than other companies. Our rental experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
                          </div>
                        </div>
                        <ol class="carousel-indicators">
                          <li data-target="#r-quote-carousel" data-slide-to="0">
                            <img class="img-fluid d-block" src="assets/images/boat-icon-60px.png" alt="">
                            <span>
                              <b>Robertho Garcia</b> <br>
                              Graphic Designer
                            </span>
                          </li>
                          <li data-target="#r-quote-carousel" data-slide-to="1" class="active text-center">
                            <img class="img-fluid d-block" src="assets/afbeeldingen/boat-icon-60px.png" alt="">
                            <span>
                              <b>Robertho Garcia</b> <br>
                              Graphic Designer
                            </span>
                          </li>
                          <li data-target="#r-quote-carousel" data-slide-to="2">
                           <img class="img-fluid d-block" src="assets/images/boat-icon-60px.png" alt="">
                           <span>
                              <b>Robertho Garcia</b> <br>
                              Graphic Designer
                           </span>
                          </li>
                        </ol>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
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