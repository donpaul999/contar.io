<?php
  require 'conectare.php';
$ok = 0;

  session_start();

  if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['loggedin']))
    if(!empty($_COOKIE['username']) && !empty($_COOKIE['password']) && !empty($_COOKIE['loggedin'])){
      echo 1;
      return;
    $username = $_COOKIE['username'];
     $password = $_COOKIE['password'];
     $ok = 1;
     $query = "SELECT * FROM users WHERE username='$username' and password='$password'";

   $result = mysqli_query($conectare, $query);
   $count = mysqli_num_rows($result);

     if($count > 0 && $ok == 1)
       {
   session_start();
   $_SESSION['loggedin'] = '1';
   $row = mysqli_fetch_array($result);
   $usr = $row['username'];
   $pass = $row['password'];
   $_SESSION['username'] = $usr;

   require('user_info/stats.php');
   return header("location:contar");
   }
   else
   {
   $_SESSION['wrong']++;
   return header("location:login_pg/loginfailed");
   }

  }


  if(isset($_SESSION['loggedin']))
  return header("location:contar");

?>

 <!DOCTYPE html>
 <html>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />   <head>
     <style>
     img[alt="www.000webhost.com"] {
         display: none !important;
     }
     </style>
       <title> Contar.io </title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="shortcut icon" type="image/x-icon" href="resources/img/title.png" />
       <link rel="stylesheet" href="resources/css/master.css">
       <script src = "resources/js/password.js"></script>
   </head>
   <body class="home">
    <?php
      if ($android == 1) {
        echo
        '
          <div class="android-header">
            <div class="text">
              <p>Contar.io<br>
              Get it on Google Play.</p>
            </div>
            <a href="https://play.google.com/store/apps/details?id=io.contar.app" class="android-button">Install</a>
          </div>
        ';
      }
    ?>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="index"><img src="resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
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
                  echo "<li><a href='../find'><input type = 'button' id='back' value='Search users'></a></li>";
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

     <!-- ========== START HOME CONTAINER ========== -->
     <div class="container main-container home-container">
       <div class="main">
        <div class="home-icons-active">
          <button class="update-icon" id='b_fb'><i style="color: #3578E5;" class="fab fa-facebook-f"></i></button>
          <button class="update-icon" id='b_ig'><i style="color: #C13584;" class="fab fa-instagram"></i></button>
          <button class="update-icon" id='b_twitter'><i style="color: #0099e5;" class="fab fa-twitter"></i></button>
          <button class="update-icon" id='b_yt'><i style="color: #FF0000;" class="fab fa-youtube"></i></button>
          <button class="update-icon" id='b_linked'><i style="color: #0077B5;" class="fab fa-linkedin"></i></button>
          <button class="update-icon" id='b_reddit'><i style="color: #ff4500;" class="fab fa-reddit"></i></button>
          <button class="update-icon" id='b_pinterest'><i style="color: #bd081c;" class="fab fa-pinterest"></i></button>
          <button class="update-icon" id='b_tumblr'><i style="color: #35465c;" class="fab fa-tumblr"></i></button>
          <button class="update-icon" id='b_github'><i style="color: #333;" class="fab fa-github"></i></button>
          <button class="update-icon" id='b_paypal'><i style="color: #3578E5;" class="fab fa-paypal"></i></button>
          <button class="update-icon" id='b_spotify'><i style="color: #1DB954;" class="fab fa-spotify"></i></button>
          <button class="update-icon" id='b_snap'><i style="color: #FFFC00;" class="fab fa-snapchat"></i></button>
          <button class="update-icon" id='b_discord'><i style="color: #7289DA;" class="fab fa-discord"></i></button>
          <button class="update-icon" id='b_skype'><i style="color: #00AFF0;" class="fab fa-skype"></i></button>
          <button class="update-icon" id='b_steam'><i style="color: #112758;" class="fab fa-steam"></i></button>
          <button class="update-icon" id='b_twitch'><i style="color: #6441a5;" class="fab fa-twitch"></i></button>
        </div>
        <div class="user-title">
          <h1 class="fullname">All of your online accounts in one place. </br>
          -> Online visiting card <-
          </h1>
        </div>
        <div class="home-icons">
          <button class="update-icon" id='b_fb'><i style="color: #3578E5;" class="fab fa-facebook-f"></i></button>
          <button class="update-icon" id='b_ig'><i style="color: #C13584;" class="fab fa-instagram"></i></button>
          <button class="update-icon" id='b_twitter'><i style="color: #0099e5;" class="fab fa-twitter"></i></button>
          <button class="update-icon" id='b_yt'><i style="color: #FF0000;" class="fab fa-youtube"></i></button>
          <button class="update-icon" id='b_linked'><i style="color: #0077B5;" class="fab fa-linkedin"></i></button>
          <button class="update-icon" id='b_reddit'><i style="color: #ff4500;" class="fab fa-reddit"></i></button>
          <button class="update-icon" id='b_pinterest'><i style="color: #bd081c;" class="fab fa-pinterest"></i></button>
          <button class="update-icon" id='b_tumblr'><i style="color: #35465c;" class="fab fa-tumblr"></i></button>
          <button class="update-icon" id='b_github'><i style="color: #333;" class="fab fa-github"></i></button>
          <button class="update-icon" id='b_paypal'><i style="color: #3578E5;" class="fab fa-paypal"></i></button>
          <button class="update-icon" id='b_spotify'><i style="color: #1DB954;" class="fab fa-spotify"></i></button>
          <button class="update-icon" id='b_snap'><i style="color: #FFFC00;" class="fab fa-snapchat"></i></button>
          <button class="update-icon" id='b_discord'><i style="color: #7289DA;" class="fab fa-discord"></i></button>
          <button class="update-icon" id='b_skype'><i style="color: #00AFF0;" class="fab fa-skype"></i></button>
          <button class="update-icon" id='b_steam'><i style="color: #112758;" class="fab fa-steam"></i></button>
          <button class="update-icon" id='b_twitch'><i style="color: #6441a5;" class="fab fa-twitch"></i></button>
        </div>
        <a href = "login_pg/login"><input class="social-button" type = "button" value="Log In"></a>
        <a href = "login_pg/register"><input class="social-button" type = "button" value="Register"></a>
       </div><!-- end main  -->
     </div><!-- end  container -->
     <!-- ========== END HOME CONTAINER========== -->

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
  <script src="resources/js/jquery.js"></script>
  <script src="resources/js/bootstrap.min.js"></script>
  <script src="resources/js/plugins.js"></script>
  <script src="resources/js/main.js"></script>
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
