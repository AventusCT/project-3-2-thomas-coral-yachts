<?php

session_start();

include_once('./includes/connection.php');
include_once('./includes/yacht.php');
include_once('./includes/user.php');

$user = new User;
$users = $user->fetch_all();
$yacht = new Yacht();

    
if (isset($_SESSION['logged_in']))  {
    //display add page
    if (isset($_POST['ReserveNowBtn'])) {
      if (isset($_POST['start_date'], $_POST['end_date'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $user_id = ($_SESSION['user_id']);
        $yacht_id = ($_SESSION['yacht_id']);

        if (empty ($start_date) or empty($end_date)) {
          $error = 'All fields required!';
        
        
        } else {
          $query = $pdo->prepare('INSERT INTO reservations (yacht_id, user_id, start_date, end_date) VALUES (? ,? , ?, ?)');
          $query->bindValue(1, $yacht_id);
          $query->bindValue(2, $user_id);
          $query->bindValue(3, $start_date);
          $query->bindValue(4, $end_date);

          $query->execute();


          $query = $pdo->prepare('SELECT email FROM users WHERE user_id = ?');
          $query->bindValue(1, $user_id);
          $query->execute();
          $num = $query->rowCount();
          $row = $query->fetch(PDO::FETCH_ASSOC);
          $email = $row['email'];

          $antierror = "Your Reservation has been completed!</br>An email has been sent to $email!";
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
                    <h5 style="color: #80ab69;" class="r-accordion-heading">Logged in.</h5>
                    <?php if (isset($error)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error;?></span>

                    <br/><br/>
                    <?php } ?>
                    <?php if (isset($antierror)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror;?></span><br/><br/><br/>
                    <h6><a href="./user/reservations.php">My Reservations</a></h6>
                    <h6><a href="./user/logout.php">Logout</a></h6>

                    <br>
                    <?php } ?>
                    
                            <h2 class="r-accordion-heading">Booking Detail</h2>


                        <div class="r-accordion-body">
                            <form action="yacht-reservation-confirmation.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <label for="changestartdatetField">Change Start date:</label><br/>
                                <input class="form-control" type="date" name="start_date" placeholder="start date"/>
                                </div>
                                <input type="submit" name="ReserveNowBtn" class="btn-primary" value="Book Now" />
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>"></input>
                                <input type="hidden" name="hidden_id" value="<?php echo $data['yacht_id'] ?>"></input>
                                <label for="changeenddatetField">Change End date:</label><br/>
                                <input class="form-control" type="date" name="end_date" placeholder="end date"/><br/>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
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

    <?php
} else {
  if (isset($_POST['reslogin'])) {
    $needlogin = "block";
    $error = 'In order to place a reservation you must be logged in!';
      } else {
        $needlogin = "none";
      }
  // display login
  if (isset($_POST['loginbtn'])) {
    $needlogin = "block";
    if (isset($_POST['username'], $_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      if (empty($username) or empty($password)) {
          $error = 'All fields are required!';
      } else {
          $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

          $query->bindValue(1, $username);
          $query->bindValue(2, $password);

          $query->execute();

          $num = $query->rowCount();
          $row = $query->fetch(PDO::FETCH_ASSOC);

          if ($num ==1) {
              // user entered correct details
              $_SESSION['logged_in'] = true;
              $_SESSION['user_name'] = $username;
              $_SESSION['user_id'] = $row['user_id'];
              header('Location: yacht-reservation-confirmation.php');
              exit();
          } else {
              // user entered false details
              $error = 'Incorrect details!';
          }
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
                    <div  style="display:<?php echo $needlogin?>;" class="hidden-login">
                    <div class="r-login-register" style="background-color:white; padding: 0 0;">
            <div class="r-login-register-in">
                  <div class="r-auth-head">
                    <h2><b>Login</b> Now</h2>
                    <span>Login to our website<br/><small>Don't have an account? Register <a href="./user/" style="text-decoration:underline;color:#292b2c;">here</a>!</small></span>
                    
                  </div>
                  
                    
                  <?php if (isset($error)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error?></span>
                    <br></br>
                    <?php } ?>
                  <div class="r-auth-form">
                    <form action="yacht-reservation-confirmation.php" method="post">
                      <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <style>
                            .admin-btn {
                                text-align: center; font-weight: 600; background: #ffcd00; font-size: 14px; width: 100%; transition: all 0.2s ease-in-out; cursor: pointer;}
                            .admin-btn:hover {
                                background-color: #333;}
                        </style>
                        <input style="color:white;" name="loginbtn" class="admin-btn" type="submit" value="Login">
                      </div>
                    </form>
                  </div>
                </div>
              </div><br/>
                    </div>
                    
                            <h2 class="r-accordion-heading">Booking Detail</h2>
  
  
                        <div class="r-accordion-body">
                            <form action="yacht-reservation-confirmation.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <label for="changestartdatetField">Change Start date:</label><br/>
                                <input class="form-control" type="date" name="start_date" placeholder="start date"/>
                                </div>
                                <input type="submit" name="reslogin" class="btn-primary" value="Book Now" />
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                <label for="changeenddatetField">Change End date:</label><br/>
                                <input class="form-control" type="date" name="end_date" placeholder="end date"/><br/>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
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
  <?php
}
?>