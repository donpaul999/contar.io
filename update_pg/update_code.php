<?php
 require '..\conectare.php';
 session_start();
 $user = $_SESSION['username'];
 $ok = 0;

 if(!empty($_POST['facebook']) && !ctype_space($_POST['facebook'])){
   $fb = $_POST['facebook'];
   $query = mysqli_query($conectare, "SELECT * FROM accounts WHERE username= '$user'");
   if(mysqli_num_rows($query) > 0){
     $_sql = "UPDATE accounts SET facebook = '$fb' WHERE username= '$user'";
   }
   else {
     $_sql ="INSERT INTO accounts(username, facebook) VALUES('$user','$fb')";
   }
   $result = mysqli_query($conectare, $_sql);
   $ok = 1;
 }

 if(!empty($_POST['instagram']) && !ctype_space($_POST['instagram'])){
   $ig = $_POST['instagram'];
   $query = mysqli_query($conectare, "SELECT * FROM accounts WHERE username= '$user'");
   if(mysqli_num_rows($query) > 0){
     $_sql = "UPDATE accounts SET instagram = '$ig' WHERE username= '$user'";
   }
   else {
     $_sql ="INSERT INTO accounts(username, instagram) VALUES('$user','$ig')";
   }
   $result = mysqli_query($conectare, $_sql);
   $ok = 1;
 }

 if(!empty($_POST['linkedin']) && !ctype_space($_POST['linkedin'])){
   $li = $_POST['linkedin'];
   $query = mysqli_query($conectare, "SELECT * FROM accounts WHERE username= '$user'");
   if(mysqli_num_rows($query) > 0){
     $_sql = "UPDATE accounts SET linkedin = '$li' WHERE username= '$user'";
   }
   else {
     $_sql ="INSERT INTO accounts(username, linkedin) VALUES('$user','$li')";
   }
   $result = mysqli_query($conectare, $_sql);
   $ok = 1;
 }

 if(!empty($_POST['github']) && !ctype_space($_POST['github'])){
   $gh = $_POST['github'];
   $query = mysqli_query($conectare, "SELECT * FROM accounts WHERE username= '$user'");
   if(mysqli_num_rows($query) > 0){
     $_sql = "UPDATE accounts SET github = '$gh' WHERE username= '$user'";
   }
   else {
     $_sql ="INSERT INTO accounts(username, github) VALUES('$user','$gh')";
   }
   $result = mysqli_query($conectare, $_sql);
   $ok = 1;
 }

 if(!empty($_POST['spotify']) && !ctype_space($_POST['spotify'])){
   $sp = $_POST['spotify'];
   $query = mysqli_query($conectare, "SELECT * FROM accounts WHERE username= '$user'");
   if(mysqli_num_rows($query) > 0){
     $_sql = "UPDATE accounts SET spotify = '$sp' WHERE username= '$user'";
   }
   else {
     $_sql ="INSERT INTO accounts(username, spotify) VALUES('$user','$sp')";
   }
   $result = mysqli_query($conectare, $_sql);
   $ok = 1;
 }
 if($ok == 1)
  return header("location:update_successful");
 return header("location:update")

?>
