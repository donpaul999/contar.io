<?php
$conectare = mysqli_connect("localhost", "root","", "contar_test");

if(!$conectare)
 {
    echo "EROARE!".'</br>';
    die(mysqli_connect_error());
  }

$android = 0;

  $AndroidApp = 0;
 $AndroidBrowser = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
 if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
  if($_SERVER['HTTP_X_REQUESTED_WITH'] == "io.contar.app")
    $AndroidApp = 1;


 if ($AndroidBrowser) {
    $android = 1;
 }

 if($AndroidApp)
  $android = 0;


?>
