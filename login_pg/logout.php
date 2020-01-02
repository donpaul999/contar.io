<?php

  require '../conectare.php';
$ok = 0;
  session_start();
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['android']);
  unset($_SESSION['loggedin']);
  setcookie("username", "", time()-3600);
  setcookie("password", "", time()-3600);
  setcookie("loggedin", "", time()-3600);


  $_SESSION['message']="You are logged out now!";
  return header("location:../index");
 ?>
