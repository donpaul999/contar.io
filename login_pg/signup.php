<?php
  require '..\conectare.php';
  $user = $_POST['username'];
  $email = $_POST['email'];
  $FullName = $_POST['FullName'];
  $pass = $_POST['password'];
  $date = $_POST['birthdate'];
  //$sql = "INSERT INTO users VALUES ('$username', '$FullName', '$date', '$email', '$password')";

  /*if($user = "contar" || $user = "profile" || $user = "update" || $user = "conectare" || $user = "contact" || $user = "index")
    return header("location:username_error"); */
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
      $user = $_POST['username'];
      $pass = $_POST['password'];
      $email = $_POST['email'];
      $query = mysqli_query($conectare, "SELECT * FROM users WHERE username= '$user'");
      if(mysqli_num_rows($query) > 0) { //check if there is already an entry for that username
        return header("location:username_error");
      }else{
        $query = mysqli_query($conectare, "SELECT * FROM users WHERE email= '$email'");
        if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
          return header("location:email_error");
        }
        else{
        $sql ="INSERT INTO users(username, FullName, birthdate, email, password) VALUES ('$user', '$FullName','$date','$email','$pass')";
				$result = mysqli_query($conectare, $sql);
        return header("location:register_successful");
      }
      }
    }
 ?>
