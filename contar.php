<?php
require 'conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:login_pg/login");
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="resources/img/title.png" />
    <link rel="stylesheet" href="resources/css/master.css">
    <title>Contar.io</title>
    <div class="user-title">
    <h1 class="fullname">Welcome <?php echo $username; ?> !</h1>
    </div>

  </head>
  <body>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="contar"><img src="resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
      <?php
        echo '<div class="username">';
        echo '<ul>';
        echo '<li><input type = "button" value='.$username.'></li>';
        echo '<ul class="sub-menu">';
          echo "<li><a href='contar'><input type = 'button' id='back' value='Home'></a></li>";
          echo "<li><a href = 'update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
          echo "<li><a href='login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
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

              <div class="mobile-info">
                <p>&copy; Paul Colta - Contar.io</p>
              </div><!-- end mobile-info -->
            </div><!-- end col-sm-12 -->
          </div><!-- end row -->
        </div><!-- end container -->
      </header>
    </div><!-- end top-nav -->
    <!-- ========== END HEADER ========== -->

    <!-- ========== START WELCOME CONTENT ========== -->
    <div class="container welcome-content">
      <?php
        echo '<a href ="p/'.$username.'"><input class="social-button" type = "button" value="See your profile"></a><br>';
      ?>
      <a href = 'update_pg/update'><input type = 'button' class="social-button" value='Update your profile'></a></li>

    </div>
    <!-- ========== END WELCOME CONTENT ========== -->

    <!-- ========== START FOOTER ========== -->
    <footer class="footer fixed">
      <div class="container">
        <div class="row">
          <div class="footer__social">
            <ul class="social srf-full-menu">
                <li>
                  <li>
                    <a href="https://www.facebook.com/stefanut999" target='_blank'><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="https://www.linkedin.com/in/paulstefancolta/" target='_blank'><i class="fab fa-linkedin-in"></i></i></a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/paulstefancolta/" target='_blank'><i class="fab fa-instagram"></i></a>
                  </li>
                </li>
              </ul>
               <a href="#" class="copyright">&copy; Paul Colta - Contar.io</a>
          </div><!-- end footer__social -->
        </div><!-- end row -->
      </div><!-- end container -->
    </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- ========== START JS ========== -->
  <script src="resources/js/jquery.js"></script>
  <script src="resources/js/bootstrap.min.js"></script>
  <script src="resources/js/plugins.js"></script>
  <script src="resources/js/main.js"></script>
  <!-- ========== END JS ========== -->
  </body>
</html>
