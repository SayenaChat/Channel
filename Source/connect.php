<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 *
 *  connect/  Connect to channel
 *  connect/? secret=[secret-key]
 *
 */

/*

*/

require "config.php";
$channel = new SayenaChannel();
$channel->SQLConnect();

if ($channel->check('secret'))
{
    if ($channel->secret())
        echo $channel->Connect();
}
?>