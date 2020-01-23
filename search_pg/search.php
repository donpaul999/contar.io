<?php
require '../conectare.php';

$ok = 0;

session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:../login_pg/login");
$username = htmlspecialchars($_SESSION['username']);
$ok = 1;
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/title.png" />
    <link rel="stylesheet" href="../resources/css/master.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
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
          <a href="../contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
      <?php
        echo '<div class="username">';
        echo '<ul>';
        echo '<li><input type = "button" value='.$username.'></li>';
        echo '<ul class="sub-menu">';
          echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
          echo "<li><a href = '../update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
          echo "<li><a href='../find'><input type = 'button' id='back' value='Search users'></a></li>";
          echo "<li><a href='../update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
          echo "<li><a href='../login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
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
                echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
                echo "<li><a href = '../update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
                echo "<li><a href='../find'><input type = 'button' id='back' value='Search users'></a></li>";
                echo "<li><a href='../update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
                echo "<li><a href='../login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
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
          <h1 class="fullname">Search for an user</h1>
        </div>
      </div>
         <div class="search-box">
           <input type="text" autocomplete="off" placeholder="Search user" />
           <div class="result">
         </div>
     </div>
    </div>
    <!-- ========== END WELCOME CONTENT ========== -->

    <!-- ========== START FOOTER ========== -->
    <footer class="footer fixed" id="searchfoot">
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
