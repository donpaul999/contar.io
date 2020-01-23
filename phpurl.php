<?php
    include 'profile.php';
    //$sql = "UPDATE ".$usr." SET ".$id." = ".$id." + 1 WHERE username=".$username."";
    $sql = "INSERT INTO `stefanut999` (`ID`, `username`, `views`, `fb`, `ig`, `linkedin`, `github`, `spotify`, `discord`, `skype`, `yt`, `snap`, `steam`, `paypal`, `reddit`, `tumblr`, `pinterest`, `twitch`, `twitter`, `patreon`, 'tiktok') VALUES
            (2, 'rarescioroga2', 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
    $query = mysqli_query($conectare, $sql);
?>