<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in']))  {
    // display add page
    
    if (isset($_POST['yacht_name'], $_POST['yacht_desc'], $_POST['yacht_port'], $_POST['yacht_type'], $_POST['yacht_img'], $_POST['yacht_port_img'],)) {
        $yacht_name = $_POST['yacht_name'];
        $yacht_desc = nl2br($_POST['yacht_desc']);
        $yacht_port = $_POST['yacht_port'];
        $yacht_type = $_POST['yacht_type'];
        $yacht_img = $_POST['yacht_img'];
        $yacht_port_img = $_POST['yacht_port_img'];

        if (empty($yacht_name) or empty($yacht_desc) or empty($yacht_port) or empty($yacht_type) or empty($yacht_img) or empty($yacht_port_img)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO yachts (yacht_name, yacht_desc, yacht_port, yacht_type, yacht_img, yacht_port_img) VALUES (? ,? , ?, ?, ?, ?)');

            $query->bindValue(1, $yacht_name);
            $query->bindValue(2, $yacht_desc);
            $query->bindValue(3, $yacht_port);
            $query->bindValue(4, $yacht_type);
            $query->bindValue(5, $yacht_img);
            $query->bindValue(6, $yacht_port_img);

            $query->execute();

            $antierror = "Yacht $yacht_name added!";
        }
    }
    ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
      <!-- PAGE TITLE -->
      <title>Add Yacht - Coral Yachts</title>

      <!-- META-DATA -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta name="description" content="" >
      <meta name="keywords" content="" >

      <!-- FAVICON -->
      <link rel="shortcut icon" href="../assets/afbeeldingen/beeldmerk.png">

      <!-- CSS:: FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

      <!-- CSS:: MAIN -->
      <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
      <link rel="stylesheet" type="text/css" id="r-color-roller" href="../assets/color-files/color-08.css">
      <?php
      include_once('../includes/connection.php');
      include_once('../includes/yacht.php');

      $yacht = new Yacht;
      $yachts = $yacht->fetch_all();
      ?>
  </head>
  <style>
    .r-login-register {
        height: 100%;
    }
    .form-control {
                padding: 15px;
                border-radius: 0;
                height: 50px;
                border: none;
                font-family: "Poppins", sans-serif;
                color: #a9a9a9;
                font-size: 14px;
                margin-bottom: 10px;
                height:100%;}
            .admin-btn {
                font-size: 14px;
                text-align: center;
                font-weight: 600;
                background: #ffcd00;
                font-size: 14px;
                width: 100%;
                transition: all 0.2s ease-in-out;
                cursor: pointer;
                border: none;
                padding: 15px 0;}
            .admin-btn:hover {
                background-color: #333;}
  </style>
  <body> 
      <div class="r-wrapper">
        <header>
          <div class="r-header r-header-inner">
            <div class="r-header-strip">
              <div class="container">
                <div class="row clearfix">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="r-logo">
                      <a href="index.php" class="d-inline-block"><img src="../assets/afbeeldingen/logo_large.png" class="img-fluid d-block" alt=""></a>
                    </div>
                    <a href="javaScript:void(0)" class="menu-icon"> <i class="fa fa-bars"></i> </a>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="r-header-action float-right">
                      <a href="../login-register.php"> <i class="fa fa-lock"></i> <span>Login</span></a>
                    </div>
                    <div class="r-nav-section float-right">
                      <nav>
                        <ul>
                          <li class="r-has-child">
                            <a href="../index.php">HOME</a>
                          </li>
                          <li class="r-has-child">
                            <a href="../about.php">ABOUT US</a>
                          </li>
                          <li class="r-has-child">
                            <a href="../yacht-listing.php">YACHTS</a>
                          </li>
                          <li><a href="../yacht-ports.php">YACHT PORTS</a></li>
                          </li>
                          <li><a href="../contact.php">CONTACT US</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="r-header-inner-banner">
              <div class="r-header-in-over">
                <h1><b>Add Yacht</b></h1>
                <div class="r-breadcrum">
                  <ul>
                  <li><a href="../index.php">HOME</a></li>
                    <li><span>ADMIN</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </header>

        <section id="r-logged-in">
          <div class="r-login-register">
            <div class="container">
                <div">
                    <h2><b>Add Yacht</b></h2>
                    <a href="./yachts.php"  onMouseOver="this.style.color='#ffcd00'"
                        onMouseOut="this.style.color='#333'" style="transition: all 0.2s ease-in-out; color:#333; font-size: 14px; font-weight: 500; letter-spacing: 2px;">&larr; Back</a><br/><br/>
                    <?php if (isset($antierror)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror;?></span>
                    
                    <br></br>
                    <?php } ?>
                    <?php if (isset($error)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error?></span>
                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="add-yacht.php" method="POST">
                            <div class="form-group">
                            <label for="yachtnameField">Yacht Name</label>
                                <input class="form-control" type="text" name="yacht_name" placeholder="Yacht Name"/>
                                <label for="yachtdescriptionField">Yacht Description</label>
                                <textarea class="form-control" rows="15" cols="50" name="yacht_desc" placeholder="Yacht Description"></textarea>
                                <label for="yachtportField">Yacht Port</label>
                                <input class="form-control" type="text" name="yacht_port" placeholder="Yacht Port"/>
                                <label for="yachttypeField">Yacht Type</label>
                                <input class="form-control" type="text" name="yacht_type" placeholder="Yacht Type"/>
                                <label for="yachtimgField">Yacht Image(URL)</label>
                                <input class="form-control" type="text" name="yacht_img" placeholder="Yacht Image(URL)"/>
                                <label for="yachtportimgField">Yacht Port Image(URL)</label>
                                <input class="form-control" type="text" name="yacht_port_img" placeholder="Yacht Port Image(URL)"/>
                                <input style="color:white;" class="admin-btn" type="submit" value="Add Yacht">
                            </div>
                        </form>
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
                    <img src="../assets/afbeeldingen/logo_small.png" class="d-block img-fluid" alt="">
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

      <!-- JQUERY:: PLUGINS -->
      <script src="assets/js/plugins/owl/owl.carousel.min.js"></script>

    <!-- JQUERY:: CUSTOM -->
      <script src="assets/js/custom.js"></script>

  </body>
</html>
    <?php
} else {
    header('Location: index.php');
}
?>