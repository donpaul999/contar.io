<?php
require '../conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:..\login_pg\login.php");

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
          <input type="text" name="facebook" placeholder="Your Facebook profile">
          <input type="text" name="instagram" placeholder="Your Instagram profile">
          <input type="submit" id="update" name="update" value="Update">
      </form>
    </div>
  </body>
</html>
