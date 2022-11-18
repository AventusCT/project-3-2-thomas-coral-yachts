<?php

session_start();

include_once('../includes/connection.php');

    if (isset($_SESSION['logged_in']))  {
        // display add page
  
    // <---------------------------------------------------------------- v Change Username v ----------------------------------------------------------------> //
    if(isset($_POST['changeUsernameBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_username'],$_POST['user_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_username = $_POST['new_username'];
          $user_id = $_POST['user_id'];
          $admin_id = $_POST['hidden_id'];
  
          if (empty($password) or empty($new_username) or empty($user_id)) {
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
                  $antierror0 = 'Username changed!';
  
                  $sql = 'UPDATE users SET user_name = :new_username WHERE user_id = :user_id';
  
                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_username", $new_username, PDO::PARAM_STR);
                      $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
  
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
      // <---------------------------------------------------------------- ^ Change Username ^ ----------------------------------------------------------------> //
    // <---------------------------------------------------------------- v Change Password v ----------------------------------------------------------------> //
    if(isset($_POST['changePasswordBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_password'],$_POST['user_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_password = $_POST['new_password'];
          $user_id = $_POST['user_id'];
          $admin_id = $_POST['hidden_id'];

          if (empty($password) or empty($new_password) or empty($user_id)) {
              $error = 'All fields are required!';


          } else {
            $query = $pdo->prepare("SELECT * FROM admin WHERE admin_id = ? AND admin_password = ?");
  
            $query->bindValue(1, $admin_id);
            $query->bindValue(2, $password);

              $query->execute();

              $num = $query->rowCount();
              $row = $query->fetch(PDO::FETCH_ASSOC);

              if ($num ==1) {
                  // user entered correct details
                  $antierror = 'Password changed!';

                  $sql = 'UPDATE users SET user_password = :new_password WHERE user_id = :user_id';

                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_password", $new_password, PDO::PARAM_STR);
                      $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

                      if($stmt->execute()){
                      }
                    }
              } else {
                  // user entered false details
                  $error = 'Incorrect Current Password!';
              }
          }
          
      }
    }
    // <---------------------------------------------------------------- ^ Change Password ^ ----------------------------------------------------------------> //
    // <---------------------------------------------------------------- v Change Name v ----------------------------------------------------------------> //
    if(isset($_POST['changeNameBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_name'],$_POST['user_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_name = $_POST['new_name'];
          $user_id = $_POST['user_id'];
          $admin_id = $_POST['hidden_id'];

          if (empty($password) or empty($new_name) or empty($user_id)) {
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
                  $antierror2 = 'Name changed!';

                  $sql = 'UPDATE users SET name = :new_name WHERE user_id = :user_id';;

                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_name", $new_name, PDO::PARAM_STR);
                      $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

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
    // <---------------------------------------------------------------- ^ Change Name ^ ----------------------------------------------------------------> //
    // <---------------------------------------------------------------- v Change Lastname v ----------------------------------------------------------------> //
    if(isset($_POST['changeLastnameBtn'])) {

        // current password correct
        if (isset($_POST['password'], $_POST['new_lastname'],$_POST['user_id'],$_POST['hidden_id'])) {
          $password = $_POST['password'];
          $new_lastname = $_POST['new_lastname'];
          $user_id = $_POST['user_id'];
          $admin_id = $_POST['hidden_id'];

          if (empty($password) or empty($new_lastname) or empty($user_id)) {
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
                  $antierror3 = 'Lastname changed!';

                  $sql = 'UPDATE users SET lastname = :new_lastname WHERE user_id = :user_id';;

                  if($stmt = $pdo->prepare($sql)){
                      // Bind variables to the prepared statement as parameters
                      $stmt->bindParam(":new_lastname", $new_lastname, PDO::PARAM_STR);
                      $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

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
    // <---------------------------------------------------------------- ^ Change Lastname ^ ----------------------------------------------------------------> //
    // <---------------------------------------------------------------- v Change Email v ----------------------------------------------------------------> //
    if(isset($_POST['changeEmailBtn'])) {

      // current password correct
      if (isset($_POST['password'], $_POST['new_email'],$_POST['user_id'],$_POST['hidden_id'])) {
        $password = $_POST['password'];
        $new_email = $_POST['new_email'];
        $user_id = $_POST['user_id'];
        $admin_id = $_POST['hidden_id'];

        if (empty($password) or empty($new_email) or empty($user_id)) {
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
                $antierror4 = 'Email changed!';

                $sql = 'UPDATE users SET email = :new_email WHERE user_id = :user_id';;

                if($stmt = $pdo->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(":new_email", $new_email, PDO::PARAM_STR);
                    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

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
    // <---------------------------------------------------------------- ^ Change Email ^ ----------------------------------------------------------------> //
    // <---------------------------------------------------------------- v Change Telephone v ----------------------------------------------------------------> //
    if(isset($_POST['changeTelephoneBtn'])) {

      // current password correct
      if (isset($_POST['password'], $_POST['new_telephone'],$_POST['user_id'],$_POST['hidden_id'])) {
        $password = $_POST['password'];
        $new_telephone = $_POST['new_telephone'];
        $user_id = $_POST['user_id'];
        $admin_id = $_POST['hidden_id'];

        if (empty($password) or empty($new_telephone) or empty($user_id)) {
            $error5 = 'All fields are required!';


        } else {
            $query = $pdo->prepare("SELECT * FROM admin WHERE admin_id = ? AND admin_password = ?");
  
            $query->bindValue(1, $admin_id);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($num ==1) {
                // user entered correct details
                $antierror5 = 'Phone number changed!';

                $sql = 'UPDATE users SET telephone = :new_telephone WHERE user_id = :user_id';;

                if($stmt = $pdo->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(":new_telephone", $new_telephone, PDO::PARAM_STR);
                    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

                    if($stmt->execute()){
                    }
                  }
            } else {
                // user entered false details
                $error5 = 'Incorrect Password!';
            }
        }
        
    }
  }
    // <---------------------------------------------------------------- ^ Change Telephone ^ ----------------------------------------------------------------> //
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

      $user = new User;
      $users = $user->fetch_all();
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
                    <li><span>ADMIN</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </header>
        <section id="r-logged-in">
          <div class="r-login-register">
          <!-- ---------------------------------------------------------------- v Change Username v ---------------------------------------------------------------- -->
          <div class="container">
                <div>
                    <h2><b>Update Username</b></h2>
                    <a href="./users.php"  onMouseOver="this.style.color='#ffcd00'"
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
                        <form action="update-user.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>

                                <label for="newusernameField">New Username</label>
                                <input class="form-control" type="text" name="new_username" id="newusernameField" placeholder="New Username"></input>
                                <label for="useridfield">Change on user:</label><br/>
                                <select name="user_id">
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?php echo $user['user_id'];?>">
                                        <?php echo $user['user_name']; ?>
                                        <?php echo "id="; echo $user['user_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeUsernameBtn" class="admin-btn" type="submit" value="Change Username">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Username ^ ---------------------------------------------------------------- -->

          <!-- ---------------------------------------------------------------- v Change Password v ---------------------------------------------------------------- -->
            <div class="container">
                <div>
                    <h2><b>Update Password</b></h2>
                    <!-- <h4>Logged in</h4> -->
                    <?php if (isset($error)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-user.php" method="POST">
                            <div class="form-group">

                                <label for="passwordField">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="passwordField" placeholder="Password"></input>

                                <label for="newpasswordField">New Password</label>
                                <input class="form-control" type="password" name="new_password" id="newpasswordField" placeholder="New Password"></input>
                                <label for="useridfield">Change on user:</label><br/>
                                <select name="user_id">
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?php echo $user['user_id'];?>">
                                        <?php echo $user['user_name']; ?>
                                        <?php echo "id="; echo $user['user_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changePasswordBtn" class="admin-btn" type="submit" value="Change Password">
                            </div>
                        </form>
                    </div>
                </div>
          <!-- ---------------------------------------------------------------- ^ Change Password ^ ---------------------------------------------------------------- -->

          <!-- ---------------------------------------------------------------- v Change Name v ---------------------------------------------------------------- -->
            <div class="container">
                <div>
                    <h2><b>Update Name</b></h2>
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
                        <form action="update-user.php" method="POST">
                            <div class="form-group">

                                <label for="password">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password"></input>

                                <label for="newname">New Name</label>
                                <input class="form-control" type="text" name="new_name" id="newname" placeholder="New Name"></input>
                                <label for="useridfield">Change on user:</label><br/>
                                <select name="user_id">
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?php echo $user['user_id'];?>">
                                        <?php echo $user['user_name']; ?>
                                        <?php echo "id="; echo $user['user_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeNameBtn" class="admin-btn" type="submit" value="Change Name">
                            </div>
                        </form>
                    </div>
                </div>
          <!-- ---------------------------------------------------------------- ^ Change Name ^ ---------------------------------------------------------------- -->

          <!-- ---------------------------------------------------------------- v Change Lastname v ---------------------------------------------------------------- -->
                <div>
                    <h2><b>Update Lastname</b></h2>
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
                        <form action="update-user.php" method="POST">
                            <div class="form-group">

                                <label for="password">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password"></input>

                                <label for="newlastname">New Lastname</label>
                                <input class="form-control" type="text" name="new_lastname" id="newlastname" placeholder="New Lastname"></input>
                                <label for="useridfield">Change on user:</label><br/>
                                <select name="user_id">
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?php echo $user['user_id'];?>">
                                        <?php echo $user['user_name']; ?>
                                        <?php echo "id="; echo $user['user_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeLastnameBtn" class="admin-btn" type="submit" value="Change Lastname">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Lastname ^ ---------------------------------------------------------------- -->

          <!-- ---------------------------------------------------------------- v Change Email v ---------------------------------------------------------------- -->
            <div class="container">
                <div>
                    <h2><b>Update Email</b></h2>
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
                        <form action="update-user.php" method="POST">
                            <div class="form-group">

                                <label for="password">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password"></input>

                                <label for="newemail">New Email</label>
                                <input class="form-control" type="text" name="new_email" id="newemail" placeholder="New Email"></input>
                                <label for="useridfield">Change on user:</label><br/>
                                <select name="user_id">
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?php echo $user['user_id'];?>">
                                        <?php echo $user['user_name']; ?>
                                        <?php echo "id="; echo $user['user_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeEmailBtn" class="admin-btn" type="submit" value="Change Email">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Email ^ ---------------------------------------------------------------- -->

          <!-- ---------------------------------------------------------------- v Change Telephone v ---------------------------------------------------------------- -->
            <div class="container">
                <div>
                    <h2><b>Update Phone number</b></h2>
                    <!-- <h4>Logged in</h4> -->
                    <?php if (isset($error5)) { ?>
                    <span style="color:#aa0000; font-style:italic;"><?php echo $error5;?></span>

                    <br></br>
                    <?php } ?>
                    <?php if (isset($antierror5)) { ?>
                    <span style="color:#87ab69; font-style:italic;"><?php echo $antierror5;?></span>

                    <br></br>
                    <?php } ?>

                    <div class="r-auth-form">
                        <form action="update-user.php" method="POST">
                            <div class="form-group">
                                <label for="password">Admin Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password"></input>

                                <label for="newtelephone">New Phone number</label>
                                <input class="form-control" type="text"id="phonenumbertextbox" name="new_telephone" id="newtelephone" placeholder="New Phone number"></input>
                                <label for="useridfield">Change on user:</label><br/>
                                <select name="user_id">
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?php echo $user['user_id'];?>">
                                        <?php echo $user['user_name']; ?>
                                        <?php echo "id="; echo $user['user_id']; ?>
                                        </option>
                                    <?php } ?>
                                </select><br/><br/>
                                <input type="hidden" name="hidden_id" value="<?php if(isset($_SESSION['admin_id'])) echo $_SESSION['admin_id']; ?>"></input>
                                <input style="color:white;" name="changeTelephoneBtn" class="admin-btn" type="submit" value="Change Phone number">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <!-- ---------------------------------------------------------------- ^ Change Telephone ^ ---------------------------------------------------------------- -->

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