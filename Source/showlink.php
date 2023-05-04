<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 */

require "config.php";
$channel = new SayenaChannel();
$host = $_SERVER['HTTP_HOST'];
$secret=$channel->secret;
echo "https://say.na/c/$host/secret=$secret";
?>