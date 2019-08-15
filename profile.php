<?php
require 'conectare.php';
session_start();

$ok = 0;
if(isset($_SESSION['loggedin']))
  $ok = 1;

$username = $_GET['id'];
$sql = "SELECT fullname FROM users WHERE username='$username'";
$var = mysqli_query($conectare, $sql);
$fn = mysqli_fetch_array($var);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="icons\logo.png" />
    <link rel="stylesheet" type="text/css" href="resources\css\style_index.css">
    <title>Contar.io</title>
    <h1><?php echo $fn['fullname'];?></h1>
  </head>
  <body>
    <?php
      $sql = "SELECT * FROM accounts WHERE username='$username'";
      $var = mysqli_query($conectare, $sql);
      $row = mysqli_fetch_array($var);
    if(!empty($row['facebook']) && !ctype_space($row['facebook']))
     echo "<a href =".$row['facebook']." target='_blank'><input type='button' value='Facebook'></a><br>";
    if(!empty($row['instagram']) && !ctype_space($row['instagram']))
     echo "<a href =".$row['instagram']." target='_blank'><input type='button' value='Instagram'></a><br>";
    if($ok == 1)
    {
      echo "<a href = 'update_pg\update'><input type = 'button' value='Update your profile'></a><br>";
      echo "<a href='contar'><input type = 'button' id='back' value='Go Back'></a>";
    }
    ?>
  </body>
</html>
