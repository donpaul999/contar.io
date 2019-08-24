<?php
  require '../conectare.php';

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
       <script src = "../resources/js/lettersandnumbers.js"></script>
       <script src="https://www.google.com/recaptcha/api.js" async defer></script>

   </head>
   <body>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="../index"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
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
                    <a href="https://www.facebook.com/stefanut999" target='_blank'><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="https://www.linkedin.com/in/paulstefancolta/" target='_blank'><i class="fab fa-linkedin-in"></i></i></a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/paulstefancolta/" target='_blank'><i class="fab fa-instagram"></i></a>
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

    <!-- ========== START REGISTER CONTAINER ========== -->

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-wrap mrg-header-size form-wrap-register">
            <form method="POST" action="signup.php">
                <h1 class="fullname">Register</h1>
                <input type="text" name="username" id="username" placeholder="Your username - letters and numbers only" onkeypress="return alphanum(event)" required maxlength="25">
                <input type="text" name="FullName" placeholder="Your Full Name - letters, space and dash only" onkeypress="return alphanumdash(event)" required maxlength="100">
                <input required type="text" class="form-control" placeholder="Date" onfocus="(this.type='date')"/>
                <input type="email" name="email" placeholder="Email" required maxlength="50">
                <input type="password" name="password" value="" pattern=".{8,}" title="Must contain at least 8 or more characters" id="password" placeholder="Password" required>
                <div class="show-pass">
                  <input type="checkbox" onclick="showpass()">
                  <h5>Show Password</h5>
                </div>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" oninput="check(this)" required maxlength="20">
                <span id='message'></span>
                <div class="g-recaptcha" data-sitekey="6Lexj7MUAAAAAPXCNk94uSkljxr_OttzF4-FXzmp"></div>
                <input class="social-button" type="submit" id="submit" value="Sign Up">
                <a href = "login"><input class="social-button" type = "button" value="Already registered? Log In"></a>
            </form>
          </div><!-- end container -->
        </div>
      </div>
    </div>
    <!-- ========== END REGISTER CONTAINER========== -->

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
  </body>
 </html>
