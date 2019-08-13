<?php
 require '..\conectare.php';
 session_start();
 $user = $_SESSION['username'];
 $fb = $_POST['facebook'];
 $ig = $_POST['instagram'];

 if(isset($_POST['facebook']) && isset($_POST['instagram'])){
   $query = mysqli_query($conectare, "SELECT * FROM accounts WHERE username= '$user'");
   if(mysqli_num_rows($query) > 0){
     $_sql = "UPDATE accounts SET facebook = '$fb', instagram = '$ig', username='$user' WHERE username= '$user'";
   }
   else {
     $_sql ="INSERT INTO accounts(username, facebook, instagram) VALUES('$user','$fb','$ig')";
   }
   $result = mysqli_query($conectare, $_sql);
   header("location:update_successful.php");
 }


?>
