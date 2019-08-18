<?php
require '../conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:..\login_pg\login");
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="..\icons\logo.png" />
    <link rel="stylesheet" type="text/css" href="..\resources\css\style_index.css">
    <title>Contar.io</title>
    <h1>Update your profile</h1>
  </head>
  <body>
    <div class="form-wrap">
      <form method="POST" action="update_code.php">
          <input type="text" name="facebook" placeholder="Your Facebook profile"><br><br>
          <input type="text" name="instagram" placeholder="Your Instagram profile or username"><br><br>
          <input type="text" name="linkedin" placeholder="Your LinkedIn profile"><br><br>
          <input type="text" name="github" placeholder="Your GitHub profile"><br><br>
          <input type="text" name="spotify" placeholder="Your Spotify profile"><br><br>
          <input type="text" name="snapchat" placeholder="Your Snapchat username"><br><br>
          <input type="text" name="discord" placeholder="Your Discord username + tag"><br><br>
          <input type="text" name="skype" placeholder="Your Skype username"><br><br>
          <input type="text" name="youtube" placeholder="Your YouTube channel"><br><br>
          <input type="submit" id="update" name="update" value="Update"><br>
      </form>
    </div>
      <?php
      echo '<div class="username">';
      echo '<ul>';
      echo '<li><a href = "../p/'.$username.'"><input type = "button" value='.$username.'></a></li>';
      echo '<ul class="sub-menu">';
        echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
        echo "<li><a href = 'update'><input type = 'button' value='Update your profile'></a></li>";
        echo "<li><a href='../login_pg\logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
      echo '</ul>';
      echo  '</ul>';
      echo  '</div>';
      ?>
  </body>
</html>
