<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/user.php');

if (isset($_SESSION['logged_in'])) {
    // display index 
    ?>
    
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
      <!-- PAGE TITLE -->
      <title>User Panel - Coral Yachts</title>

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
      include_once('../includes/user.php');
      include_once('./specific-user.php');

      $user = new User;
      $users = $user->fetch_all();
      $specific_user = new Specific_user;
      $specific_users = $specific_user->fetch_all();
      //echo $specific_user['name'];
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
                <h1><b>User Panel</b></h1>
                <div class="r-breadcrum">
                  <ul>
                  <li><a href="../index.php">HOME</a></li>
                    <li><span>USER</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </header>
        <section id="r-logged-in">
          <div class="r-login-register">
            <div class="container">
                <div>
                <h2><b>Logged in</b></h2>
                <p>Welcome,
                    <?php 
                    echo $_SESSION['user_name'];
                    ?>!
                </p>
                    <span><a class="cms-link-btn" href="reservations.php">My Reservations</a></span>
                    <span><a class="cms-link-btn" href="update-user.php">Update user information</a></span>
                    <span><a class="cms-link-btn" href="logout.php">logout</a></span><br/><br/><br/>

                    <h4><b>Persoonlijke gegevens</b></h4>
                      <?php foreach ($specific_users as $specific_user) { ?>
                      <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="r-best-offer-single">
                          <div class="r-best-offer-in">
                            <br/>
                            <div style="border-bottom: 3px solid #000000;" class="r-best-offer-content">
                                <p><b>Username</b> = <?php echo $specific_user['user_name']; ?></p>
                                <p><span style="font-weight:500; color:cadetblue;">name = </span><?php echo $specific_user['name']; ?></p>
                                <p><span style="font-weight:500; color:cadetblue;">lastname = </span><?php echo $specific_user['lastname']; ?></p>
                                <p><span style="font-weight:500; color:cadetblue;">email = </span><?php echo $specific_user['email']; ?></p>
                                <p><span style="font-weight:500; color:cadetblue;">telephone = </span><?php echo $specific_user['telephone']; ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </p>
                    <br/>
                    <br/>
                      <?php } ?>
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
    // display login
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
                header("Location: user.php");
                exit();
            } else {
                // user entered false details
                $error = 'Incorrect details!';
            }
        }
        
    }
  if (isset($_POST['user_name'], $_POST['user_password'], $_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['telephone'],)) {
    $user_name = $_POST['user_name'];
    $user_password = nl2br($_POST['user_password']);
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    if (empty($user_name) or empty($user_password) or empty($name) or empty($lastname) or empty($email) or empty($telephone)) {
        $error2 = 'All fields are required!';
    } else {
        $query = $pdo->prepare('INSERT INTO users (user_name, user_password, name, lastname, email, telephone) VALUES (? ,? , ?, ?, ?, ?)');

        $query->bindValue(1, $user_name);
        $query->bindValue(2, $user_password);
        $query->bindValue(3, $name);
        $query->bindValue(4, $lastname);
        $query->bindValue(5, $email);
        $query->bindValue(6, $telephone);

        $query->execute();

        header('Location: index.php');
    }
  }
    ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
      <!-- PAGE TITLE -->
      <title>Login-Register - Coral Yachts</title>

      <!-- META-DATA -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta name="description" content="" >
      <meta name="keywords" content="" >

      <!-- Scripts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
      <script src="../includes/phonenumber.js"></script>

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
                <h1><b>Login or Register</b></h1>
                <div class="r-breadcrum">
                  <ul>
                    <li><a href="../index.php">HOME</a></li>
                    <li><span>USER LOGIN</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </header>
        <section id="r-login-register">
          <div class="r-login-register">
            <div class="r-login-register-in">
              <div class="r-auth-or">
                <span>OR</span>
              </div>
              <div class="clearfix">
                <div class="r-auth-outer r-login">
                  <div class="r-auth-head">
                    <h2><b>Login</b> Now</h2>
                    <span>Login to our website</span>
                    <small>Are you an admin? Click <a style="text-decoration: underline; color: black;" href="../admin/index.php">here</a>.</small>
                  </div>
                  <?php if (isset($error)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error?></span>
                    <br></br>
                    <?php } ?>
                  <div class="r-auth-form">
                    <form action="index.php" method="post">
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
                        <input style="color:white;" class="admin-btn" type="submit" value="Login">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="r-auth-outer r-register">
                  <div class="r-auth-head">
                    <h2><b>Register</b> Now</h2>
                    <span>Required information for account creation</span>
                  </div>
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
                    <?php if (isset($error2)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error2?></span>
                    <br></br>
                    <?php } ?>
                  <div class="r-auth-form">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" type="text" name="user_name" placeholder="Username"/>
                                <input class="form-control" type="text" name="user_password" placeholder="Password"/>
                                <input class="form-control" type="text" name="name" placeholder="Name"/>
                                <input class="form-control" type="text" name="lastname" placeholder="Lastname"/>
                                <input class="form-control" type="text" name="email" placeholder="Email"/>
                                <input class="form-control" id="phonenumbertextbox" type="text" name="telephone" placeholder="Phone Number"/>
                                <input style="color:white;" class="admin-btn" type="submit" value="Register">
                            </div>
                        </form>
                    </div>
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
}
?>