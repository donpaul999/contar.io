<?php
  require '../conectare.php';
$ok = 0;
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
       <script src = "../resources/js/lettersandnumbers.js"></script>
       <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
           document.getElementById('status').innerHTML = 'Sign up with Facebook';
           } else {
           // The person is not logged into Facebook, so we're not sure if
           // they are logged into this app or not.
           document.getElementById('status').innerHTML = 'Sign up with Facebook';
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
           document.getElementById("FullName").value = response.name;
           document.getElementById("email").value = response.email;
           var access_token =   FB.getAuthResponse()['accessToken']
           document.getElementById("access").value = access_token;
           });
           }
           </script>
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
            <?php
              echo '<div class="username">';
              echo '<ul>';
              echo '<li><input type = "button" value='.$usr.'></li>';
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

    <!-- ========== START REGISTER CONTAINER ========== -->

    <div class="container main-container">
      <div class="main">
        <div class="col-sm-12">
          <div class="form-wrap mrg-header-size form-wrap-register">
            <form method="POST" action="signup.php">
                <h1 class="fullname">Register</h1>
                <div id="status"></div>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
                <input type="hidden" name="access" id="access" value="">
                <input type="text" name="username" id="username" placeholder="Your username - letters and numbers only" onkeypress="return alphanum(event)" required maxlength="25">
                <input type="text" name="FullName" id="FullName" placeholder="Your Full Name - letters, space and dash only" onkeypress="return alphanumdash(event)" required maxlength="100">
                <input required type="text" class="form-control" name="birthdate" placeholder="Your Birthdate" onfocus="(this.type='date')"/>
                <input type="email" name="email" id="email" placeholder="Email" required maxlength="50">
                <input type="password" name="password" value="" pattern=".{8,}" title="Must contain at least 8 or more characters" id="password" placeholder="Password" required>
                <div class="show-pass">
                  <div class="show-pass__block">
                    <input type="checkbox" onclick="showpass()">
                    <h5>Show Password</h5><br>
                  </div>
                </div>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" oninput="check(this)" required maxlength="20">
                                  <div class="show-pass__block">
                    <input type="checkbox" required>
                    <h8>I have read and agree with the <a href="../privacy" style="color:blue"> Privacy Policy</a> and with <a href="../termsandcond" style="color:blue">the Terms and Conditions</a></h8>
                  </div>
                <span id='message'></span>
                <div class="g-recaptcha" data-sitekey="6Le2pbYUAAAAADKfsQeqYzGUbu2LVh39mcfCCeVd"></div>
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
