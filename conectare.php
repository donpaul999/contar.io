<?php
$conectare = mysqli_connect("localhost", "root","", "contar_test");

if(!$conectare)
 {
    echo "EROARE!".'</br>';
    die(mysqli_connect_error());
  }

?>
