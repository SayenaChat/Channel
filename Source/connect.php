<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
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
}
?>