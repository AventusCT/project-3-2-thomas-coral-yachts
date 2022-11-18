<?php

session_start();

include_once('includes/connection.php');
include_once('includes/yacht.php');
include_once('./includes/user.php');

$user = new User;
$users = $user->fetch_all();
$yacht = new Yacht();

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $data = $yacht->fetch_data($id);
      $_SESSION['yacht_id'] = $data['yacht_id'];
    ?>


<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <!-- PAGE TITLE -->
        <title>Home - Royal Cars</title>

        <!-- META-DATA -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="" >
        <meta name="keywords" content="" >

        <!-- FAVICON -->
        <?php include_once('./favicon.php')?>

        <!-- CSS:: FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

        <!-- CSS:: MAIN -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <link rel="stylesheet" type="text/css" id="r-color-roller" href="assets/color-files/color-08.css">

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
                            <a href="index.php" class="d-inline-block"><img src="assets/afbeeldingen/logo_large.png" class="img-fluid d-block" alt=""></a>
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
                    <div class="r-header-inner-banner">
                    <div class="r-header-in-over">
                        <h1>Booking <b><?php echo $data['yacht_name'];?></b></h1>
                        <div class="r-breadcrum">
                        <ul>
                            <li><a href="./index.php">HOME</a></li>
                            <li><a href="./yacht-listing.php">Yachts</a></li>
                            <li><span style="text-transform: uppercase;"> <?php echo $data['yacht_name'];?></span></li>
                        </ul>
                        <a href="./yacht-listing.php"  onMouseOver="this.style.color='#ffcd00'"
                        onMouseOut="this.style.color='#ffffff'" style="color:white; font-size: 14px; font-weight: 500; letter-spacing: 2px;">&larr; Back</a>
                        </div>
                    </div>
                    </div>
                </div>
                </header>

                <section class="r-car-info-wrapper">
                <div class="container">
                    <div class="r-car-info-header clearfix">
                    <div class="r-car-top-info">
                        <div class="r-car-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span class="r-rating-text"> YachtRATING: 5/5 </span>
                        </div>
                        <h2 class="r-car-name">Mega Yacht<span><b><?php echo $data['yacht_name'];?></b></span> </h2>
                    </div>
                    </div>

                    <div class="r-car-whole-info">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="r-car-product-carousel-wrapper">
                            <div class="r-car-product-carousel owl-carousel" data-slider-id="r-product-slider" id="productSlider">
                            <div class="item">
                                <img src="<?php echo $data['yacht_img'];?>" alt="" class="img-fluid" />
                            </div>
                            <div class="item">
                                <img src="assets/images/car-slider-img-2.jpg" alt="" class="img-fluid" />
                            </div>
                            <div class="item">
                                <img src="assets/images/car-slider-img-3.jpg" alt="" class="img-fluid" />
                            </div>
                            <div class="item">
                                <img src="assets/images/car-slider-img-4.jpg" alt="" class="img-fluid" />
                            </div>
                            </div>

                            <ul class="owl-thumbs r-car-product-carousel-thumb" data-slider-id="r-product-slider">
                            <li class="owl-thumb-item"> <img src="<?php echo $data['yacht_img'];?>" alt="" class="img-fluid" /> </li>
                            <li class="owl-thumb-item"> <img src="assets/images/car-slider-img-2.jpg" alt="" class="img-fluid" /> </li>
                            <li class="owl-thumb-item"> <img src="assets/images/car-slider-img-3.jpg" alt="" class="img-fluid" /> </li>
                            <li class="owl-thumb-item"> <img src="assets/images/car-slider-img-4.jpg" alt="" class="img-fluid" /> </li>
                            </ul>
                        </div>
                        </div>

                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="r-car-info-content">
                            <h2 class="r-product-name">Description</h2>
                            <span class="r-reg-year">Port: <?php echo $data['yacht_port'];?></span>
                            <span class="r-reg-year">Type: <?php echo $data['yacht_type'];?></span>
                            <p class="r-product-description"><?php echo $data['yacht_desc'];?></p>
                            <form action="yacht-reservation-confirmation.php" method="POST">
                                <input type="submit" name="ReserveNowBtn" class="btn-primary" value="Book Now" />
                            </form><br/>
                            <form action="yacht-reservation-confirmation2.php" method="POST">
                                <input type="submit" name="ReserveNow2Btn" class="btn-primary" value="Geen account reservatie(optie 2)" />
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="r-product-testimonial-wrapper">
                        <h4>Testimonials</h4>
                        <div class="owl-carousel" id="productTestimonial">
                            <div class="r-testimonial-box">
                            "We know the difference is in the details and that’s why our Yachtrental services, in the tourism and business."
                            </div>
                            <div class="r-testimonial-box">
                            "We know the difference is in the details and that’s why our Yachtrental services, in the tourism and business."
                            </div>
                            <div class="r-testimonial-box">
                            "We know the difference is in the details and that’s why our Yachtrental services, in the tourism and business."
                            </div>
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

            <!-- JQUERY:: BOOTSTRAP.JS -->
            <script src="assets/js/tether.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/plugins/owl/owl.carousel.min.js"></script>
            <script src="assets/js/plugins/owl/owl.carousel2.thumbs.js"></script>
            <script src="assets/js/custom.js"></script>

        </body>
    </html>
    <?php
    }
    ?>