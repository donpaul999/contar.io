<?php
require 'conectare.php';
session_start();

$ok = 0;
if(isset($_SESSION['loggedin']))
  $ok = 1;
$usr = $_GET['id'];
$sql = "SELECT fullname FROM users WHERE username='$usr'";
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
    require 'profile_code.php';
    function link_1($var)
    {
      if (filter_var($var, FILTER_VALIDATE_URL))
        return true;
      return false;
    }
    function buttonorlist($var, $id, $value){
      if(link_1($var))
        echo "<li><a href =".$var." target='_blank'><input type='button' value=".$value."></a></li>";
      else
        echo"<li><input type='button' onclick=hide('".$id."') value=".$value."><p id='".$id."', hidden=true>".$var."</p></li>";

    }
    echo '<div class="user">';
    echo  '<ul>';
       if(!empty($row['facebook']) && !ctype_space($row['facebook']))
        {
          buttonorlist($row['facebook'], "fb", "Facebook");
        }
        if(!empty($row['instagram']) && !ctype_space($row['instagram']))
        {
          buttonorlist($row['instagram'], "ig", "Instagram");
        }
        if(!empty($row['youtube']) && !ctype_space($row['youtube']))
        {
          buttonorlist($row['youtube'], "yt", "YouTube");
        }
        if(!empty($row['linkedin']) && !ctype_space($row['linkedin']))
         {
           buttonorlist($row['linkedin'], "linkedin", "LinkedIn");
         }
        if(!empty($row['github']) && !ctype_space($row['github']))
        {
          buttonorlist($row['github'], "github", "GitHub");
        }
        if(!empty($row['spotify']) && !ctype_space($row['spotify']))
        {
          buttonorlist($row['spotify'], "spotify", "Spotify");
        }
        if(!empty($row['steam']) && !ctype_space($row['steam']))
        {
          buttonorlist($row['steam'], "steam", "Steam");
        }
       if(!empty($row['snapchat']) && !ctype_space($row['snapchat']))
       {
         buttonorlist($row['snapchat'], "snap", "Snapchat");
       }
      if(!empty($row['discord']) && !ctype_space($row['discord']))
      {
        buttonorlist($row['discord'], "discord", "Discord");
      }
      if(!empty($row['skype']) && !ctype_space($row['skype']))
      {
        buttonorlist($row['skype'], "skype", "Skype");
      }
    echo  '</ul>';
    echo  '</div>';
    if($ok == 1)
    {
      echo '<div class="username">';
      echo '<ul>';
      echo '<li><a href = "'.$row['username'].'"><input type = "button" value='.$row['username'].'></a></li>';
      echo '<ul class="sub-menu">';
        echo "<li><a href='..\contar'><input type = 'button' id='back' value='Home'></a></li>";
        echo "<li><a href = '..\update_pg\update'><input type = 'button' value='Update your profile'></a></li>";
        echo "<li><a href='..\login_pg\logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
      echo '</ul>';
      echo  '</ul>';
      echo  '</div>';
    }
    ?>
  </body>
</html>


<script>
function hide(index){

  if(document.getElementById(index).hidden == true)
    document.getElementById(index).hidden = false;
  else
    document.getElementById(index).hidden = true;
}

</script>
