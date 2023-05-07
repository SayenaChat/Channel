<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.3-beta
 *
 *  showlink/  Give all messages from another in channel
 *
 */

require "config.php";

// Get channel data
$channel = new SayenaChannel();
$host = $_SERVER['HTTP_HOST'];
$secret=$channel->secret;

// Print access link
echo "https://say.na/c/$host/secret=$secret";

// Remove showlink
unlink("showlink.php");

?>