<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require '../conectare.php';

if(isset($_POST['submit_email']) && $_POST['email'])
{
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

  $email = str_replace("&lt","",str_replace("&gt","", $_POST['email']));
  $select=mysqli_query($conectare, "select * from users where email='$email'");
  if(mysqli_num_rows($select)==0)
  return header("location:email_notf");
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $email=$row['email'];
      $pass=$row['password'];
      $FullName=$row['FullName'];
    }
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  $mail->SMTPDebug = 3;                               // Enable verbose debug output

    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'aici_email';                     // SMTP username
    $mail->Password   = 'aici_parola';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('aici_email', 'Paul');
    $mail->addAddress($email, $FullName);     // Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No reply');
    $link="<a href='www.contar.io/reset/reset_pass.php?key=".$email."&reset=".$pass."'>link</a>";
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password reset - Contar.io';
    $mail->Body    = 'Hi! I can see that you forgot your password. Click on this '.$link.' to reset it';

    $mail->send();
    return header("location:mail_sent");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}
}
}
?>
