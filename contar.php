<?php
session_start();
if(isset($_SESSION['loggedin']))
{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>


<?php
}
  else {
    header("location:login.php");
  }

 ?>
