<?php
  require '..\conectare.php';

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
       <link rel="stylesheet" type="text/css" href="..\resources\css\style_index.css">
       <script src = "..\resources\js\password.js"></script>
       <script src = "..\resources\js\lettersandnumbers.js"></script>
   </head>
   <body>
     <div class="form-wrap">
       <form method="POST" action="signup.php">
           <h1>Register</h1>
           <input type="text" name="username" id="username" placeholder="Your username - letters and numbers only" onkeypress="return alphanum(event)" required><br><br>
           <input type="text" name="FullName" placeholder="Your Full Name - letters, space and dash only" onkeypress="return alphanumdash(event)" required><br><br>
           <input type="date" name="birthdate" placeholder="Your Birth Date" required><br><br>
           <input type="email" name="email" placeholder="Email" required><br><br>
           <input type="password" name="password" value="" pattern=".{8,}" title="Must contain at least 8 or more characters" id="password" placeholder="Password" required><br><br>
           <input type="checkbox" onclick="showpass()">
           <h5>Show Password</h5>
           <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" oninput="check(this)" required > <br>
           <span id='message'></span>
           <input type="submit" id="submit" value="Sign Up">
           <a href = "login"><input type = "button" value="Log In"></a>
       </form>
     </div>
   </body>
 </html>
