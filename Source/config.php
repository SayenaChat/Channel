<?php
/*
 *  Sayena Chat Communication Channel
 *  (c) 2023 Sayena Team, Free Software MIT License
 *  Sayena v0.2-beta
 *
 *  config/  Configuration of SayenaChannel
 *
 */

class SayenaChannel
{
    /* Secret code */
    public  $secret = hash("md5","Secret-Test");

    /* MySQL DataBase Connection */
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "sayena";
    private $conn;

    /* Version */
    public  $version = "0.3";
    public  $github  = "https://github.com/SayenaChat/Channel/releases/tag/";

    /* Show github */
    public function redirect ()
    {
        $c = $this->github.$this->version;
        header("Location: $c");
    }

    // Check exists get datas
    function check ($var)
    {
        return isset($_GET[$var])&&!empty($_GET[$var]);
    }

    // SQL DataBase connector
    function SQLConnect()
    {
        $this->conn = mysqli_connect ($this->host,$this->user,$this->pass,$this->name);
        mysqli_set_charset($this->conn,"utf8mb4");// set charset utf8
    }

    // Run MySQL Query
    public function query ($sql)
    {
        return mysqli_query($this->conn,$sql);
    }

    // Run MySQL Query & Get a record
    public function array ($sql)
    {
        $result = $this->query($sql);
        return mysqli_fetch_array ($result);
    }

    // Get JSON Assoc for running MySQL Query
    function assoc ($sql)
    {
        $result = mysqli_query($this->conn,$sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return json_encode ($rows);
    }

    // Get Secret Code
    public function secret()
    {
        return $this->secret==$_GET['secret'];
    }

    // Get Access Code
    public function access()
    {
        $access = $_GET['access'];
        $s = $this->array("SELECT * FROM users WHERE access='$access'");
        return isset($s);
    }

    // Main Func: Send Encrypted Message
    public function Send ()
    {
        $access = $_GET['access'];
        $to = $_GET['to'];
        $data = $_GET['data'];
        $sender = $this->array("SELECT id FROM users WHERE access='$access';")[0];
        $time = date("H:i");
        $this->query("INSERT INTO chats (id,sender,giver,text,date) VALUES (NULL,'$sender','$to','$data','$time');");
    }

    // Main Func: Give all messages from another
    public function Give()
    {
        $to = $_GET['to'];
        $access = $_GET['access'];
        $sender = $this->array("SELECT id FROM users WHERE access='$access';")[0];
        return $this->assoc("SELECT * FROM chats WHERE (sender='$sender' AND giver='$to') OR (sender='$to' AND giver='$sender');");
    }

    // Main Func: Connect to channel
    public function Connect()
    {
        $date = date("Y/m/d H:i:s");
        $access = hash("md5",$date);
        $this->query("INSERT INTO users (id,date,access) VALUES (NULL,'$date','$access');");
        $id = $this->array("SELECT id FROM users WHERE access='$access'")[0];
        return "$id:$access";
    }
}

?>