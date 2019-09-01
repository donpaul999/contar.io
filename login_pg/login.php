<?php
  require '../conectare.php';
$ok = 0;
  session_start();
if(!isset($_SESSION['wrong']))
  $_SESSION['wrong'] = 0;

  if(!empty($_POST['login']))
  {
    $ok = 1;
    if($_SESSION['wrong'] >= 3){
      $ok = 0;
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
          $secretKey = '6Lexj7MUAAAAACPzsQJE1Myokq0wIqSeDtODI7Oo
';
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
          $responseData = json_decode($verifyResponse);
        if($responseData->success)
         $ok = 1;
       }
       else
        return header("location:captcha_log");
     }
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($conectare, $query);
    $count = mysqli_num_rows($result);
    if($count > 0 && $ok == 1)
      {
        session_start();
        $_SESSION['loggedin'] = '1';
        $_SESSION['username'] = $username;
        require('../user_info/stats.php');
        header("location:../contar");
      }
    else
    {
      $_SESSION['wrong']++;
      return header("location:loginfailed");

    }
  }

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
       <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   </head>
   <body>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="../index"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
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

            </div><!-- end col-sm-12 -->
          </div><!-- end row -->
        </div><!-- end container -->
      </header>
    </div><!-- end top-nav -->
    <!-- ========== END HEADER ========== -->

    <!-- ========== START LOGIN-CONTAINER ========== -->
    <div class="form-wrap container main-container">
      <div class="main">
        <form method="POST">
          <div class="user-title">
            <h1 class="fullname">Log In</h1>
          </div>

            <input type="text" name="username" placeholder="Your username" required>
          <!--   <input type="email" name="email" placeholder="Email" required> -->
          <input type="password" name="password" value="" id="password" placeholder="Password" required>
            <input type="checkbox" onclick="showpass()"> <h5>Show Password</h5>
            <?php
            if($_SESSION['wrong'] >= 3)
              echo '<div class="g-recaptcha" data-sitekey="6Lexj7MUAAAAAPXCNk94uSkljxr_OttzF4-FXzmp
"></div>';
              ?>
            <input class="social-button"  type="submit" id="login" name="login" value="Log In">
            <a  href = "register"><input  class="social-button"  type = "button" value="You don't have an account? Sign Up"></a>
        </form>
      </div>
    </div><!-- end form-wrap -->
    <!-- ========== END LOGIN-CONTAINER ========== -->

    <!-- ========== START FOOTER ========== -->
    <footer class="footer">
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
  <script>
  window.onload = function() {
      var $recaptcha = document.querySelector('#g-recaptcha-response');

      if($recaptcha) {
          $recaptcha.setAttribute("required", "required");
      }
  };
  </script>
  <!-- ========== END JS ========== -->
<!--Start Cookie Script--> <script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/de14ee1f8e19ae0e12c4eff22fa89a19.js"></script> <!--End Cookie Script-->
   </body>
 </html>
