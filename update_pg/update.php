<?php
require '../conectare.php';
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
        echo "<li><a href='../update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
echo "<li><a href='../login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
      echo '</ul>';
      echo  '</ul>';
      echo  '</div>';
    ?>
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

  <!-- ========== START UPDATE CONTAINER ========== -->
  <div class="container main-container">
    <div class="main">
      <img onclick=myFunction(this) id='b_fb' src='../resources/img/fb.png'>
      <button onclick=myFunction(this) id='b_ig'>Instagram</button>
      <button onclick=myFunction(this) id='b_yt'>YouTube</button>
      <button onclick=myFunction(this) id='b_linked'>LinkedIn</button>
      <button onclick=myFunction(this) id='b_github'>GitHub</button>
      <button onclick=myFunction(this) id='b_spotify'>Spotify</button>
      <button onclick=myFunction(this) id='b_steam'>Steam</button>
      <button onclick=myFunction(this) id='b_snap'>Snapchat</button>
      <button onclick=myFunction(this) id='b_discord'>Discord</button>
      <button onclick=myFunction(this) id='b_skype'>Skype</button>
      <div class="form-wrap form-wrap-update">
        <form method="POST" action="update_code.php">
            <?php
            require '../profile_code.php';
            ?>
              <input type="text" name="facebook" id='fb' placeholder="Your Facebook profile: <?php echo $row['facebook']; ?>" maxlength="200"><br>
              <input type="text" name="instagram" id='ig' placeholder="Your Instagram profile or username: <?php echo $row['instagram']; ?>" maxlength="200"><br>
              <input type="text" name="youtube" id='yt' placeholder="Your YouTube channel: <?php echo $row['youtube']; ?>" maxlength="200"><br>
              <input type="text" name="linkedin" id='linked' placeholder="Your LinkedIn profile: <?php echo $row['linkedin']; ?>" maxlength="200"><br>
              <input type="text" name="github" id='github' placeholder="Your GitHub profile: <?php echo $row['github']; ?>" maxlength="200"><br>
              <input type="text" name="spotify" id='spotify' placeholder="Your Spotify profile: <?php echo $row['spotify']; ?>" maxlength="200"><br>
              <input type="text" name="steam" id='steam' placeholder="Your Steam profile: <?php echo $row['steam']; ?>" maxlength="200"><br>
              <input type="text" name="snapchat" id='snap' placeholder="Your Snapchat username: <?php echo $row['snapchat']; ?>" maxlength="200"><br>
              <input type="text" name="discord" id='discord' placeholder="Your Discord username + tag: <?php echo $row['discord']; ?>" maxlength="200"><br>
              <input type="text" name="skype" id='skype' placeholder="Your Skype username: <?php echo $row['skype']; ?>" maxlength="200"><br>
              <input type="submit" class="social-button" id="update" name="update: <?php echo $row['discord']; ?>" value="Update"><br>
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
  <script>
  function myFunction(id) {
  var id = id.id.split("_")[1];//extract input id from button id
    var x = document.getElementById(id);
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  </script>
  <!-- ========== END JS ========== -->
<!--Start Cookie Script--> <script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/de14ee1f8e19ae0e12c4eff22fa89a19.js"></script> <!--End Cookie Script-->
  </body>
</html>
