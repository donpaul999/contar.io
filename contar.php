<?php
require 'conectare.php';

$ok = 0;

session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:login_pg/login");
$username = htmlspecialchars($_SESSION['username']);

$ok = 1;
$sql = "SELECT * from users where username = '$username'";
$result = mysqli_query($conectare, $sql);
$arr = mysqli_fetch_array($result);
if($arr['gender'] == '')
  return header("location:gender_set");

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="resources/img/title.png" />
    <link rel="stylesheet" href="resources/css/master.css">
    <title>Contar.io</title>

  </head>
  <body>
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
          <a href="contar"><img src="resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
      <?php
        echo '<div class="username">';
        echo '<ul>';
        echo '<li><input type = "button" value='.$username.'></li>';
        echo '<ul class="sub-menu">';
          echo "<li><a href='contar'><input type = 'button' id='back' value='Home'></a></li>";
          echo "<li><a href = 'update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
          echo "<li><a href='find'><input type = 'button' id='back' value='Search users'></a></li>";
          echo "<li><a href='update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
          echo "<li><a href='login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
        echo '</ul>';
        echo  '</ul>';
        echo  '</div>';
        ?>
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
              echo '<li><input type = "button" value='.$username.'></li>';
              echo '<ul class="sub-menu">';
                echo "<li><a href= 'contar'><input type = 'button' id='back' value='Home'></a></li>";
                echo "<li><a href = 'update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
                echo "<li><a href= 'find'><input type = 'button' id='back' value='Search users'></a></li>";
                echo "<li><a href= 'update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
                echo "<li><a href= 'login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
              echo '</ul>';
              echo  '</ul>';
              echo  '</div>';
            ?>
        </div><!-- end container -->
      </header>
    </div><!-- end top-nav -->
    <!-- ========== END HEADER ========== -->

    <!-- ========== START WELCOME CONTENT ========== -->
    <div class="container main-container welcome-content">
        <div class="main">
          <div class="user-title">
          <h1 class="fullname">Welcome <?php echo $username; ?> !</h1>
        </div>
        <?php
        echo '<a href ="p/'.$username.'"><input class="social-button" type = "button" value="See your profile"></a>';
        ?>
        <a href = 'update_pg/update'><input type = 'button' class="social-button" value='Update your profile'></a></li>
        <a href = "premium"><input class="social-button" type = "button" value="[NEW]Pre-order premium access![NEW]"></a>
        <a href = 'top'><input type = 'button' class="social-button" value='Rankings'></a></li>
        <a href = 'search_pg/search'><input type = 'button' class="social-button" value='Search for an user'></a>
      </div>
    </div>
    <!-- ========== END WELCOME CONTENT ========== -->

    <!-- ========== START FOOTER ========== -->
    <footer class="footer fixed">
      <div class="container">
        <div class="row">
          <div class="footer__social">
            <ul class="social srf-full-menu">
                <li>
                  <li>
                    <a href="https://www.facebook.com/stefanut999" target='_blank'><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="https://www.linkedin.com/in/paulstefancolta/" target='_blank'><i class="fab fa-linkedin-in"></i></i></a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/paulstefancolta/" target='_blank'><i class="fab fa-instagram"></i></a>
                  </li>
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

  </body>
</html>
