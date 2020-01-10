<?php
  require 'conectare2.php';
  require '../conectare.php';
  $ok = 1;
  session_start();
  if(!isset($_SESSION['loggedin']))
        return header("location:../login_pg/login");
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username='$username'";
  $query = mysqli_query($conectare, $sql);
  $arr = mysqli_fetch_array($query);
  if($arr['premium'] == 0)
     return header("location:../contar");
  $data['gender']['Male'] = $data['gender']['Female'] = 0;
  $data['age']['-18'] = $data['age']['18-24'] =  $data['age']['24+'] = 0;
  $sql = "SELECT * FROM ".$username." ORDER BY ID";
  $query = mysqli_query($conectare2, $sql);
  while($arr = mysqli_fetch_array($query))
      {
       // print_r($arr);
        $user = $arr["username"];
        $sql = "SELECT * FROM users WHERE username='$user'";
        $query2 = mysqli_query($conectare, $sql);
        $arr2 = mysqli_fetch_array($query2);
        $data['gender'][$arr2['gender']]++;
        $datetime1 = strtotime(date("Y-m-d"));
        //echo date("Y-m-d").": ".$datetime1.'</br>';
        for($i = 0; $i < strlen($arr2['birthdate']) ; ++$i){
            if(!($arr2['birthdate'][$i] >= '0' && $arr2['birthdate'][$i] <= '9')){
                $arr2['birthdate'][$i] = '-';
                //echo "***".'</br>';
            }
        }
        $datetime2 = strtotime($arr2['birthdate']);
        //echo $arr2['birthdate'].": ".$datetime2.'</br>';
        $secs = abs($datetime1 - $datetime2);// == <seconds between the two times>
        $years =intval( ($secs / 86400) / 365 );
        if($years < 18)
            $data['age']['-18']++;
        if($years >= 18 && $years <= 24)
            $data['age']['18-24']++;
        if($years > 24)
           $data['age']['24+']++;
      }
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

  </head>
  <body>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->


      <?php
       if($ok == 1)
            {
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
            }
            else {
              echo "<a class='join' href='index'><input class='social-button' type = 'button' id='back' value='Join here'></a>";
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
    <div class="container main-container">
      <div class="main mail-sent">
        <div class="user-title">
          <h1 class="fullname">Detailed Graphs</h1>
        </div>
      </div>
    <?php
        echo '<ul><h1>Gender</h1>
                 <li><h3>Male: '.$data['gender']['Male'].'</h3></li>
                 <li><h3>Female: '.$data['gender']['Female'].'</h3></li>
              </ul>
              ';
        echo '<ul><h1>Age</h1>
                 <li><h3>-  18: '.$data["age"]["-18"].'</h3></li>
                 <li><h3>18-24: '.$data["age"]["18-24"].'</h3></li>
                 <li><h3>24+: '.$data["age"]["24+"].'</h3></li>
              </ul>
              ';
    ?>
   </div>
    <?php
    if($ok == 1){
        echo '<a href="contar"><input class="social-button go-back" type="button" value="Go Back"></a>';
        }
    ?>
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
</html>
