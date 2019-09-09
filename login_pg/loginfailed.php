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
      <link rel="shortcut icon" type="image/x-icon" href="../resources/img/title.png"/>
      <link rel="stylesheet" href="../resources/css/master.css">
       <script src = "../resources/js/password.js"></script>
   </head>
   <body class="login-failed">
     <!-- ========== START HEADER ========== -->
     <div class="top-nav top-nav--burger-1 clearfix">
       <div class="logo">
           <a href="../contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
       </div><!-- end logo -->
     </div>

     <div class="container main-container">
       <div class="main">
       <div class="user-title">
          <h1 class="fullname">Login Failed! Username or the password are wrong. </h1>
        </div>
        <a href="login"><input class="social-button" type="button" value="Go Back"></a>
        <a href="../reset/reset_passhtml"><input class="social-button" type="button" value="You forgot your password?"></a>
        <h2>If you have problems loging in, contact me here:</h2>
        <a href="../p/stefanut999"><input class="social-button" type="button" value="Contact"></a>
       </div>
     </div>



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

     <!-- ========== START JS ========== -->
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/plugins.js"></script>
    <script src="../resources/js/main.js"></script>
    <!-- ========== END JS ========== -->

    <!-- ========== END FOOTER ========== -->
   </body>
 </html>
