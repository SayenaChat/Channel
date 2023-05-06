<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 *
 *  send/  Send a message to another
 *  send/? secret=[secret-key]& access=[access-key]& to=[another-id] data=[encrypted-message]
 *
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