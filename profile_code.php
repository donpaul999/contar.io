<?php
  require 'conectare.php';
  $sql = "SELECT * FROM accounts WHERE username='$usr'";
  $var = mysqli_query($conectare, $sql);
  $row = mysqli_fetch_array($var);
 ?>
