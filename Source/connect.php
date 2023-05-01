<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.1-alpha
 */

require "config.php";
$channel = new SayenaChannel();
if (isset($_GET['key'])&&isset($_GET['secret'])&&!empty($_GET['key'])&&!empty($_GET['secret']))
{
    if ($channel->secret())
    {
        $channel->SQLConnect();
        echo $channel->Connect($_GET['key']);
    }
    else
        $channel->AccessDenied();
}
else
    $channel->AccessDenied();
?>