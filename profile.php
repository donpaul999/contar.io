<?php
require 'conectare.php';
session_start();

$ok = 0;
if(isset($_SESSION['loggedin']))
  $ok = 1;
$usr = $_GET['id'];
$sql = "SELECT fullname FROM users WHERE username='$usr'";
$var = mysqli_query($conectare, $sql);
$fn = mysqli_fetch_array($var);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="../image/x-icon" href="icons\logo.png" />
    <link rel="stylesheet" href="../resources/css/master.css">
    <title>Contar.io</title>
    <div class="user-title">
      <h1 class="fullname"><?php echo $fn['fullname'];?></h1>
    </div><!-- end user-title -->
  </head>
  <body>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
              <div class="logo">
                  <a href="#"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
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
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
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

    <!-- ========== START PROFILE-CONTENT ========== -->
    <div class="contar-profile">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php
              require 'profile_code.php';
              function link_1($var)
              {
                if (filter_var($var, FILTER_VALIDATE_URL))
                  return true;
                return false;
              }
              function buttonorlist($var, $id, $value){
                if(link_1($var))
                  echo "<li><a class='social-button' href =".$var." target='_blank'><input type='button' value=".$value."></a></li>";
                else
                  echo"<li><input type='button' onclick=hide('".$id."') value=".$value."><p id='".$id."', hidden=true>".$var."</p></li>";

              }
              echo '<div class="user">';
              echo  '<ul>';
                 if(!empty($row['facebook']) && !ctype_space($row['facebook']))
                  {
                    buttonorlist($row['facebook'], "fb", "Facebook");
                  }
                  if(!empty($row['instagram']) && !ctype_space($row['instagram']))
                  {
                    buttonorlist($row['instagram'], "ig", "Instagram");
                  }
                  if(!empty($row['youtube']) && !ctype_space($row['youtube']))
                  {
                    buttonorlist($row['youtube'], "yt", "YouTube");
                  }
                  if(!empty($row['linkedin']) && !ctype_space($row['linkedin']))
                   {
                     buttonorlist($row['linkedin'], "linkedin", "LinkedIn");
                   }
                  if(!empty($row['github']) && !ctype_space($row['github']))
                  {
                    buttonorlist($row['github'], "github", "GitHub");
                  }
                  if(!empty($row['spotify']) && !ctype_space($row['spotify']))
                  {
                    buttonorlist($row['spotify'], "spotify", "Spotify");
                  }
                  if(!empty($row['steam']) && !ctype_space($row['steam']))
                  {
                    buttonorlist($row['steam'], "steam", "Steam");
                  }
                 if(!empty($row['snapchat']) && !ctype_space($row['snapchat']))
                 {
                   buttonorlist($row['snapchat'], "snap", "Snapchat");
                 }
                if(!empty($row['discord']) && !ctype_space($row['discord']))
                {
                  buttonorlist($row['discord'], "discord", "Discord");
                }
                if(!empty($row['skype']) && !ctype_space($row['skype']))
                {
                  buttonorlist($row['skype'], "skype", "Skype");
                }
              echo  '</ul>';
              echo  '</div>';
              if($ok == 1)
              {
                echo '<div class="username">';
                echo '<ul>';
                echo '<li><a href = "'.$usr.'"><input type = "button" value='.$usr.'></a></li>';
                echo '<ul class="sub-menu">';
                  echo "<li><a href='..\contar'><input type = 'button' id='back' value='Home'></a></li>";
                  echo "<li><a href = '..\update_pg\update'><input type = 'button' value='Update your profile'></a></li>";
                  echo "<li><a href='..\login_pg\logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
                echo '</ul>';
                echo  '</ul>';
                echo  '</div>';
              }
              ?>
          </div><!-- end col-sm-12 -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end contar-profile -->
    <!-- ========== END PROFILE-CONTENT ========== -->

    <!-- ========== START FOOTER ========== -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="footer__social">
            <ul class="social srf-full-menu">
                <li>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-instagram"></i></a>
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
  <script>
  function hide(index){

    if(document.getElementById(index).hidden == true)
      document.getElementById(index).hidden = false;
    else
      document.getElementById(index).hidden = true;
  }

  </script>

</html>
