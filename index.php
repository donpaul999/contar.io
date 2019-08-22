<?php
  require 'conectare.php';
  session_start();

  if(isset($_SESSION['loggedin']))
  return header("location:contar");

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
       <link rel="stylesheet" href="resources/css/master.css">
       <script src = "resources\js\password.js"></script>
   </head>
   <body>
     <a href = "login_pg\register"><input type = "button" value="Register"></a>
     <a href = "login_pg\login"><input type = "button" value="Log In"></a>
   </body>
 </html>
