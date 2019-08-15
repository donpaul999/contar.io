<?php
 require '..\conectare.php';
 session_start();
 $user = $_SESSION['username'];
 $fb = $_POST['facebook'];
 $ig = $_POST['instagram'];
 $ok = 0;

 if(!empty($_POST['facebook']) && !ctype_space($_POST['facebook'])){
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

 if($ok == 1)
  return header("location:update_successful");
 return header("location:update")

?>
