<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 */

require "config.php";
$channel = new SayenaChannel();
$channel->SQLConnect();

if ($channel->check('secret')&&$channel->check('access')&&$channel->check('to')&&$channel->check('data'))
{
    if ($channel->secret()&&$channel->access())
        $channel->Send();
}
?>