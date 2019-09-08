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
          $secretKey = '6Le2pbYUAAAAAN6emlMyNV1kXDsiSOfArEDHZyei
';
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
          $responseData = json_decode($verifyResponse);
        if($responseData->success)
         $ok = 1;
       }
       else
        return header("location:captcha_log");
     }
    if(strlen($_POST['g_mail']) > 1)
      {
        $mail = $_POST['g_mail'];
        $query = "SELECT * FROM users WHERE email='$mail'";
      }
    else{
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
  }
    $result = mysqli_query($conectare, $query);
    $count = mysqli_num_rows($result);
    if($count > 0 && $ok == 1)
      {
        session_start();
        $_SESSION['loggedin'] = '1';
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $row['username'];
        require('../user_info/stats.php');
        return header("location:../contar");
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
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />   <head>
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
     <script>
     function statusChangeCallback(response) {
     console.log('statusChangeCallback');
     console.log(response);
     // The response object is returned with a status field that lets the
     // app know the current login status of the person.
     // Full docs on the response object can be found in the documentation
     // for FB.getLoginStatus().
     if (response.status === 'connected') {
     // Logged into your app and Facebook.
     testAPI();
     } else if (response.status === 'not_authorized') {
     // The person is logged into Facebook, but not your app.
     document.getElementById('status').innerHTML = 'Login with Facebook ';
     } else {
     // The person is not logged into Facebook, so we're not sure if
     // they are logged into this app or not.
     document.getElementById('status').innerHTML = 'Login with Facebook ';
     }
     }
     // This function is called when someone finishes with the Login
     // Button. See the onlogin handler attached to it in the sample
     // code below.
     function checkLoginState() {
     FB.getLoginStatus(function(response) {
     statusChangeCallback(response);
     });
     }
     window.fbAsyncInit = function() {
     FB.init({
     appId : '825560317898128',
     cookie : true,
     xfbml : true,
     version : 'v4.0'
     });
     // Now that we've initialized the JavaScript SDK, we call
     // FB.getLoginStatus(). This function gets the state of the
     // person visiting this page and can return one of three states to
     // the callback you provide. They can be:
     //
     // 1. Logged into your app ('connected')
     // 2. Logged into Facebook, but not your app ('not_authorized')
     // 3. Not logged into Facebook and can't tell if they are logged into
     // your app or not.
     //
     // These three cases are handled in the callback function.

     FB.getLoginStatus(function(response) {
     statusChangeCallback(response);
     });
     };
     // Load the SDK asynchronously
     (function(d, s, id) {
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));

     // Here we run a very simple test of the Graph API after login is
     // successful. See statusChangeCallback() for when this call is made.
     function testAPI() {
     console.log('Welcome! Fetching your information.... ');
     FB.api('/me?fields=name,email', function(response) {
     console.log('Successful login for: ' + response.name);

     document.getElementById("status").innerHTML = '<p>Welcome, '+response.name+'! </p>';
     document.getElementById("g_mail").value = response.email;
     if(confirm('Continue with Facebook?')){
     document.getElementById("login").click();
      }
  });
     }
     </script>
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
          <div id="status"></div>
          <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
            <input type="hidden" name="g_mail" id="g_mail" value="">
            <input type="text" name="username" placeholder="Your username">
          <!--   <input type="email" name="email" placeholder="Email" required> -->
          <input type="password" name="password" value="" id="password" placeholder="Password" >
            <input type="checkbox" onclick="showpass()"> <h5>Show Password</h5>
            <?php
            if($_SESSION['wrong'] >= 3)
              echo '<div class="g-recaptcha" data-sitekey="6Le2pbYUAAAAADKfsQeqYzGUbu2LVh39mcfCCeVd"></div>';
              ?>
            <input class="social-button"  type="submit" id="login" name="login" value="Log In">
            <a  href = "../reset/reset_passhtml"><input  class="social-button"  type = "button" value="Forgot password?"></a>
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
  <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
  <script>
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#237afc"
      },
      "button": {
        "background": "#fff",
        "text": "#237afc"
      }
    },
    "content": {
      "href": "policy.html"
    }
  });

  </script>
   </body>
 </html>
