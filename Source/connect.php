<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 */

require "config.php";
$channel = new SayenaChannel();
if ($channel->check('secret'))
{
    if ($channel->secret())
    {
        $channel->SQLConnect();
        echo $channel->Connect();
    }
}
?>