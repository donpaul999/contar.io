<?php
  session_start();
  require '../conectare.php';
  require 'UserInfo.php';
  $username = $_SESSION['username'];
  $ip = UserInfo::get_ip();
  $os = UserInfo::get_os();
  $browser = UserInfo::get_browser();
  $device = UserInfo::get_device();
  $date = date('Y-m-d H:i:s');
  $query = mysqli_query($conectare, "SELECT * FROM stats WHERE username= '$username'");
  if(mysqli_num_rows($query) > 0){
  $sql = "UPDATE stats SET ip_last = '$ip', os_last = '$os', browser_last = '$browser', device_last = '$device', date_last = '$date', log_count = log_count + 1 WHERE username= '$username'";
  }
  else
    {
      $sql ="INSERT INTO stats(username, date_reg, date_last, ip_reg, ip_last, log_count, device_reg, device_last, os_reg, os_last, browser_reg, browser_last) VALUES ('$username','$date','$date', '$ip','$ip','1','$device', '$device', '$os', '$os', '$browser', '$browser')";
    }
  $result = mysqli_query($conectare, $sql);
 ?>
