<?php
require '../conectare.php';
$ok = 0;

if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  echo $email;
  echo $pass;
  $select=mysqli_query($conectare, "select * from users where email='$email' and password='$pass'");
  if(mysqli_num_rows($select))
  {
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
        <link rel="shortcut icon" type="image/x-icon" href="../resources/img/title.png"  />
        <link rel="stylesheet" href="../resources/css/master.css">
        <script src = "../resources/js/password.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

      </head>
      <body>
        <!-- ========== START HEADER ========== -->
        <div class="top-nav top-nav--burger-1 clearfix">
          <div class="logo">
              <a href="../contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
          </div><!-- end logo -->
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
        <div class="container main-container">
          <div class="main reset-page miscelaneous">
            <div class="user-title">
            <h1 class="fullname">Reset your password!</h1>
          </div>
          <form method="post" action="submit_new.php">
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="password" name='password' value="" pattern=".{8,}" title="Must contain at least 8 or more characters" id="password" placeholder="Password" required>
            
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" oninput="check(this)" required maxlength="20">
            <div class="show-pass">
              <div class="show-pass__block">
                <input type="checkbox" onclick="showpass()">
                <h5>Show Password</h5><br>
              </div>
            </div>
            <div class="g-recaptcha" data-sitekey="6Lexj7MUAAAAAPXCNk94uSkljxr_OttzF4-FXzmp
" required></div>
            <input class="social-button" type="submit" name="submit_password">
             <a href="../login_pg/login"><input class="social-button go-back" type="button" value="Go Back"></a>
          </form>
         
          </div>
        </div>


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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
        <script src="../resources/js/plugins.js"></script>
        <script src="../resources/js/main.js"></script>
        <!-- ========== END JS ========== -->
    <!--Start Cookie Script--> <script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/de14ee1f8e19ae0e12c4eff22fa89a19.js"></script> <!--End Cookie Script-->
      </body>
    </html>
    <script>
    function check(input) {
var password = document.getElementById('password').value;
if (input.value !=  password ) {
input.setCustomValidity('Password Must be Matching!');
}
else
{
input.setCustomValidity('');
}
}


function showpass() {
var password = document.getElementById("password");
if (password.type === "password") {
  password.type = "text";
} else {
  password.type = "password";
}
}

window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
    </script>
    <?php
  }
  else
    return header("location:../contar");
}
  else
    return header("location:../contar");

?>
