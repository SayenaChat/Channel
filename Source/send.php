<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 */

require "config.php";
$channel = new SayenaChannel();
$channel->SQLConnect();

if (isset($_GET['access'])&&isset($_GET['secret'])&&isset($_GET['to'])&&isset($_GET['data'])&&!empty($_GET['access'])&&!empty($_GET['secret'])&&!empty($_GET['to'])&&!empty($_GET['data']))
{
    if ($channel->secret()&&$channel->access())
        $channel->Send();
}
?>