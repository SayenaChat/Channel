<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.1-alpha
 */

require "config.php";
$channel = new SayenaChannel();
if (isset($_GET['secret'])&&!empty($_GET['secret']))
{
    if ($channel->secret())
    {
        $channel->SQLConnect();
        echo $channel->Connect();
    }
    else
        $channel->AccessDenied();
}
else
    $channel->AccessDenied();
?>