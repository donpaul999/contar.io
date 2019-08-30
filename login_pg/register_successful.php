<?php

  require '../conectare.php';
$ok = 0;

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
      <link rel="shortcut icon" type="../image/x-icon" href="../resources/img/title.png"  />
      <link rel="stylesheet" href="../resources/css/master.css">
       <script src = "../resources/js/password.js"></script>
   </head>
   <body>
     <div class="container main-container">
       <div class="main">
        <div class="user-title">
          <h1 class="fullname">Registration successfully completed!</h1>
        </div>
        <a href="login" class="go-back"><input class="social-button" type="button" value="Go Back"></a>
       </div>
     </div>
     
     <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="#"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
      <?php
      if($ok == 1) {
        echo'<div class="menu-trigger">';
         echo' <input type="checkbox">';
          echo'<span></span>';
          echo'<span></span>';
          echo'<span></span>';
        echo'</div><!-- end menu-trigger -->';
      }
      ?>
      <header class="header header--bgk">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <?php
                echo '<div class="username">';
                echo '<ul>';
                echo '<li><input type = "button" value='.$username.'></li>';
                echo '<ul class="sub-menu">';
                  echo "<li><a href='contar'><input type = 'button' id='back' value='Home'></a></li>";
                  echo "<li><a href = 'update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
                  echo "<li><a href='update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
                  echo "<li><a href='login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
                echo '</ul>';
                echo  '</ul>';
                echo  '</div>';
              ?>
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
                  <a href="https://www.facebook.com/stefanut999" target='_blank'><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="https://www.linkedin.com/in/paulstefancolta/" target='_blank'><i class="fab fa-linkedin-in"></i></i></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/paulstefancolta/" target='_blank'><i class="fab fa-instagram"></i></a>
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
<!--Start Cookie Script--> <script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/de14ee1f8e19ae0e12c4eff22fa89a19.js"></script> <!--End Cookie Script-->
</body>
</html>
