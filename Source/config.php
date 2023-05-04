<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.1-alpha
 */

class SayenaChannel
{
    public $secret = "45375192bebd6cfeea1d613966700a1b";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "sayena";

    private $conn;
    function SQLConnect()
    {
        $this->conn = mysqli_connect ($this->host,$this->user,$this->pass,$this->name);
        mysqli_set_charset($this->conn,"utf8mb4");// set charset utf8
    }

    public function query ($sql)
    {
        return mysqli_query($this->conn,$sql);
    }
    public function array ($sql)
    {
        $result = $this->query($sql);
        return mysqli_fetch_array ($result);
    }
    public function secret()
    {
        return $this->secret==$_GET['secret'];
    }
    public function access()
    {
        $access = $_GET['access'];
        $s = $this->array("SELECT * FROM users WHERE access='$access'");
        return isset($s);
    }
    function assoc ($sql)
    {
        $result = mysqli_query($this->conn,$sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return json_encode ($rows);
    }
    public function Send ()
    {
        $access = $_GET['access'];
        $to = $_GET['to'];
        $data = $_GET['data'];
        $sender = $this->array("SELECT id FROM users WHERE access='$access';")[0];
        $time = date("H:i");
        $this->query("INSERT INTO chats (id,sender,giver,text,date) VALUES (NULL,'$sender','$to','$data','$time');");
    }
    public function Give()
    {
        $to = $_GET['to'];
        $access = $_GET['access'];
        $sender = $this->array("SELECT id FROM users WHERE access='$access';")[0];
        return $this->assoc("SELECT * FROM chats WHERE (sender='$sender' AND giver='$to') OR (sender='$to' AND giver='$sender');");
    }
    public function Connect()
    {
        $date = date("Y/m/d H:i:s");
        $access = hash("sha512",$date);
        $this->query("INSERT INTO users (id,date,access) VALUES (NULL,'$date','$access');");
        return $access;
    }
    public function AccessDenied(Type $var = null)
    {
        echo '-1';
    }
}

?>