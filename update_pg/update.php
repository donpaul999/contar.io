<?php
require '../conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:..\login_pg\login");
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="../image/x-icon" href="icons\logo.png" />
    <link rel="stylesheet" href="../resources/css/master.css">
    <title>Contar.io</title>
    <div class="user-title">
      <h1 class="fullname">Update your profile</h1>
    </div>
  </head>
  <body>

  <!-- ========== START HEADER ========== -->
  <div class="top-nav top-nav--burger-1 clearfix">
    <div class="logo">
        <a href="#"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
    </div><!-- end logo -->
    <?php
      echo '<div class="username">';
      echo '<ul>';
      echo '<li><a href = "../p/'.$username.'"><input type = "button" value='.$username.'></a></li>';
      echo '<ul class="sub-menu">';
        echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
        echo "<li><a href = 'update'><input type = 'button' value='Update your profile'></a></li>";
        echo "<li><a href='../login_pg\logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
      echo '</ul>';
      echo  '</ul>';
      echo  '</div>';
    ?>
    <div class="menu-trigger">
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
    </div><!-- end menu-trigger -->
    <header class="header header--bgk">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <nav class="full-menu">
              <ul class="srf-full-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
            <div class="info-area">
              <ul class="">
                <li>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </li>
              </ul>
            </div><!-- end info-area -->
            <div class="mobile-info">
              <p>&copy; Paul Colta - Contar.io</p>
            </div><!-- end mobile-info -->
          </div><!-- end col-sm-12 -->
        </div><!-- end row -->
      </div><!-- end container -->
    </header>
  </div><!-- end top-nav -->
  <!-- ========== END HEADER ========== -->
  
  <!-- ========== START UPDATE CONTAINER ========== -->
  <div class="container">
    <div class="form-wrap form-wrap-update">
      <form method="POST" action="update_code.php">
            <input type="text" name="facebook" placeholder="Your Facebook profile" maxlength="200"><br><br>
            <input type="text" name="instagram" placeholder="Your Instagram profile or username" maxlength="200"><br><br>
            <input type="text" name="youtube" placeholder="Your YouTube channel" maxlength="200"><br><br>
            <input type="text" name="linkedin" placeholder="Your LinkedIn profile" maxlength="200"><br><br>
            <input type="text" name="github" placeholder="Your GitHub profile" maxlength="200"><br><br>
            <input type="text" name="spotify" placeholder="Your Spotify profile" maxlength="200"><br><br>
            <input type="text" name="steam" placeholder="Your Steam profile" maxlength="200"><br><br>
            <input type="text" name="snapchat" placeholder="Your Snapchat username" maxlength="200"><br><br>
            <input type="text" name="discord" placeholder="Your Discord username + tag" maxlength="200"><br><br>
            <input type="text" name="skype" placeholder="Your Skype username" maxlength="200"><br><br>
            <input type="submit" class="social-button" id="update" name="update" value="Update"><br>
      </form>
    </div><!-- end form-wrap -->
  </div><!-- end container --> 
  <!-- ========== END UPDATE CONTAINER========== -->

    <!-- ========== START FOOTER ========== -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="footer__social">
            <ul class="social srf-full-menu">
                <li>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </li>
              </ul>
               <a href="#" class="copyright">&copy; Paul Colta - Contar.io</a>
          </div><!-- end footer__social -->
        </div><!-- end row -->
      </div><!-- end container -->
    </footer>
    <!-- ========== END FOOTER ========== -->

  <!-- ========== START JS ========== -->
  <script src="../resources/js/jquery.js"></script>
  <script src="../resources/js/bootstrap.min.js"></script>
  <script src="../resources/js/plugins.js"></script>
  <script src="../resources/js/main.js"></script>
  <!-- ========== END JS ========== -->
  </body>
</html>
