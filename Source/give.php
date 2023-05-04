<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 */

/*
   give.php: Give all messages from another in channel
   give.php? secret=[secret-key]& access=[access-key]& to=[another-id]
*/

require "config.php";
$channel = new SayenaChannel();
$channel->SQLConnect();

if ($channel->check('secret')&&$channel->check('access')&&$channel->check('to'))
{
    if ($channel->secret()&&$channel->access())
        echo $channel->Give();
}
?>