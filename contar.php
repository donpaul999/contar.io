<?php
require 'conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:login_pg\login.php");
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
    echo '<a href ="profile.php?id='.$username.'"><input type = "button" value="See your profile"></a><br>';
    ?>
    <a href = "update_pg\update.php"><input type = "button" value="Update your profile"></a>
  </body>
</html>
