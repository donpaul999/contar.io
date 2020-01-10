<?php
require 'conectare.php';
require 'premium_pg/conectare2.php';
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$usr = $_GET['id'];
$sql = "SELECT * FROM users WHERE username= '$usr'";
$var = mysqli_query($conectare, $sql);
$fn = mysqli_fetch_array($var);
if($fn['premium'] == 1)
    $is_premium = 1;
$val = $ip.$usr;
$val = md5($val);
if(!isset($_COOKIE[$val]))
  {
    setcookie($val, 1, time() + (3600 * 7 * 24));
    $sql = "SELECT fullname FROM users WHERE username='$usr'";
    $var = mysqli_query($conectare, $sql);
    $fn = mysqli_fetch_array($var);
    $fullname = $fn["fullname"];
    $query = mysqli_query($conectare, "SELECT * FROM views WHERE username= '$usr'");

    if(mysqli_num_rows($query) > 0){
      $_sql = "UPDATE views SET total = total + 1, daily = daily + 1, monthly = monthly + 1, weekly = weekly + 1 WHERE username= '$usr'";
}
  else {
    $_sql ="INSERT INTO views(username, FullName, daily, weekly, monthly, total) VALUES('$usr','$fullname','1','1','1','1')";
  }
    $result = mysqli_query($conectare,$_sql);
  }

