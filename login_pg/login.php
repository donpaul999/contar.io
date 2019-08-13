<?php
  require '..\conectare.php';
  if(!empty($_POST['login']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($conectare, $query);
    $count = mysqli_num_rows($result);
    if($count > 0)
      {
        session_start();
        $_SESSION['loggedin'] = '1';
        $_SESSION['username'] = $username;
        header("location:..\contar.php");
      }
    else
    {
      header("location:loginfailed.php");
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
   </head>
   <body>
     <div class="form-wrap">
       <form method="POST">
           <h1>Log In</h1>
           <input type="text" name="username" placeholder="Your username" required>
        <!--   <input type="email" name="email" placeholder="Email" required> -->
        <input type="password" name="password" value="" id="password" placeholder="Password" required>
           <input type="checkbox" onclick="showpass()"> <h5>Show Password</h5>
           <input type="submit" id="login" name="login" value="Log In">
           <a href = "register.php"><input type = "button" value="Sign Up"></a>
       </form>
     </div>
   </body>
 </html>
