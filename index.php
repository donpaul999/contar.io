<?php
  require 'conectare.php';
  session_start();

  if(isset($_SESSION['loggedin']))
  return header("location:contar");

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
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="resources/css/master.css">
       <script src = "resources\js\password.js"></script>
   </head>
   <body>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="#"><img src="resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
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

     <!-- ========== START HOME CONTAINER ========== -->
     <div class="container home-container">
        <a href = "login_pg\register"><input class="social-button" type = "button" value="Register"></a>
        <a href = "login_pg\login"><input class="social-button type = "button" value="Log In"></a>
     </div>
     <!-- ========== END HOME CONTAINER========== -->
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
  <script src="resources/js/jquery.js"></script>
  <script src="resources/js/bootstrap.min.js"></script>
  <script src="resources/js/plugins.js"></script>
  <script src="resources/js/main.js"></script>
  <!-- ========== END JS ========== -->
   </body>
 </html>
