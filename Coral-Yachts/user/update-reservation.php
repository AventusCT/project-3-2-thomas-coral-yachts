<?php

session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in']))  {
    // display add page

    // <---------------------------------------------------------------- v Change Yacht v ----------------------------------------------------------------> //
      if(isset($_POST['changeYachtBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['yacht_id'],$_POST['res_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $yacht_id = $_POST['yacht_id'];
          $user_id = $_POST['hidden_id'];
          $res_id = $_POST['res_id'];
  
          if (empty($password) or empty($yacht_id) or empty($res_id)) {
              $error0 = 'All fields are required!';
  
  
          } else {
              $query = $pdo->prepare("SELECT * FROM users WHERE user_id = ? AND user_password = ?");
    
              $query->bindValue(1, $user_id);
              $query->bindValue(2, $password);

              $query->execute();

              $num = $query->rowCount();
              $row = $query->fetch(PDO::FETCH_ASSOC);
  
              if ($num ==1) {
                  // user entered correct details
                  $antierror0 = "Reservation number $res_id changed!";
  
                  $sql = 'UPDATE reservations SET yacht_id =:yacht_id WHERE reservation_id =:res_id';
  
                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":yacht_id", $yacht_id, PDO::PARAM_STR);
                      $stmt->bindParam(":res_id", $res_id, PDO::PARAM_STR);
  
                      if($stmt->execute()){
                      }
                    }
              } else {
                  // user entered false details
                  $error0 = 'Incorrect Password!';
              }
          }
          
      }
    }
    // <---------------------------------------------------------------- ^ Change Yacht ^ ----------------------------------------------------------------> //
    // <---------------------------------------------------------------- v Change Start date v ----------------------------------------------------------------> //
    if(isset($_POST['changeStartDateBtn'])) {

      // current password correct
      if (isset($_POST['password'], $_POST['start_date'],$_POST['res_id'],$_POST['hidden_id'])) {
        $password = $_POST['password'];
        $start_date = $_POST['start_date'];
        $user_id = $_POST['hidden_id'];
        $res_id = $_POST['res_id'];

        if (empty($password) or empty($start_date) or empty($res_id)) {
            $error1 = 'All fields are required!';


        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_id = ? AND user_password = ?");
  
            $query->bindValue(1, $user_id);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($num ==1) {
                // user entered correct details
                $antierror1 = "Reservation number $res_id changed!";

                $sql = 'UPDATE reservations SET start_date =:start_date WHERE reservation_id =:res_id';

                if($stmt = $pdo->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(":start_date", $start_date, PDO::PARAM_STR);
                    $stmt->bindParam(":res_id", $res_id, PDO::PARAM_STR);

                    if($stmt->execute()){
                    }
                  }
            } else {
                // user entered false details
                $error1 = 'Incorrect Password!';
            }
        }
        
    }
  }
    // <---------------------------------------------------------------- ^ Change Start date ^ ----------------------------------------------------------------> //
    // <---------------------------------------------------------------- v Change End date v ----------------------------------------------------------------> //
    if(isset($_POST['changeEndDateBtn'])) {

      // current password correct
      if (isset($_POST['password'], $_POST['end_date'],$_POST['res_id'],$_POST['hidden_id'])) {
        $password = $_POST['password'];
        $end_date = $_POST['end_date'];
        $user_id = $_POST['hidden_id'];
        $res_id = $_POST['res_id'];

        if (empty($password) or empty($end_date) or empty($res_id)) {
            $error2 = 'All fields are required!';


        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_id = ? AND user_password = ?");
  
            $query->bindValue(1, $user_id);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($num ==1) {
                // user entered correct details
                $antierror2 = "Reservation number $res_id changed!";

                $sql = 'UPDATE reservations SET end_date =:end_date WHERE reservation_id =:res_id';

                if($stmt = $pdo->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(":end_date", $end_date, PDO::PARAM_STR);
                    $stmt->bindParam(":res_id", $res_id, PDO::PARAM_STR);

                    if($stmt->execute()){
                    }
                  }
            } else {
                // user entered false details
                $error2 = 'Incorrect Password!';
            }
        }
        
    }
  }
    // <---------------------------------------------------------------- ^ Change End date ^ ----------------------------------------------------------------> //
    ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
      <!-- PAGE TITLE -->
      <title>Update Password - Coral Yachts</title>

      <!-- META-DATA -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta name="description" content="" >
      <meta name="keywords" content="" >

      <!-- FAVICON -->
      <link rel="shortcut icon" href="../assets/afbeeldingen/beeldmerk.png">

      <!-- Javascript -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
      <script src="../includes/phonenumber.js"></script>

      <!-- CSS:: FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


      <!-- CSS:: MAIN -->
      <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
      <link rel="stylesheet" type="text/css" id="r-color-roller" href="../assets/color-files/color-08.css">
      <?php
      include_once('../includes/connection.php');
      include_once('../includes/user.php');
      include_once('../includes/reservations.php');
      include_once('../includes/yacht.php');
      include_once('./specific-user-res.php');

      $user = new User;
      $users = $user->fetch_all();
      $reservation = new Reservation;
      $reservations = $reservation->fetch_all();
      $yacht = new Yacht;
      $yachts = $yacht->fetch_all();
      $specific_user_reservation = new Specific_user_reservation;
      $specific_user_reservations = $specific_user_reservation->fetch_all();
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
                <h1><b>Update User</b></h1>
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
          <!-- ---------------------------------------------------------------- v Change Yacht v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Change Yacht</b></h2>
                    <a href="./reservations.php"  onMouseOver="this.style.color='#ffcd00'"
                        onMouseOut="this.style.color='#333'" style="transition: all 0.2s ease-in-out; color:#333; font-size: 14px; font-weight: 500; letter-spacing: 2px;">&larr; Back</a><br/><br/>
                    <?php if (isset($error0)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error0;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror0)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror0;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-reservation.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>
                                <label for="useridfield">Change on Reservation:</label><br/>
                                <select name="res_id">
                                    <?php foreach ($specific_user_reservations as $specific_user_reservation) { ?>
                                        <option value="<?php echo $specific_user_reservation['res_id'];?>">
                                        <?php echo"Reservation number="; echo $specific_user_reservation['res_id']; ?> |<br/>
                                        <?php echo"Yacht ="; echo $specific_user_reservation['yacht_name']; ?> |<br/>
                                        <?php echo"From ="; echo $specific_user_reservation['start_date']; ?> |<br/>
                                        <?php echo"Until ="; echo $specific_user_reservation['end_date']; ?><br/>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <label for="changeuseryachtField">Change Yacht:</label><br/>
                                <select name="yacht_id">
                                    <?php foreach ($yachts as $yacht) { ?>
                                        <option value="<?php echo $yacht['yacht_id'];?>">
                                        <?php echo $yacht['yacht_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>"></input>
                                <input style="color:white;" name="changeYachtBtn" class="admin-btn" type="submit" value="Change Yacht">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Yacht ^ ---------------------------------------------------------------- -->
          <!-- ---------------------------------------------------------------- v Change Start date v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Change Start date</b></h2>
                    <?php if (isset($error1)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error1;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror1)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror1;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-reservation.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>
                                <label for="useridfield">Change on Reservation:</label><br/>
                                <select name="res_id">
                                    <?php foreach ($specific_user_reservations as $specific_user_reservation) { ?>
                                        <option value="<?php echo $specific_user_reservation['res_id'];?>">
                                        <?php echo"Reservation number="; echo $specific_user_reservation['res_id']; ?> |<br/>
                                        <?php echo"Yacht ="; echo $specific_user_reservation['yacht_name']; ?> |<br/>
                                        <?php echo"From ="; echo $specific_user_reservation['start_date']; ?> |<br/>
                                        <?php echo"Until ="; echo $specific_user_reservation['end_date']; ?><br/>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <label for="changestartdatetField">Change Start date:</label><br/>
                                <input class="form-control" type="date" name="start_date" placeholder="start date"/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>"></input>
                                <input style="color:white;" name="changeStartDateBtn" class="admin-btn" type="submit" value="Change Start date">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Start date ^ ---------------------------------------------------------------- -->
          <!-- ---------------------------------------------------------------- v Change End date v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Change End date</b></h2>
                    <?php if (isset($error2)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error2;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror2)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror2;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-reservation.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>
                                <label for="useridfield">Change on Reservation:</label><br/>
                                <select name="res_id">
                                    <?php foreach ($specific_user_reservations as $specific_user_reservation) { ?>
                                        <option value="<?php echo $specific_user_reservation['res_id'];?>">
                                        <?php echo"Reservation number="; echo $specific_user_reservation['res_id']; ?> |<br/>
                                        <?php echo"Yacht ="; echo $specific_user_reservation['yacht_name']; ?> |<br/>
                                        <?php echo"From ="; echo $specific_user_reservation['start_date']; ?> |<br/>
                                        <?php echo"Until ="; echo $specific_user_reservation['end_date']; ?><br/>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <label for="changeenddateField">Change End date:</label><br/>
                                <input class="form-control" type="date" name="end_date" placeholder="end date"/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; ?>"></input>
                                <input style="color:white;" name="changeEndDateBtn" class="admin-btn" type="submit" value="Change End date">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change End date ^ ---------------------------------------------------------------- -->

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