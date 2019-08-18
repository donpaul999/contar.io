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
      if (strpos($var, 'web.') == 8 && (strstr($var, 'facebook') == true || strstr($var, 'fb') == true))
         return true;
      else
        if(strpos($var,'instagram') == 12 || strpos($var,'youtube') || strpos($var,'youtu') == 8 || strpos($var, 'linkedin') == 12 || strpos($var, 'github') == 8 || strpos($var, 'spotify') == 12 ||  strpos($var,'skype') == 12 ||  strpos($var, 'discord') == 8)
          return true;
      return false;
    }
    echo '<div class="user">';
    echo  '<ul>';
       if(!empty($row['facebook']) && !ctype_space($row['facebook']))
        {
        if(link_1($row['facebook']))
          echo "<li><a href =".$row['facebook']." target='_blank'><input type='button' value='Facebook'></a></li>";
        else
          echo"<li><input type='button' onclick=hide('fb') value='Facebook'><p id='fb', hidden=true>".$row['facebook']."</p></li>";
        }
        if(!empty($row['instagram']) && !ctype_space($row['instagram'])){
          if(link_1($row['instagram']))
            echo "<li><a href =".$row['instagram']." target='_blank'><input type='button' value='Instagram'></a></li>";
          else
            echo"<li><input type='button' onclick=hide('ig') value='Instagram'><p id='ig', hidden=true>".$row['instagram']."</p></li>";
        }
        if(!empty($row['linkedin']) && !ctype_space($row['linkedin']))
         {
           if(link_1($row['linkedin']))
             echo "<li><a href =".$row['linkedin']." target='_blank'><input type='button' value='LinkedIn'></a></li>";
           else
             echo"<li><input type='button' onclick=hide('li') value='LinkedIn'><p id='li', hidden=true>".$row['linkedin']."</p></li>";
         }
        if(!empty($row['github']) && !ctype_space($row['github']))
        {
          if(link_1($row['github']))
            echo "<li><a href =".$row['github']." target='_blank'><input type='button' value='GitHub'></a></li>";
          else
            echo"<li><input type='button' onclick=hide('gh') value='GitHub'><p id='gh', hidden=true>".$row['github']."</p></li>";

        }
        if(!empty($row['spotify']) && !ctype_space($row['spotify']))
        {
          if(link_1($row['spotify']))
            echo "<li><a href =".$row['spotify']." target='_blank'><input type='button' value='Spotify'></a></li>";
          else
            echo"<li><input type='button' onclick=hide('sp') value='Spotify'><p id='sp', hidden=true>".$row['spotify']."</p></li>";

        }
       if(!empty($row['snapchat']) && !ctype_space($row['snapchat']))
       {
         if(link_1($row['snapchat']))
           echo "<li><a href =".$row['snapchat']." target='_blank'><input type='button' value='Snapchat'></a></li>";
         else
           echo"<li><input type='button' onclick=hide('snap') value='Snapchat'><p id='snap', hidden=true>".$row['snapchat']."</p></li>";

       }
      if(!empty($row['discord']) && !ctype_space($row['discord']))
      {
        if(link_1($row['discord']))
          echo "<li><a href =".$row['discord']." target='_blank'><input type='button' value='Discord'></a></li>";
        else
          echo"<li><input type='button' onclick=hide('discord') value='Discord'><p id='discord', hidden=true>".$row['discord']."</p></li>";

      }
      if(!empty($row['skype']) && !ctype_space($row['skype']))
      {
        if(link_1($row['skype']))
          echo "<li><a href =".$row['skype']." target='_blank'><input type='button' value='Skype'></a></li>";
        else
          echo"<li><input type='button' onclick=hide('skype') value='Skype'><p id='skype', hidden=true>".$row['skype']."</p></li>";

      }
      if(!empty($row['youtube']) && !ctype_space($row['youtube']))
      {
        if(link_1($row['youtube']))
          echo "<li><a href =".$row['youtube']." target='_blank'><input type='button' value='YouTube'></a></li>";
        else
          echo"<li><input type='button' onclick=hide('yt') value='Youtube'><p id='yt', hidden=true>".$row['youtube']."</p></li>";

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
