<?php
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