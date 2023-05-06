<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 *
 *  index/  Main page
 *
 */

require "config.php";

// Get channel data
$channel = new SayenaChannel();
$channel->redirect();

?>