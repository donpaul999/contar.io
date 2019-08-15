<?php
require '../conectare.php';
session_start();
if(!isset($_SESSION['loggedin']))
  return header("location:..\login_pg\login.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="..\icons\logo.png" />
    <link rel="stylesheet" type="text/css" href="..\resources\css\style_index.css">
    <script src = "resources\js\password.js"></script>
    <h1>Update succesful!</h1>
  </head>
  <body>
    <a href = "..\contar"><input type = "button" value="Go Back"></a>
  </body>
</html>
