<?php
require '../conectare.php';
$ok = 0;
if(isset($_POST['submit_password']) && $_POST['password'] && $_POST['email'])
{
  // Validate reCAPTCHA box
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
      // Google reCAPTCHA API secret key
      $secretKey = '6Le2pbYUAAAAAN6emlMyNV1kXDsiSOfArEDHZyei
';

      // Verify the reCAPTCHA response
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);

      // Decode json data
      $responseData = json_decode($verifyResponse);

      // If reCAPTCHA response is valid
    if($responseData->success)
    {
  $email=$_POST['email'];
  $pass=md5($_POST['password']);
  $select=mysqli_query($conectare, "update users set password='$pass' where email='$email'");
  return header("location:../update_pg/pass_success");
}
}
  else
    return header("location:../login_pg/captcha_sign");
}
?>
