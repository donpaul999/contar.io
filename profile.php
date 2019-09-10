<?php
require 'conectare.php';
session_start();

$ok = 0;
$usr = $_GET['id'];
$username = "./";
if(isset($_SESSION['loggedin'])) {
  $ok = 1;
  $username = $_SESSION['username'];
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
                  echo "Share your profile:";
                  echo "<input id= 'share_profile' name= 'share_profile' value='https://contar.io/p/".$usr."'>";
                  echo  '<button class="copy-text" onclick="copy()">Copy text <span class="text-copied">Text copied</span></button>';

              }
              echo '<div class="user">';
              echo  '<ul>';
                 if(!empty($row['facebook']) && !ctype_space($row['facebook']))
                  {
                    buttonorlist($row['facebook'], "fb", "Facebook", "fb1");
                  }
                  if(!empty($row['instagram']) && !ctype_space($row['instagram']))
                  {
                    buttonorlist($row['instagram'], "ig", "Instagram", "ig1");
                  }
                  if(!empty($row['twitter']) && !ctype_space($row['twitter']))
                  {
                    buttonorlist($row['twitter'], "twitter", "Twitter","twitter1");
                  }
                  if(!empty($row['youtube']) && !ctype_space($row['youtube']))
                  {
                    buttonorlist($row['youtube'], "yt", "YouTube", "yt1");
                  }
                  if(!empty($row['linkedin']) && !ctype_space($row['linkedin']))
                   {
                     buttonorlist($row['linkedin'], "linkedin", "LinkedIn", "linkedin1");
                   }
                  if(!empty($row['reddit']) && !ctype_space($row['reddit']))
                  {
                    buttonorlist($row['reddit'], "reddit", "Reddit","reddit1");
                  }
                  if(!empty($row['pinterest']) && !ctype_space($row['pinterest']))
                  {
                    buttonorlist($row['pinterest'], "pinterest", "Pinterest","pinterest1");
                  }
                  if(!empty($row['tumblr']) && !ctype_space($row['tumblr']))
                  {
                    buttonorlist($row['tumblr'], "tumblr", "Tumblr","tumblr1");
                  }
                  if(!empty($row['patreon']) && !ctype_space($row['patreon']))
                  {
                    buttonorlist($row['patreon'], "patreon", "Patreon","patreon1");
                  }
                  if(!empty($row['github']) && !ctype_space($row['github']))
                  {
                    buttonorlist($row['github'], "github", "GitHub","github1");
                  }
                  if(!empty($row['paypal']) && !ctype_space($row['paypal']))
                  {
                    buttonorlist($row['paypal'], "paypal", "PayPal","paypal1");
                  }
                  if(!empty($row['spotify']) && !ctype_space($row['spotify']))
                  {
                    buttonorlist($row['spotify'], "spotify", "Spotify","spotify1");
                  }
                 if(!empty($row['snapchat']) && !ctype_space($row['snapchat']))
                 {
                   buttonorlist($row['snapchat'], "snap", "Snapchat", "snap1");
                 }
                if(!empty($row['discord']) && !ctype_space($row['discord']))
                {
                  buttonorlist($row['discord'], "discord", "Discord", "discord1");
                }
                if(!empty($row['skype']) && !ctype_space($row['skype']))
                {
                  buttonorlist($row['skype'], "skype", "Skype", "skype1");
                }
                if(!empty($row['steam']) && !ctype_space($row['steam']))
                {
                  buttonorlist($row['steam'], "steam", "Steam","steam1");
                }
                if(!empty($row['twitch']) && !ctype_space($row['twitch']))
                {
                  buttonorlist($row['twitch'], "twitch", "Twitch","twitch1");
                }
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
