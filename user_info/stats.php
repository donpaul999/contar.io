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
  $sql = "UPDATE stats SET ip_last = '$ip', os_last = '$os', browser_last = '$browser', device_last = '$device', date_last = '$date', log_count = log_count + 1 WHERE username= '$username'";
  $result = mysqli_query($conectare, $sql);
 ?>
