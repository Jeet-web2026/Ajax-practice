<?php

class config
{
    private $servername;
    private $databasename;
    private $username;
    private $password;

    public function __construct($sn, $un, $pd, $db)
    {
        $this->servername = $sn;
        $this->username = $un;
        $this->password = $pd;
        $this->databasename = $db;
    }

    public function serverConfig()
    {
        $connection = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        if (!$connection) {
            die('Connection error: ' . mysqli_connect_error());
        }
        return $connection;
    }
}

$config = new config("localhost", "root", "", "ajax-practice");
$connection = $config->serverConfig();

?>
