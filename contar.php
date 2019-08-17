<?php
require 'conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:login_pg\login");
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="icons\logo.png" />
    <link rel="stylesheet" type="text/css" href="resources\css\style_index.css">
    <title>Contar.io</title>
    <h1>Welcome <?php echo $username; ?> !</h1>
  </head>
  <body>
    <?php
    echo '<a href ="p/'.$username.'"><input type = "button" value="See your profile"></a><br>';
    echo '<div class="username">';
    echo '<ul>';
    echo '<li><a href = "p/'.$username.'"><input type = "button" value='.$username.'></a></li>';
    echo '<ul class="sub-menu">';
      echo "<li><a href='contar'><input type = 'button' id='back' value='Home'></a></li>";
      echo "<li><a href = 'update_pg\update'><input type = 'button' value='Update your profile'></a></li>";
      echo "<li><a href='login_pg\logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
    echo '</ul>';
    echo  '</ul>';
    echo  '</div>';
    ?>
  </body>
</html>
