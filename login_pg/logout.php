<?php

  require '../conectare.php';
$ok = 0;
  session_start();
  session_destroy();
  unset($_SESSION['username']);
  $_SESSION['message']="You are logged out now!";
  return header("location:login");
 ?>
