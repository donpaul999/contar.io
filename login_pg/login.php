<?php
  require '..\conectare.php';
  session_start();
  /*if(!isset($_SESSION['wrong']))
  $_SESSION['wrong'] = 0;*/

  if(!empty($_POST['login']))
  {
    $ok = 1;
    if($_SESSION['wrong'] >= 3){
      $ok = 0;
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
          $secretKey = '6Lexj7MUAAAAACPzsQJE1Myokq0wIqSeDtODI7Oo';
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
          $responseData = json_decode($verifyResponse);
        if($responseData->success)
         $ok = 1;
       }
       else
        return header("location:captcha_log");
     }
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($conectare, $query);
    $count = mysqli_num_rows($result);
    if($count > 0 && $ok == 1)
      {
        session_start();
        $_SESSION['loggedin'] = '1';
        $_SESSION['username'] = $username;
        header("location:..\contar");
      }
    else
    {
      //$_SESSION['wrong']++;
      return header("location:loginfailed");

    }
  }

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <style>
     img[alt="www.000webhost.com"] {
         display: none !important;
     }
     </style>
       <title> Contar.io </title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="shortcut icon" type="image/x-icon" href="..\icons\logo.png" />
       <link rel="stylesheet" type="text/css" href="..\resources\css\style_index.css">
       <script src = "..\resources\js\password.js"></script>
       <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   </head>
   <body>
     <div class="form-wrap">
       <form method="POST">
           <h1>Log In</h1>
           <input type="text" name="username" placeholder="Your username" required>
        <!--   <input type="email" name="email" placeholder="Email" required> -->
        <input type="password" name="password" value="" id="password" placeholder="Password" required>
           <input type="checkbox" onclick="showpass()"> <h5>Show Password</h5> <br>
           <?php
           /*if($_SESSION['wrong'] >= 3)
            echo '<div class="g-recaptcha" data-sitekey="6Lexj7MUAAAAAPXCNk94uSkljxr_OttzF4-FXzmp"></div>';
            */?>
           <input type="submit" id="login" name="login" value="Log In">
           <a href = "register"><input type = "button" value="Sign Up"></a>
       </form>
     </div>
   </body>
 </html>
