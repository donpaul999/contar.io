<?php
  require '../conectare.php';
  require '../user_info/UserInfo.php';
  $ok = 0;
  $token = $_POST['access'];
  $app_token = '825560317898128|wMleaJ0SQbbe5M02kGK2gj_TvSo';
  $user_id = '';
  $json = file_get_contents('https://graph.facebook.com/debug_token?%20input_token='.$token.'%20&access_token='.$app_token);
  $data = json_decode($json, true);
  $user_id = $data["data"]["user_id"];
  $query = "SELECT * FROM users WHERE email='$mail'";
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
        $secretKey = '6Le2pbYUAAAAAN6emlMyNV1kXDsiSOfArEDHZyei';
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
        $sql ="INSERT INTO users(user_id, username, FullName, birthdate, email, password) VALUES ('$user_id','$user', '$FullName','$date','$email','$pass')";
				$result = mysqli_query($conectare, $sql);
        $ip = UserInfo::get_ip();
        $os = UserInfo::get_os();
        $browser = UserInfo::get_browser();
        $device = UserInfo::get_device();
        $date = date('Y-m-d H:i:s');
        $sql ="INSERT INTO stats(username, date_reg, date_last, ip_reg, ip_last, log_count, device_reg, device_last, os_reg, os_last, browser_reg, browser_last) VALUES ('$user','$date','$date', '$ip','$ip','1','$device', '$device', '$os', '$os', '$browser', '$browser')";
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
