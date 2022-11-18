<?php

session_start();

include_once('./includes/connection.php');
include_once('./includes/yacht.php');

$yacht = new Yacht();
    if (isset($_POST['ReserveNow2Btn'])) {
      if (isset($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['telephone'], $_POST['start_date'], $_POST['end_date'])) {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $yacht_id = ($_SESSION['yacht_id']);

      if (empty ($name) or empty ($lastname) or empty ($email) or empty ($telephone) or empty ($start_date) or empty ($end_date)) {
        $error = 'All fields required!';
      } else {
        $antierror = "Succesfully added reservation!<br/><small>An email has been sent to $email!<br/>Click <a style='text-decoration:underline;color:#87ab69;'href='./user' >here</a> to make an account.</small>";

        $query = $pdo->prepare('INSERT INTO users (name, lastname, email, telephone) VALUES (?, ?, ?, ?)');
        $query->bindValue(1, $name);
        $query->bindValue(2, $lastname);
        $query->bindValue(3, $email);
        $query->bindValue(4, $telephone);

        $query->execute();

        $user_id = $pdo->lastInsertId();

        $query = $pdo->prepare('INSERT INTO reservations (yacht_id, user_id, start_date, end_date) VALUES (?, ?, ?, ?)');
        $query->bindValue(1, $yacht_id);
        $query->bindValue(2, $user_id);
        $query->bindValue(3, $start_date);
        $query->bindValue(4, $end_date);

        $query->execute();
      }
      }
    }
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
                        <h1>Booking <b></b></h1>
                        <div class="r-breadcrum">
                        <ul>
                            <li><a href="./index.php">HOME</a></li>
                            <li><a href="./yacht-listing.php">Yachts</a></li>
                            <li><span>Booking</span></li>
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
                        </div>
                    </div>
                    </div>


                    <div>
                    <?php if (isset($error)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error;?></span>

                    <br/><br/>
                    <?php } ?>
                    <?php if (isset($antierror)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror;?></span><br/><br/>
                    <?php } ?><br/>

                        <div class="r-accordion-body">
                            <form action="yacht-reservation-confirmation2.php" method="POST">
                              <div>
                              <h2 class="r-accordion-heading">Personal Information</h2>
                                <div class="row">
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                <label for="nameField">Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Name"/>
                                <label for="lastnameField">Lastname</label>
                                <input class="form-control" type="text" name="lastname" placeholder="Lastname"/>
                                <label for="emailField">Email</label>
                                <input class="form-control" type="text" name="email" placeholder="Email"/>
                                <label for="telephoneField">Phone number</label>
                                <input class="form-control" type="text"id="phonenumbertextbox" name="telephone" id="newtelephone" placeholder="Phone number"></input><br/>
                                  <h2 class="r-accordion-heading">Booking Details</h2>
                                  <label for="changestartdatetField">Change Start date:</label><br/>
                                  <input class="form-control" type="date" name="start_date" placeholder="start date"/>
                                  <label for="changestartdatetField">Change End date:</label><br/>
                                  <input class="form-control" type="date" name="end_date" placeholder="end date"/>
                                </div>
                              </div>
                              <div>

                              <div>
                              <input type="submit" name="ReserveNow2Btn" class="btn-primary" value="Book now" /></div>
                            </form>
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