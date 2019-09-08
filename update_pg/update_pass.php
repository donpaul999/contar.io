<?php
require '../conectare.php';
$ok = 0;
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:../login_pg/login");
$username = $_SESSION['username'];

if(!empty($_POST['change_pass']))
  {
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
      $secretKey = '6Le2pbYUAAAAAN6emlMyNV1kXDsiSOfArEDHZyei';
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
      $responseData = json_decode($verifyResponse);
    if($responseData->success)
     $ok = 1;
    }
    $old_pass = md5($_POST['old_pass']);
    $query = "SELECT * FROM users WHERE username='$username' and password='$old_pass'";
    $result = mysqli_query($conectare, $query);
    $count = mysqli_num_rows($result);
    if($count > 0)
    {
      $pass = md5($_POST['password']);
      $query = "UPDATE users SET password = '$pass' WHERE username= '$username'";
      $result = mysqli_query($conectare, $query);
      return header("location:pass_success");
    }
    else
      return header("location:pass_wrong");}
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
  <body class="update-succes update">
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="../contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
      <?php
        echo '<div class="username">';
        echo '<ul>';
        echo '<li><input type = "button" value='.$username.'></li>';
        echo '<ul class="sub-menu">';
          echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
          echo "<li><a href = 'update'><input type = 'button' value='Update your profile'></a></li>";
          echo "<li><a href='update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
          echo "<li><a href='../login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
        echo '</ul>';
        echo  '</ul>';
        echo  '</div>';
        ?>
      <?php

        echo'<div class="menu-trigger">';
         echo' <input type="checkbox">';
          echo'<span></span>';
          echo'<span></span>';
          echo'<span></span>';
        echo'</div><!-- end menu-trigger -->';

      ?>
      <header class="header header--bgk">
        <div class="container">
            <?php
              echo '<div class="username">';
              echo '<ul>';
              echo '<li><input type = "button" value='.$username.'></li>';
              echo '<ul class="sub-menu">';
                echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
                echo "<li><a href = 'update'><input type = 'button' value='Update your profile'></a></li>";
                echo "<li><a href='update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
                echo "<li><a href='../login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
              echo '</ul>';
              echo  '</ul>';
              echo  '</div>';
            ?>
        </div><!-- end container -->
      </header>
    </div><!-- end top-nav -->
    <!-- ========== END HEADER ========== -->

    <div class="container main-container">
      <div class="main">
          <div class="user-title">
            <h1 class="fullname">Change your password</h1>
          </div>
        <div class="form-wrap">
          <div class="container">
            <form method="POST">
              <input type="password" name="old_pass" placeholder="Old password" required>
              <input type="password" name="password" value="" pattern=".{8,}" title="Must contain at least 8 or more characters" id="password" placeholder="Password" required>
              <div class="show-pass">
                <input type="checkbox" onclick="showpass()"> <h5>Show Password</h5>
              </div>
              <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" oninput="check(this)" required maxlength="20">
              <div class="g-recaptcha" data-sitekey="6Le2pbYUAAAAADKfsQeqYzGUbu2LVh39mcfCCeVd"></div>
              <input class="social-button"  type="submit" id="change_pass" name="change_pass" value="Change Password">
            </form>
          </div>
        </div><!-- end form-wrap -->
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

  </body>
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
</html>
