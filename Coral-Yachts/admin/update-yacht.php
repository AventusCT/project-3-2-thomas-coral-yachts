<?php

session_start();

include_once('../includes/connection.php');

    if (isset($_SESSION['logged_in']))  {
        // display add page
        
    // <---------------------------------------------------------------- v Change Yacht Name v ----------------------------------------------------------------> //
    if(isset($_POST['changeYachtNameBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_yacht_name'],$_POST['yacht_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_yacht_name = $_POST['new_yacht_name'];
          $yacht_id = $_POST['yacht_id'];
          $admin_id = $_POST['hidden_id'];
  
          if (empty($password) or empty($new_yacht_name) or empty($yacht_id)) {
              $error0 = 'All fields are required!';
  
  
          } else {
              $query = $pdo->prepare("SELECT * FROM admin WHERE admin_id = ? AND admin_password = ?");
  
              $query->bindValue(1, $admin_id);
              $query->bindValue(2, $password);
  
              $query->execute();
  
              $num = $query->rowCount();
              $row = $query->fetch(PDO::FETCH_ASSOC);
  
              if ($num ==1) {
                  // user entered correct details
                  $antierror0 = 'Yacht Name changed!';
  
                  $sql = 'UPDATE yachts SET yacht_name = :new_yacht_name WHERE yacht_id = :yacht_id';
  
                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_yacht_name", $new_yacht_name, PDO::PARAM_STR);
                      $stmt->bindParam(":yacht_id", $yacht_id, PDO::PARAM_STR);
  
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
    // <---------------------------------------------------------------- ^ Change Yacht Name ^ ----------------------------------------------------------------> //
        
    // <---------------------------------------------------------------- v Change Yacht Desc v ----------------------------------------------------------------> //
    if(isset($_POST['changeYachtDescBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_yacht_desc'],$_POST['yacht_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_yacht_desc = nl2br($_POST['new_yacht_desc']);
          $yacht_id = $_POST['yacht_id'];
          $admin_id = $_POST['hidden_id'];
  
          if (empty($password) or empty($new_yacht_desc) or empty($yacht_id)) {
              $error1 = 'All fields are required!';
  
  
          } else {
              $query = $pdo->prepare("SELECT * FROM admin WHERE admin_id = ? AND admin_password = ?");
  
              $query->bindValue(1, $admin_id);
              $query->bindValue(2, $password);
  
              $query->execute();
  
              $num = $query->rowCount();
              $row = $query->fetch(PDO::FETCH_ASSOC);
  
              if ($num ==1) {
                  // user entered correct details
                  $antierror1 = 'Yacht Description changed!';
  
                  $sql = 'UPDATE yachts SET yacht_desc = :new_yacht_desc WHERE yacht_id = :yacht_id';
  
                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_yacht_desc", $new_yacht_desc, PDO::PARAM_STR);
                      $stmt->bindParam(":yacht_id", $yacht_id, PDO::PARAM_STR);
  
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
    // <---------------------------------------------------------------- ^ Change Yacht Desc ^ ----------------------------------------------------------------> //
            
    // <---------------------------------------------------------------- v Change Yacht Port v ----------------------------------------------------------------> //
    if(isset($_POST['changeYachtPortBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_yacht_port'],$_POST['yacht_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_yacht_port = $_POST['new_yacht_port'];
          $yacht_id = $_POST['yacht_id'];
          $admin_id = $_POST['hidden_id'];
  
          if (empty($password) or empty($new_yacht_port) or empty($yacht_id)) {
              $error2 = 'All fields are required!';
  
  
          } else {
              $query = $pdo->prepare("SELECT * FROM admin WHERE admin_id = ? AND admin_password = ?");
  
              $query->bindValue(1, $admin_id);
              $query->bindValue(2, $password);
  
              $query->execute();
  
              $num = $query->rowCount();
              $row = $query->fetch(PDO::FETCH_ASSOC);
  
              if ($num ==1) {
                  // user entered correct details
                  $antierror2 = 'Yacht Port changed!';
  
                  $sql = 'UPDATE yachts SET yacht_port = :new_yacht_port WHERE yacht_id = :yacht_id';
  
                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_yacht_port", $new_yacht_port, PDO::PARAM_STR);
                      $stmt->bindParam(":yacht_id", $yacht_id, PDO::PARAM_STR);
  
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
    // <---------------------------------------------------------------- ^ Change Yacht Port ^ ----------------------------------------------------------------> //
                  
    // <---------------------------------------------------------------- v Change Yacht Img v ----------------------------------------------------------------> //
    if(isset($_POST['changeYachtImgBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_yacht_img'],$_POST['yacht_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_yacht_img = $_POST['new_yacht_img'];
          $yacht_id = $_POST['yacht_id'];
          $admin_id = $_POST['hidden_id'];
  
          if (empty($password) or empty($new_yacht_img) or empty($yacht_id)) {
              $error3 = 'All fields are required!';
  
  
          } else {
              $query = $pdo->prepare("SELECT * FROM admin WHERE admin_id = ? AND admin_password = ?");
  
              $query->bindValue(1, $admin_id);
              $query->bindValue(2, $password);
  
              $query->execute();
  
              $num = $query->rowCount();
              $row = $query->fetch(PDO::FETCH_ASSOC);
  
              if ($num ==1) {
                  // user entered correct details
                  $antierror3 = 'Yacht Image changed!';
  
                  $sql = 'UPDATE yachts SET yacht_img = :new_yacht_img WHERE yacht_id = :yacht_id';
  
                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_yacht_img", $new_yacht_img, PDO::PARAM_STR);
                      $stmt->bindParam(":yacht_id", $yacht_id, PDO::PARAM_STR);
  
                      if($stmt->execute()){
                      }
                    }
              } else {
                  // user entered false details
                  $error3 = 'Incorrect Password!';
              }
          }
          
      }
    }
    // <---------------------------------------------------------------- ^ Change Yacht Img ^ ----------------------------------------------------------------> //
                
    // <---------------------------------------------------------------- v Change Yacht Port Img v ----------------------------------------------------------------> //
    if(isset($_POST['changeYachtPortImgBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_yacht_port_img'],$_POST['yacht_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_yacht_port_img = $_POST['new_yacht_port_img'];
          $yacht_id = $_POST['yacht_id'];
          $admin_id = $_POST['hidden_id'];
  
          if (empty($password) or empty($new_yacht_port_img) or empty($yacht_id)) {
              $error4 = 'All fields are required!';
  
  
          } else {
              $query = $pdo->prepare("SELECT * FROM admin WHERE admin_id = ? AND admin_password = ?");
  
              $query->bindValue(1, $admin_id);
              $query->bindValue(2, $password);
  
              $query->execute();
  
              $num = $query->rowCount();
              $row = $query->fetch(PDO::FETCH_ASSOC);
  
              if ($num ==1) {
                  // user entered correct details
                  $antierror4 = 'Yacht Port Image changed!';
  
                  $sql = 'UPDATE yachts SET yacht_port_img = :new_yacht_port_img WHERE yacht_id = :yacht_id';
  
                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_yacht_port_img", $new_yacht_port_img, PDO::PARAM_STR);
                      $stmt->bindParam(":yacht_id", $yacht_id, PDO::PARAM_STR);
  
                      if($stmt->execute()){
                      }
                    }
              } else {
                  // user entered false details
                  $error4 = 'Incorrect Password!';
              }
          }
          
      }
    }
    // <---------------------------------------------------------------- ^ Change Yacht Port Img ^ ----------------------------------------------------------------> //
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
                <h1><b>Update Yacht</b></h1>
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

          <!-- ---------------------------------------------------------------- v Change Yacht Name v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Update Yacht Name</b></h2>
                    <a href="./yachts.php"  onMouseOver="this.style.color='#ffcd00'"
                        onMouseOut="this.style.color='#333'" style="transition: all 0.2s ease-in-out; color:#333; font-size: 14px; font-weight: 500; letter-spacing: 2px;">&larr; Back</a><br/><br/>
                    <!-- <h4>Logged in</h4> -->
                    <?php if (isset($error0)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error0;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror0)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror0;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-yacht.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>

                                <label for="newyachtnamefield">New Yacht Name</label>
                                <input class="form-control" type="text" name="new_yacht_name" id="newyachtnamefield" placeholder="New Yacht Name"></input>
                                <label for="yachtidfield">Change on Yacht:</label><br/>
                                <select name="yacht_id">
                                    <?php foreach ($yachts as $yacht) { ?>
                                        <option value="<?php echo $yacht['yacht_id'];?>">
                                        <?php echo $yacht['yacht_name']; ?>
                                        <?php echo "id="; echo $yacht['yacht_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeYachtNameBtn" class="admin-btn" type="submit" value="Change Yacht Name">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Yacht Name ^ ---------------------------------------------------------------- -->
            
          <!-- ---------------------------------------------------------------- v Change Yacht Desc v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Update Yacht Description</b></h2>
                    <!-- <h4>Logged in</h4> -->
                    <?php if (isset($error1)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error1;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror1)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror1;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-yacht.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>

                                <label for="newyachtdescfield">New Yacht Description</label>
                                <textarea class="form-control" rows="15" cols="50" name="new_yacht_desc" id="newyachtdescfield" placeholder="New Yacht Description"></textarea>
                                <label for="yachtidfield">Change on Yacht:</label><br/>
                                <select name="yacht_id">
                                    <?php foreach ($yachts as $yacht) { ?>
                                        <option value="<?php echo $yacht['yacht_id'];?>">
                                        <?php echo $yacht['yacht_name']; ?>
                                        <?php echo "id="; echo $yacht['yacht_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeYachtDescBtn" class="admin-btn" type="submit" value="Change Yacht Description">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Yacht Desc ^ ---------------------------------------------------------------- -->
                      
          <!-- ---------------------------------------------------------------- v Change Yacht Port v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Update Yacht Port</b></h2>
                    <!-- <h4>Logged in</h4> -->
                    <?php if (isset($error2)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error2;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror2)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror2;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-yacht.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>

                                <label for="newyachtportfield">New Yacht Port</label>
                                <input class="form-control" type="text" name="new_yacht_port" id="newyachtportfield" placeholder="New Yacht Port"></input>
                                <label for="yachtidfield">Change on Yacht:</label><br/>
                                <select name="yacht_id">
                                    <?php foreach ($yachts as $yacht) { ?>
                                        <option value="<?php echo $yacht['yacht_id'];?>">
                                        <?php echo $yacht['yacht_name']; ?>
                                        <?php echo "id="; echo $yacht['yacht_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeYachtPortBtn" class="admin-btn" type="submit" value="Change Yacht Port">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Yacht Port ^ ---------------------------------------------------------------- -->
                      
          <!-- ---------------------------------------------------------------- v Change Yacht Img v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Update Yacht Image</b></h2>
                    <!-- <h4>Logged in</h4> -->
                    <?php if (isset($error3)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error3;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror3)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror3;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-yacht.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>

                                <label for="newyachtimgfield">New Yacht Image</label>
                                <input class="form-control" type="text" name="new_yacht_img" id="newyachtimgfield" placeholder="New Yacht Image"></input>
                                <label for="yachtidfield">Change on Yacht:</label><br/>
                                <select name="yacht_id">
                                    <?php foreach ($yachts as $yacht) { ?>
                                        <option value="<?php echo $yacht['yacht_id'];?>">
                                        <?php echo $yacht['yacht_name']; ?>
                                        <?php echo "id="; echo $yacht['yacht_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeYachtImgBtn" class="admin-btn" type="submit" value="Change Yacht Image">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Yacht Img ^ ---------------------------------------------------------------- -->
                                
          <!-- ---------------------------------------------------------------- v Change Yacht Port Img v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Update Yacht Port Image</b></h2>
                    <!-- <h4>Logged in</h4> -->
                    <?php if (isset($error4)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error4;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror4)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror4;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-yacht.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>

                                <label for="newyachtportimgfield">New Yacht Port</label>
                                <input class="form-control" type="text" name="new_yacht_port_img" id="newyachtportimgfield" placeholder="New Yacht Port Image"></input>
                                <label for="yachtidfield">Change on Yacht:</label><br/>
                                <select name="yacht_id">
                                    <?php foreach ($yachts as $yacht) { ?>
                                        <option value="<?php echo $yacht['yacht_id'];?>">
                                        <?php echo $yacht['yacht_name']; ?>
                                        <?php echo "id="; echo $yacht['yacht_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeYachtPortImgBtn" class="admin-btn" type="submit" value="Change Yacht Port Image">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Yacht Port Img ^ ---------------------------------------------------------------- -->

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