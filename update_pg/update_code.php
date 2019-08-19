<?php
 require '..\conectare.php';
 session_start();
 $ok = 0;
 $user = $_SESSION['username'];

function upd($link, $site, &$ok, $user, $conectare)
{
  $query = mysqli_query($conectare, "SELECT * FROM accounts WHERE username= '$user'");
  if(mysqli_num_rows($query) > 0){
    $_sql = "UPDATE accounts SET $site = '$link' WHERE username= '$user'";
  }
  else {
    $_sql ="INSERT INTO accounts(username, $site) VALUES('$user','$link')";
  }
  $result = mysqli_query($conectare, $_sql);
  $ok = 1;
  //echo $_sql;
}
 if(!empty($_POST['facebook']) && !ctype_space($_POST['facebook'])){
   $fb = $_POST['facebook'];
   $site = "facebook";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['instagram']) && !ctype_space($_POST['instagram'])){
   $fb = $_POST['instagram'];
   $site = "instagram";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['linkedin']) && !ctype_space($_POST['linkedin'])){
   $fb = $_POST['linkedin'];
   $site = "linkedin";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['github']) && !ctype_space($_POST['github'])){
   $fb = $_POST['github'];
   $site = "github";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['spotify']) && !ctype_space($_POST['spotify'])){
   $fb = $_POST['spotify'];
   $site = "spotify";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['snapchat']) && !ctype_space($_POST['snapchat'])){
   $fb = $_POST['snapchat'];
   $site = "snapchat";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['discord']) && !ctype_space($_POST['discord'])){
   $fb = $_POST['discord'];
   $site = "discord";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['skype']) && !ctype_space($_POST['skype'])){
   $fb = $_POST['skype'];
   $site = "skype";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['youtube']) && !ctype_space($_POST['youtube'])){
   $fb = $_POST['youtube'];
   $site = "youtube";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['steam']) && !ctype_space($_POST['steam'])){
   $fb = $_POST['steam'];
   $site = "steam";
   upd($fb, $site, $ok, $user, $conectare);
 }

if($ok == 1)
 return header("location:update_successful");
return header("location:update");

?>
