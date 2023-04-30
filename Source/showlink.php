<?php
require "config.php";
$host = $_SERVER['HTTP_HOST'];
$secret=token;
echo "https://say.na/c/$host/?secret=$secret";
?>