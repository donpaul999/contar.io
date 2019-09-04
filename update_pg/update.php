<?php
require '../conectare.php';
$ok = 0;
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:../login_pg/login");
$usr = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="../image/x-icon" href="../resources/img/title.png"  />
    <link rel="stylesheet" href="../resources/css/master.css">
    <title>Contar.io</title>
    <div class="user-title">
      <h1 class="fullname">Update your profile</h1>
      <h4>Add usernames or links to your online accounts</h4>
    </div>
  </head>
  <body class="update-profile">

  <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="../contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
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

  <!-- ========== START UPDATE CONTAINER ========== -->
  <div class="container main-container">
    <div class="main update-main">
      <div>
        <button class="update-icon" id='b_fb'><i style="color: #3578E5;" class="fab fa-facebook-f"></i></button>
        <button class="update-icon" id='b_ig'><i style="color: #C13584;" class="fab fa-instagram"></i></button>
        <button class="update-icon" id='b_twitter'><i style="color: #0099e5;" class="fab fa-twitter"></i></button>
        <button class="update-icon" id='b_yt'><i style="color: #FF0000;" class="fab fa-youtube"></i></button>
        <button class="update-icon" id='b_linked'><i style="color: #0077B5;" class="fab fa-linkedin"></i></button>
        <button class="update-icon" id='b_reddit'><i style="color: #ff4500;" class="fab fa-reddit"></i></button>
        <button class="update-icon" id='b_pinterest'><i style="color: #bd081c;" class="fab fa-pinterest"></i></button>
        <button class="update-icon" id='b_tumblr'><i style="color: #35465c;" class="fab fa-tumblr"></i></button>
        <button class="update-icon" id='b_patreon'><i style="color: #f96854;" class="fab fa-patreon"></i></button>
        <button class="update-icon" id='b_github'><i style="color: #333;" class="fab fa-github"></i></button>
        <button class="update-icon" id='b_paypal'><i style="color: #3578E5;" class="fab fa-paypal"></i></button>
        <button class="update-icon" id='b_spotify'><i style="color: #1DB954;" class="fab fa-spotify"></i></button>
        <button class="update-icon" id='b_snap'><i style="color: #FFFC00;" class="fab fa-snapchat"></i></button>
        <button class="update-icon" id='b_discord'><i style="color: #7289DA;" class="fab fa-discord"></i></button>
        <button class="update-icon" id='b_skype'><i style="color: #00AFF0;" class="fab fa-skype"></i></button>
        <button class="update-icon" id='b_steam'><i style="color: #112758;" class="fab fa-steam"></i></button>
        <button class="update-icon" id='b_twitch'><i style="color: #6441a5;" class="fab fa-twitch"></i></button>
      </div>
      <div class="form-wrap form-wrap-update">
        <form method="POST" action="update_code.php">
            <?php
            require '../profile_code.php';
            ?>
              <input type="text" name="facebook" id='fb' placeholder="Your Facebook profile: <?php echo $row['facebook']; ?>" maxlength="200">
              <input type="text" name="instagram" id='ig' placeholder="Your Instagram profile or username: <?php echo $row['instagram']; ?>" maxlength="200">
              <input type="text" name="twitter" id='twitter' placeholder="Your Twitter profile or username: <?php echo $row['twitter']; ?>" maxlength="200">
              <input type="text" name="youtube" id='yt' placeholder="Your YouTube channel: <?php echo $row['youtube']; ?>" maxlength="200">
              <input type="text" name="linkedin" id='linked' placeholder="Your LinkedIn profile: <?php echo $row['linkedin']; ?>" maxlength="200">
              <input type="text" name="reddit" id='reddit' placeholder="Your Reddit profile or username: <?php echo $row['reddit']; ?>" maxlength="200">
              <input type="text" name="pinterest" id='pinterest' placeholder="Your Pinterest profile or username: <?php echo $row['pinterest']; ?>" maxlength="200">
              <input type="text" name="tumblr" id='tumblr' placeholder="Your Tumblr profile or username: <?php echo $row['tumblr']; ?>" maxlength="200">
              <input type="text" name="patreon" id='patreon' placeholder="Your Patreon link: <?php echo $row['patreon']; ?>" maxlength="200">
              <input type="text" name="github" id='github' placeholder="Your GitHub profile: <?php echo $row['github']; ?>" maxlength="200">
              <input type="text" name="paypal" id='paypal' placeholder="Your PayPal.me link : <?php echo $row['paypal']; ?>" maxlength="200">
              <input type="text" name="spotify" id='spotify' placeholder="Your Spotify profile: <?php echo $row['spotify']; ?>" maxlength="200">
              <input type="text" name="snapchat" id='snap' placeholder="Your Snapchat username: <?php echo $row['snapchat']; ?>" maxlength="200">
              <input type="text" name="discord" id='discord' placeholder="Your Discord username + tag: <?php echo $row['discord']; ?>" maxlength="200">
              <input type="text" name="skype" id='skype' placeholder="Your Skype username: <?php echo $row['skype']; ?>" maxlength="200">
              <input type="text" name="steam" id='steam' placeholder="Your Steam profile: <?php echo $row['steam']; ?>" maxlength="200">
              <input type="text" name="twitch" id='twitch' placeholder="Your Twitch profile: <?php echo $row['twitch']; ?>" maxlength="200">
              <!-- start update -->
              <input type="submit" class="social-button" id="update" name="update" value="Update">
              <!-- end update -->
        </form>
      </div><!-- end form-wrap -->
    </div>
  </div><!-- end container -->
  <!-- ========== END UPDATE CONTAINER========== -->

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