$ok = 0;
if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['loggedin']))
  if(!empty($_COOKIE['username']) && !empty($_COOKIE['password']) && !empty($_COOKIE['loggedin'])){
  $username = $_COOKIE['username'];
   $password = $_COOKIE['password'];
   $ok = 1;
   $query = "SELECT * FROM users WHERE username='$username' and password='$password'";

 $result = mysqli_query($conectare, $query);
 $count = mysqli_num_rows($result);
   if($count > 0 && $ok == 1)
     {
 session_start();
 $_SESSION['loggedin'] = '1';
 $row = mysqli_fetch_array($result);
 $usr = $row['username'];
 $pass = $row['password'];
 $_SESSION['username'] = $usr;

 require('../user_info/stats.php');
 $result = mysqli_query($conectare, $query);
 $count = mysqli_num_rows($result);
 return header("location:../contar");
 }
 else
 {
 $_SESSION['wrong']++;
 return header("location:../loginfailed");
 }

}
$usr = $_GET['id'];
$username = "./";
if(isset($_SESSION['loggedin'])) {
  $ok = 1;
  $username = $_SESSION['username'];
}
if($is_premium == 1 && $_SESSION['loggedin'] == 1 && $usr != $username){
    $sql = "CREATE TABLE IF NOT EXISTS ".$usr."(ID INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255), views INT(255) NOT NULL DEFAULT '1', fb INT(255) NOT NULL DEFAULT '0', ig INT(255) NOT NULL DEFAULT '0', linkedin INT(255) NOT NULL DEFAULT '0', github  INT(255) NOT NULL DEFAULT '0', spotify INT(255) NOT NULL DEFAULT '0', discord INT(255) NOT NULL DEFAULT '0', skype INT(255) NOT NULL DEFAULT '0', yt INT(255) NOT NULL DEFAULT '0', snap INT(255) NOT NULL DEFAULT '0', steam INT(255) NOT NULL DEFAULT '0', paypal INT(255) NOT NULL DEFAULT '0', reddit INT(255) NOT NULL DEFAULT '0', tumblr INT(255) NOT NULL DEFAULT '0', pinterest INT(255) NOT NULL DEFAULT '0', twitch INT(255) NOT NULL DEFAULT '0',twitter INT(255) NOT NULL DEFAULT '0', patreon INT(255) NOT NULL DEFAULT '0')";
    $var = mysqli_query($conectare2, $sql);
    $sql = "SELECT * FROM ".$usr." WHERE username='$username'";
    $var = mysqli_query($conectare2, $sql);
    if(mysqli_num_rows($var) > 0){
        $sql = "UPDATE ".$usr." SET views = views + 1 WHERE username = '$username'";
    }
    else{
        $sql = "INSERT INTO ".$usr."(username) VALUES('$username')";
    }
    $var = mysqli_query($conectare2, $sql);
}
$sql = "SELECT fullname FROM users WHERE username='$usr'";
$var = mysqli_query($conectare, $sql);
$fn = mysqli_fetch_array($var);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />   <head>
  <head>
    <meta charset="UTF-8">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/title.png"/>
    <link rel="stylesheet" href="../resources/css/master.css">
    <title>Contar.io</title>
    <div class="user-title">
      <h1 class="fullname"><?php echo $fn['fullname'];?></h1>
    </div><!-- end user-title -->
  </head>
  <body>
    <?php
      if ($android == 1) {
        echo
        '
          <div class="android-header">
            <div class="text">
              <p>Contar.io<br>
              Get it on Google Play.</p>
            </div>
            <a href="https://play.google.com/store/apps/details?id=io.contar.app" class="android-button">Install</a>
          </div>
        ';
      }
    ?>
    <!-- ========== START HEADER ========== -->
    <div class="top-nav top-nav--burger-1 clearfix">
      <div class="logo">
          <a href="../contar"><img src="../resources/img/logo_png.png" alt="Contar-Logo"></a>
      </div><!-- end logo -->
      <?php
      if($ok == 1)
      {
        echo '<div class="username">';
        echo '<ul>';
        echo '<li><input type = "button" value='.$username.'></li>';
        echo '<ul class="sub-menu">';
          echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
          echo "<li><a href = '../update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
          echo "<li><a href='../find'><input type = 'button' id='back' value='Search users'></a></li>";
          echo "<li><a href='../update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
          echo "<li><a href='../login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
        echo '</ul>';
        echo  '</ul>';
        echo  '</div>';
      }
      else {
        echo "<a class='join' href='../index'><input class='social-button' type = 'button' id='back' value='Join here'></a>";
      }
      ?>
      <?php
      if($ok == 1) {
        echo'<div class="menu-trigger">';
         echo' <input type="checkbox">';
          echo'<span></span>';
          echo'<span></span>';
          echo'<span></span>';
        echo'</div><!-- end menu-trigger -->';
      }
      ?>

      <header class="header header--bgk">
        <div class="container">
            <?php
              echo '<div class="username">';
              echo '<ul>';
              echo '<li><input type = "button" value='.$usr.'></li>';
              echo '<ul class="sub-menu">';
                echo "<li><a href='../contar'><input type = 'button' id='back' value='Home'></a></li>";
                echo "<li><a href = '../update_pg/update'><input type = 'button' value='Update your profile'></a></li>";
                echo "<li><a href='../find'><input type = 'button' id='back' value='Search users'></a></li>";
                echo "<li><a href='../update_pg/update_pass'><input type = 'button' id='update_pass' value='Change password'></a></li>";
                echo "<li><a href='../login_pg/logout.php'><input type = 'button' id='logout' value='Log Out'></a></li>";
              echo '</ul>';
              echo  '</ul>';
              echo  '</div>';
            ?>
        </div><!-- end container -->
      </header>
    </div><!-- end top-nav -->
    <!-- ========== END HEADER ========== -->

    <!-- ========== START PROFILE-CONTENT ========== -->
    <div class="contar-profile main-container">
      <div class="container main-container">
        <div class="main">
          <div class="col-sm-12">
            <?php
              // if ($ok !== 1) {
              //   echo "<a class='join' href='../index'><input class='social-button' type = 'button' id='back' value='Join here'></a>";
              // }
              require 'profile_code.php';
              function link_1($var)
              {
                if (filter_var($var, FILTER_VALIDATE_URL))
                  return true;
                return false;
              }
              function buttonorlist($var, $id, $value,$id1){
                if(link_1($var))
                  echo "<li><a class='btn btn-default' id=".$id1." href =".$var." target='_blank'><input class='' type='button' value=".$value."><i class='fab fa-instagram'></i><p id='".$id."'></p></a></li>";
                else
                  { ?>
                    <li><button type='button' id="<?php echo $id1; ?>" class='social-button'  onclick="swaptxt('<?php echo $id; ?>', '<?php echo $var; ?>','<?php echo $value; ?>')"><i class='fab fa-instagram'></i><p id="<?php echo $id; ?>" style="font-weight:bold"><?php echo $value; ?></p></button></li>
                    <?php
                  }
              }
              if($username == $usr){
                  $query = "SELECT * from views where username='$username'";
                  $result = mysqli_query($conectare, $query);
                  $row_views = mysqli_fetch_array($result);
                  if(isset($_POST['views']) && $_POST['views'] != '')
                    $var = $_POST['views'];
                  else
                    $var = "Select an option";
                  echo'Profile views:
                  <form method="POST">
                  <select name="views">
                  <option value='.$var.'>'.$var.'</option>';
                  $topics=Array("Daily","Weekly","Monthly", "Total");
                  foreach($topics as $topic){
                      echo '<option value="'.$topic.'"'.($_POST['topic']==$topic?' selected="selected"':'').'>'.$topic.'</option>';
                  }
                  echo '</select>';
                  echo '<input type="submit" name="submit" value="Submit"/>';
                  if(isset($_POST['views']) && $_POST['views'] != "Select an option")
                    {
                      echo "</br>".$_POST['views']." views: ";
                      $views_t = $_POST['views'];
                      $query = "SELECT $views_t FROM views WHERE username='$username'";
                      $result = mysqli_query($conectare, $query);
                      $arr = mysqli_fetch_array($result);
                      echo $arr[$views_t];
                    }
                  echo '</br>
                  </form>';
                  echo "Share your profile:";
                  echo "<input id= 'share_profile' name= 'share_profile' value='https://contar.io/p/".$usr."'>";
                  echo  '<button class="copy-text" onclick="copy()">Copy text <span class="text-copied">Text copied</span></button>';

              }
              echo '<div class="user">';
              echo  '<ul>';
              $is_empty = 0;
                 if(!empty($row['facebook']) && !ctype_space($row['facebook']))
                  {
                    $is_empty++;
                    buttonorlist($row['facebook'], "fb", "Facebook", "fb1");
                  }
                  if(!empty($row['instagram']) && !ctype_space($row['instagram']))
                  {
                    $is_empty++;
                    buttonorlist($row['instagram'], "ig", "Instagram", "ig1");
                  }
                  if(!empty($row['tiktok']) && !ctype_space($row['tiktok']))
                     {
                       $is_empty++;
                       buttonorlist($row['tiktok'], "tiktok", "TikTok","tiktok1");
                     }
                  if(!empty($row['twitter']) && !ctype_space($row['twitter']))
                  {
                    $is_empty++;
                    buttonorlist($row['twitter'], "twitter", "Twitter","twitter1");
                  }
                  if(!empty($row['youtube']) && !ctype_space($row['youtube']))
                  {
                    $is_empty++;
                    buttonorlist($row['youtube'], "yt", "YouTube", "yt1");
                  }
                  if(!empty($row['linkedin']) && !ctype_space($row['linkedin']))
                   {
                     $is_empty++;
                     buttonorlist($row['linkedin'], "linkedin", "LinkedIn", "linkedin1");
                   }
                  if(!empty($row['reddit']) && !ctype_space($row['reddit']))
                  {
                    $is_empty++;
                    buttonorlist($row['reddit'], "reddit", "Reddit","reddit1");
                  }
                  if(!empty($row['pinterest']) && !ctype_space($row['pinterest']))
                  {
                    $is_empty++;
                    buttonorlist($row['pinterest'], "pinterest", "Pinterest","pinterest1");
                  }
                  if(!empty($row['tumblr']) && !ctype_space($row['tumblr']))
                  {
                    $is_empty++;
                    buttonorlist($row['tumblr'], "tumblr", "Tumblr","tumblr1");
                  }
                  if(!empty($row['patreon']) && !ctype_space($row['patreon']))
                  {
                    $is_empty++;
                    buttonorlist($row['patreon'], "patreon", "Patreon","patreon1");
                  }
                  if(!empty($row['github']) && !ctype_space($row['github']))
                  {
                    $is_empty++;
                    buttonorlist($row['github'], "github", "GitHub","github1");
                  }
                  if(!empty($row['paypal']) && !ctype_space($row['paypal']))
                  {
                    $is_empty++;
                    buttonorlist($row['paypal'], "paypal", "PayPal","paypal1");
                  }
                  if(!empty($row['spotify']) && !ctype_space($row['spotify']))
                  {
                    $is_empty++;
                    buttonorlist($row['spotify'], "spotify", "Spotify","spotify1");
                  }
                 if(!empty($row['snapchat']) && !ctype_space($row['snapchat']))
                 {
                   $is_empty++;
                   buttonorlist($row['snapchat'], "snap", "Snapchat", "snap1");
                 }
                if(!empty($row['discord']) && !ctype_space($row['discord']))
                {
                  $is_empty++;
                  buttonorlist($row['discord'], "discord", "Discord", "discord1");
                }
                if(!empty($row['skype']) && !ctype_space($row['skype']))
                {
                  $is_empty++;
                  buttonorlist($row['skype'], "skype", "Skype", "skype1");
                }
                if(!empty($row['steam']) && !ctype_space($row['steam']))
                {
                  $is_empty++;
                  buttonorlist($row['steam'], "steam", "Steam","steam1");
                }
                if(!empty($row['twitch']) && !ctype_space($row['twitch']))
                {
                  $is_empty++;
                  buttonorlist($row['twitch'], "twitch", "Twitch","twitch1");
                }
                if($is_empty == 0 && $username == $usr)
                     echo "<a href = '../update_pg/update'><input type = 'button' class='social-button' value='Add your first account'></a>";
              echo  '</ul>';
              echo  '</div>';
              ?>
          </div><!-- end col-sm-12 -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end contar-profile -->
    <!-- ========== END PROFILE-CONTENT ========== -->

    <!-- ========== START FOOTER ========== -->
    <footer class="footer fixed">
      <div class="container">
        <div class="row">
          <div class="footer__social">
            <ul class="social srf-full-menu">
                <li>
                  <a href="https://www.facebook.com/stefanut999" target='_blank'><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="https://www.linkedin.com/in/paulstefancolta/" target='_blank'><i class="fab fa-linkedin-in"></i></i></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/paulstefancolta/" target='_blank'><i class="fab fa-instagram"></i></a>
                </li>
              </ul>
               <a href="#" class="copyright">&copy; Paul Colta - Contar.io</a>
          </div><!-- end footer__social -->
        </div><!-- end row -->
      </div><!-- end container -->
    </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- ========== START JS ========== -->
  <script src="../resources/js/jquery.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="../resources/js/bootstrap.min.js"></script>
  <script src="../resources/js/plugins.js"></script>
  <script src="../resources/js/main.js"></script>
  <!-- ========== END JS ========== -->

  </body>
  <script>
  function hide(index){

    if(document.getElementById(index).hidden == true)
      document.getElementById(index).hidden = false;
    else
      document.getElementById(index).hidden = true;
  }

  function swaptxt(index, text1, text2){
    //$.post('phpurl.php', { id: index; usr: <?php echo json_encode($usr);?>; username: <?php echo json_encode($username);?>} );
    var elem = document.getElementById(index);
    if (elem.innerHTML === text1)
      elem.innerHTML = text2;
    else
      elem.innerHTML = text1;

}

  function copy() {
  /* Get the text field */
  var copyText = document.getElementById("share_profile");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  //alert("Copied the text: " + copyText.value);
}
</script>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#237afc"
    },
    "button": {
      "background": "#fff",
      "text": "#237afc"
    }
  },
  "content": {
    "href": "policy.html"
  }
});

function addTxt(txt, field)
{
var myTxt = txt;
var id = field;
document.getElementById(id).value = myTxt;
}
</script>
</html>