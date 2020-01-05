<?php
$conectare2 = mysqli_connect("localhost", "root","", "contar_pr");

if(!$conectare2)
 {
    echo "EROARE!".'</br>';
    die(mysqli_connect_error());
  }

?>
