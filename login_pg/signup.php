<?php
  require '../conectare.php';
  $user =  str_replace("&lt","",str_replace("&gt","", $_POST['username']));
  $email =  str_replace("&lt","",str_replace("&gt","", $_POST['email']));
  $FullName =  str_replace("&lt","",str_replace("&gt","", $_POST['FullName']));
  $pass = md5($_POST['password']);
  $date = str_replace("&lt","",str_replace("&gt","",$_POST['birthdate']));
  $user =  str_replace(">","",str_replace("<","", $user));
  $email =  str_replace(">","",str_replace("<","", $email));
  $FullName =  str_replace(">","",str_replace("<","", $FullName ));
  $date = str_replace(">","",str_replace("<","",$date));
  //$sql = "INSERT INTO users VALUES ('$username', '$FullName', '$date', '$email', '$password')";

  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
    // Validate reCAPTCHA box
      if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        // Google reCAPTCHA API secret key
        $secretKey = '6Lexj7MUAAAAACPzsQJE1Myokq0wIqSeDtODI7Oo';

        // Verify the reCAPTCHA response
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);

        // Decode json data
        $responseData = json_decode($verifyResponse);

        // If reCAPTCHA response is valid
      if($responseData->success)
      {
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
    }
    else
      return header("location:captcha_sign");
  }
 ?>
