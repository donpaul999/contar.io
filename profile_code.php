<?php
  require 'conectare.php';
$ok = 0;
  $sql = "SELECT * FROM accounts WHERE username='$usr'";
  $var = mysqli_query($conectare, $sql);
  $row = mysqli_fetch_array($var);
 ?>
