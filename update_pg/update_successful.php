<?php
require '../conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:..\login_pg\login");
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
    img[alt="www.000webhost.com"] {
        display: none !important;
    }
    </style>
    <title> Contar.io </title>
    <meta charset="UTF-8">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="../image/x-icon" href="icons\logo.png" />
    <link rel="stylesheet" href="../resources/css/master.css">
    <script src = "resources\js\password.js"></script>
    <div class="user-title">
    <h1 class="fullname">Update succesful!</h1>
    </div>

  </head>
  <body>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="../contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
      <?php
      echo '<a href ="../p/'.$username.'"><input class="social-button" type = "button" value="See your profile"></a><br>';
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



    <!-- ========== START FOOTER ========== -->
    <footer class="footer fixed">
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/plugins.js"></script>
    <script src="../resources/js/main.js"></script>
    <!-- ========== END JS ========== -->
  </body>
</html>
