<?php
 require '../conectare.php';
$ok = 0;
 session_start();
 $ok = 0;
 $user = $_SESSION['username'];

function upd($link, $site, &$ok, $user, $conectare)
{
  $link = htmlentities($link);
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
   upd($_POST['facebook'], "facebook", $ok, $user, $conectare);
 }

 if(!empty($_POST['instagram']) && !ctype_space($_POST['instagram'])){
   upd($_POST['instagram'], "instagram", $ok, $user, $conectare);
 }

 if(!empty($_POST['linkedin']) && !ctype_space($_POST['linkedin'])){
   upd($_POST['linkedin'], "linkedin", $ok, $user, $conectare);
 }

 if(!empty($_POST['github']) && !ctype_space($_POST['github'])){
   upd($_POST['github'], "github", $ok, $user, $conectare);
 }

 if(!empty($_POST['reddit']) && !ctype_space($_POST['reddit'])){
   upd($_POST['reddit'], "reddit", $ok, $user, $conectare);
 }

 if(!empty($_POST['tumblr']) && !ctype_space($_POST['tumblr'])){
   upd($_POST['tumblr'], "tumblr", $ok, $user, $conectare);
 }

 if(!empty($_POST['pinterest']) && !ctype_space($_POST['pinterest'])){
   upd($_POST['pinterest'], "pinterest", $ok, $user, $conectare);
 }

 if(!empty($_POST['twitter']) && !ctype_space($_POST['twitter'])){
   upd($_POST['twitter'], "twitter", $ok, $user, $conectare);
 }

 if(!empty($_POST['twitch']) && !ctype_space($_POST['twitch'])){
   upd($_POST['twitch'], "twitch", $ok, $user, $conectare);
 }

 if(!empty($_POST['paypal']) && !ctype_space($_POST['paypal'])){
   upd($_POST['paypal'], "paypal", $ok, $user, $conectare);
 }
 if(!empty($_POST['spotify']) && !ctype_space($_POST['spotify'])){
   upd($_POST['spotify'],"spotify", $ok, $user, $conectare);
 }

 if(!empty($_POST['snapchat']) && !ctype_space($_POST['snapchat'])){
   upd($_POST['snapchat'], "snapchat", $ok, $user, $conectare);
 }

 if(!empty($_POST['discord']) && !ctype_space($_POST['discord'])){
   $fb = $_POST['discord'];
   $site = "discord";
   upd($fb, $site, $ok, $user, $conectare);
 }

 if(!empty($_POST['skype']) && !ctype_space($_POST['skype'])){
   upd($_POST['skype'],"skype", $ok, $user, $conectare);
 }

 if(!empty($_POST['youtube']) && !ctype_space($_POST['youtube'])){
   upd($_POST['youtube'], "youtube", $ok, $user, $conectare);
 }

 if(!empty($_POST['steam']) && !ctype_space($_POST['steam'])){
   upd( $_POST['steam'], "steam", $ok, $user, $conectare);
 }

if($ok == 1)
 return header("location:update_successful");
return header("location:update");

?>
