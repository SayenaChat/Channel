<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.1-alpha
 */

require "config.php";
$channel = new SayenaChannel();
if (isset($_GET['key'])&&isset($_GET['secret'])&&!empty($_GET['key'])&&!empty($_GET['secret'])&&isset($_GET['access'])&&!empty($_GET['access']))
{
    if ($channel->secret())
    {
        $channel->SQLConnect();
        echo $channel->Get($_GET['key']);
    }
    else
        $channel->AccessDenied();
}
else
    $channel->AccessDenied();
?>